<?php

namespace App\Repositories;

use App\Models\StatementOfAccount;
use App\Interfaces\ContractInterface;
use App\Models\BirAttachment;
use App\Models\BirOther;
use App\Models\MasterContract;
use App\Models\MasterTenant;
use App\Models\OfficialReceiptImport;
use App\Models\ProofOfPayment;
use App\Models\Tenant;
use App\Models\TenantAttachablesLog;
use App\Models\User;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContractRepository implements ContractInterface
{

    use ResponseApi;

    public function contractSoaList($request)
    {
        $filter = $request->search['value'];
        if($filter) $contractSoa = StatementOfAccount::with('contract')->where('statement_of_account_number','like', '%'.$filter.'%');
        else $contractSoa = StatementOfAccount::with('contract');
        $count = count($contractSoa->get());
        $data = $contractSoa->skip($request->start)
                            ->take($request->length)
                            ->get();

        $totalRecords = $totalDisplay = $count;
        return ['recordsTotal' => $totalRecords, 'recordsFiltered' => $totalDisplay, 'data' => $data];
    }

    public function contractList($request,$contractID)
    {
        // $filter = $request->search['value'];

        $tenant = Tenant::where('user_id',$contractID);

        foreach ($tenant->get() as $value)
        {
           $master_contract[] =  MasterContract::with('tenant')->whereHas('tenant',function($query) use($value) {
                    $query->where('tenant_number',$value->tenant_number);
            })->get();

            // if($filter)
            // {
            //     dd($filter);
            //  $master_contract->where(DB::raw('customer_name','like'),'%'.$filter.'%');
            // }

        }

        return ['data' => $master_contract];
    }

    public function createTenantContract($request, $tenant_id)
    {
        try{
            DB::beginTransaction();
            $user = User::with('tenant')->where('id', $tenant_id)->firstOrFail();
            $contract = $user->tenants->contracts()->create($request->only('lessor','address_of_lessor',
                                                                           'lesse','address_of_lesse',
                                                                           'lesse_trade_name','line_of_business',
                                                                           'location','floor_area'));
            foreach($request->file('contractAttachment') as $attachment)
            {
                $path = Storage::put("attachments/contract/$tenant_id",$attachment);
                $contract->attachments()->create(['path' => $path,'filename'=> $attachment->getClientOriginalName()]);
            }
            DB::commit();
            return $this->success('Contract created successfully!', $contract, 200);

       }catch(Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
       }
    }


    public function birList($request, $lease_id)
    {

        $contractBir = BirAttachment::where(['active' => 1,
                                            'contract_id' => $lease_id])->get();
        return $contractBir;

    }

    public function popList($request, $lease_number)
    {
        $poplist = ProofOfPayment::where(['contract_id' =>  $lease_number,'active' => 1])->get();
        return $poplist;
        $count = count($poplist->get());

        $data = $poplist->skip($request->start)
                        ->take($request->length)
                        ->get();
        $totalRecords =  $totalDisplay = $count;
        return ['recordsTotal' => $totalRecords, 'recordsFiltered' => $totalDisplay,'data' =>$data];
    }

    public function contractBIR($request,$contract_id)
    {
        try{
            DB::beginTransaction();
            foreach($request->file('birAttachments') as $attachment)
            {
                $path = Storage::put("attachments/bir/$contract_id",$attachment);
                $birAttachment = BirAttachment::create(['contract_id' => $contract_id,
                                                         'path' => $path,
                                                         'filename' => $attachment->getClientOriginalName(),
                                                         'status' => 0]);

                $birAttachment->attachments()->create(['user_id' =>  Auth::user()->id, 'taggable_id' => $contract_id]);
            }

            DB::commit();
            return $this->success('BIR 2307 attached successfully!', $birAttachment, 200);
        }catch(Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(),$e->getCode());
        }
    }


    public function attachProofOfPayment($request, $contract_id)
    {
        try{
            DB::beginTransaction();
            foreach($request->file('PopAttachments') as $attachment)
            {
                $path = Storage::put("attachments/proofOfPayment/$contract_id", $attachment);
                $PopAttachment = ProofOfPayment::create($request->only('date')
                                                        +['contract_id' => $contract_id]
                                                        +['path' => $path]
                                                        +['filename' => $attachment->getClientOriginalName()]);

                $PopAttachment->attachments()->create(['user_id' =>  Auth::user()->id,
                                                      'taggable_id' => $contract_id]);
            }
            DB::commit();
            return $this->success('Proof of Payment attached successfully!', $PopAttachment, 200);
        }catch(Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(),$e->getCode());
        }
    }

    public function officialReceiptList($request,$contractId)
    {
        try{
            $list = OfficialReceiptImport::where(['tenant_number' => $contractId,
                                                  'status' => 1])->get();

            return $this->success('Success',$list,200);
        }catch(Exception $e){
            return $this->error('Something went wrong',500);
        }
    }

    public function officialReceiptDownload($id)
    {
        $or  = OfficialReceiptImport::where('id',$id)->firstOrFail();
        if(!Storage::exists($or->path)) abort(404);

        return Storage::download($or->path);
    }

    public function downloadProofOfPayment($id)
    {
        $pop = ProofOfPayment::where('id', $id)->firstOrFail();
        if(!Storage::exists($pop->path)) abort(404);
        return Storage::download($pop->path,$pop->filename);
    }

    public function storeOtherAttachment($request, $tenant_number)
    {
       try{
        DB::beginTransaction();
        foreach($request->file('otherAttachment') as $attachment)
        {
            $path = Storage::put("attachments/bir-others/$tenant_number",$attachment);
            $birOther = BirOther::create($request->only('date','type')
                                            +['tenant_number' => $tenant_number]
                                            +['path' => $path]
                                            +['filename' => $attachment->getClientOriginalName()]);
            $birOther->attachments()->create(['user_id' =>  Auth::user()->id,'taggable_id' => $tenant_number]);

        }
        DB::commit();
        return $this->success('Attachment successful!', $birOther, 200);
        }catch(Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(),$e->getCode());
        }
    }

    public function birOthersList($tenant_number)
    {
        return BirOther::where('tenant_number', $tenant_number)->get();
    }

public function validateContractExist($id,$tenantNumber)
    {
        $validate = Tenant::where([
            'tenant_number' => $tenantNumber,
            'user_id' => $id
        ]);
        if(!empty($validate->get()->toArray())){return $this->error('Tenant already existed',200);}

        return $this->success('Success',null,201);
    }

    public function addMoreTenantContract($request)
    {

        $user = User::findOrFail($request->id);
        $user->tenants()->create(['tenant_number'=>$request->tenant_id]);
        Cache::forget('tenant-list');

        return $this->success('New tenant added to a user',$user,201);
    }

    public function getContractBusinessType()
    {
       return MasterContract::select('business_type')->distinct()->whereNotNull('business_type')->get();
    }

    public function rejectBIR2307($request, $id)
    {
        $birAttachment = BirAttachment::where('id',$id);
        $birAttachment->update(['status' => 2,
                                'status_message' => $request->status_message]);

        return $this->success('Rejected BIR 2307', $birAttachment, 200);

    }

    public function acceptBIR2307($id)
    {
        $birAttachment = BirAttachment::where('id',$id);
        $birAttachment->update(['status' => 1]);
        return $this->success('Accepted BIR 2307', $birAttachment, 200);
    }

    public function rejectedBir()
    {
        $master_tenant = Tenant::with('master_tenant')->where('user_id',Auth::user()->id)->first();
        $rejected_bir = BirAttachment::where(['contract_id' => $master_tenant->master_tenant->lease_number,
                                              'status' => 2])->get();
        return $rejected_bir;
    }
}
