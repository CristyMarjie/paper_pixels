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
use App\Models\Product;
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





    public function products()
    {
        return Cache::rememberForever('productlist', fn()=>Product::with('user.people')->get());
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
