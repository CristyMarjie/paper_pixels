<?php

namespace App\Http\Controllers;

use App\Imports\MasterTenantImport;
use App\Mail\SoaMail;
use App\Models\BirOther;
use App\Models\MasterTenant;
use App\Models\MasterTenantMigration;
use App\Models\OfficialReceiptImport;
use App\Models\People;
use App\Models\SoaImport;
use App\Models\Location;
use App\Models\Tenant;
use App\Traits\ResponseApi;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;

class TenantController extends Controller
{
    use ResponseApi;

    public function getActiveTenants(Request $request)
    {
        $filter = $request->search['value'];

        $auth_collection_handler = Auth::user()->people->address1;
        $collection_handler =  Location::where('location', $auth_collection_handler)->get();

        if(Auth::user()->role_id ==  2)
        {

            $list = People::with('user','user.tenants.master_tenant','user.tenants.contracts',)->whereHas('user', function($query){
                $query->where('role_id', 4);
            })->whereHas('user.tenants', function($query){
                $query->where('collection_handler', 0);
            })->where('address1', Auth::user()->people->address1)->get();

            // dd($list->toArray());

            $list2 = People::with('user','user.tenants.master_tenant','user.tenants.contracts')->whereHas('user.tenants', function($query) use($collection_handler){
                $query->where('collection_handler',$collection_handler[0]->id);
            })->get();

            $merged_list = $list->merge($list2);

            if($filter){
                $merged_list->whereHas('user.tenants.master_tenant', function($query) use($filter){
                    $query->where('customer_name', 'like','%'.$filter.'%');
                });
            }

            $count = count($merged_list);

            $data = $merged_list->skip($request->start)
            ->take($request->length);
        }else{

            $list = People::with('user','user.tenants.master_tenant','user.tenants.contracts')->whereHas('user', function($query){
                $query->where('role_id', 4);
            })->get();

            if($filter){
                $list->whereHas('user.tenants.master_tenant', function($query) use($filter){
                    $query->where('customer_name', 'like','%'.$filter.'%');
                });
            }

            $count = count($list);

            $data = $list->skip($request->start)
                        ->take($request->length);

        }

        $totalRecords = $totalDisplay = $count;
        return ['recordsTotal' => $totalRecords, 'recordsFiltered' => $totalDisplay, 'data' => $data];
    }


    public function tenantMasterMigration()
    {
        $files = Storage::files('imports');

        $flag = false;

        foreach($files as $file)
        {
            $filename = explode('/',$file)[1];
            if(!MasterTenantMigration::where('migration',$filename)->first()){
                 Excel::import(new MasterTenantImport,$file);
                 MasterTenantMigration::create(['migration' => $filename]);
                $flag = true;
            }
        }

        if(!$flag) return $this->error('Nothing to migrate',400);

        return $this->success('Success',null,201);
    }

    public function soaImport()
    {

        $files = Storage::files('temp/soa');
        if(!$files) return "No new SOA files";
        $results = [];


        foreach($files as $file)
        {

            $filename = explode('/',$file)[2];

            $s = explode('_',$filename);

            if(count($s) === 3){
                $tenantNumber = $s[0];
                if($this->validateDate(trim($s[1]))){
                    $tenants =  Tenant::with('user.people')->where('tenant_number', $tenantNumber)->get();

                    $start = DateTime::createFromFormat('Ym', trim($s[1]));

                    $soaNumber = explode('.',$s[2])[0];

                    Storage::move($file,"soa/$tenantNumber/$filename");

                    SoaImport::create([
                        'tenant_number' => $tenantNumber,
                        'soa_number' => $soaNumber,
                        'period_start' => $start->format('Ym'),
                        'filename' => "soa/$tenantNumber/$filename"

                    ]);
                    foreach($tenants as $tenant)
                    {
                        $compact =  ['tenant_fname' => $tenant->user->people->first_name];
                        Mail::to($tenant->user->email)->queue(new SoaMail('GMALL-BAJADA SOA '.$start->format('M Y'), $compact));
                    }
                    array_push($results,"File $filename is imported successfuly \n");


                }else{
                    array_push($results, "Invalid date format (YYYYMM) : $s[1]\n");

                }
            }else{
                array_push($results, "This is not match the required filename : $filename \n");
            }
        }

        return \implode(',',$results);
    }

    public function othersImport()
    {
        $files = Storage::files('temp/others');
        if(!$files) return "No new files on Others folder";
        $results = [];
        foreach($files as $file)
        {
            $filename = explode('/', $file)[2];

            $details = explode('_',$filename);

            if(count($details) === 3){

                $tenantNumber = $details[0];
                $date = DateTime::createFromFormat('Ymd', trim($details[1]));
                $type = explode('.', $details[2])[0];
                Storage::move($file,"attachments/bir-others/$tenantNumber/$filename");
                BirOther::create([
                    'date' => $date,
                    'tenant_number' => $tenantNumber,
                    'type' => $type,
                    'path' => "attachments/bir-others/$tenantNumber/$filename",
                    'filename' =>  $filename
                ]);
                array_push($results, "File $filename is imported successfuly \n");
            }else{
                array_push($results, "This is not match the required filename : $filename \n");
            }

        }
        return \implode(',',$results);
    }


    function validateDate($date, $format = 'Ym') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
      }

    public function officialReceiptImport()
    {

        $files = Storage::files('temp/or');

        if(!$files) return "No new OR files";
        $results = [];
        foreach($files as $file)
        {
            $filename = explode('/',$file)[2];

            $details = explode('_',$filename);
            if(count($details) === 3){
                $tenantNumber = $details[0];
                if($this->validateDate(trim($details[1]), 'Ymd')){
                    $date = DateTime::createFromFormat('Ymd',  trim($details[1]));
                    $orNumber = explode('.',$details[2])[0];
                    Storage::move($file,"or/$tenantNumber/$filename");

                    OfficialReceiptImport::create([
                        'tenant_number' => $tenantNumber,
                        'or_number' => $orNumber,
                        'or_date' => $date->format('Y-m-d'),
                        'path' => "or/$tenantNumber/$filename"
                    ]);
                   array_push($results,"File $filename is imported successfuly \n");
                }else{
                    array_push($results, "Invalid date format (YYYYMM) : $details[1]\n");
                }


            }else{
                array_push($results, "This is not match the required filename : $filename \n");
            }

        }
        return \implode(',',$results);

    }

    public function tenantMigrationView()
    {
        return view('pages.tenants.tenant_migration');
    }

    public function tester()
    {
        $files = Storage::files('imports');

        $list = [];

        foreach($files as $file)
        {
            $filename = explode('/',$file)[1];
            if(!MasterTenantMigration::where('migration',$filename)->first()){
                array_push($list,[
                    'path' => $file,
                    'filename' => $filename,
                    'lastModified' => date("Y-m-d", date(Storage::lastModified($file)))
                ]);
            }
        }

        return $list;
    }


    public function tenants()
    {
        return Cache::rememberForever('tenant-list', fn()=>Tenant::with('user.people')->get());
    }

    public function tenantList()
    {
        switch(Auth::user()->people->address1){
            case 'GMDV':
                $master_tenant =  $this->getMasterTenantByLocation(Auth::user()->people->address1);
                break;
            case 'GMTR':
                $master_tenant =  $this->getMasterTenantByLocation(Auth::user()->people->address1);
                break;
            case 'GMTG':
                $master_tenant = $this->getMasterTenantByLocation(Auth::user()->people->address1);
                break;
            case 'bajada':
                $master_tenant = MasterTenant::whereNotNull('tenant_number')->get();
                break;
            default:
                throw new Exception('Address not found',404);
                break;
        }
        return $master_tenant;
    }

    private function getMasterTenantByLocation($address)
    {
        return MasterTenant::whereNotNull('tenant_number')->where('location', 'like', '%'.$address.'%')->get();
    }
}
