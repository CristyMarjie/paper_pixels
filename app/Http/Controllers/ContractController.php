<?php

namespace App\Http\Controllers;

use App\Interfaces\ContractInterface;
use App\Models\BirAttachment;
use App\Models\BirOther;
use App\Models\MasterContract;
use App\Models\TenantAttachablesLog;
use App\Models\MasterTenant;
use App\Models\User;
use App\Traits\ResponseApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContractController extends Controller
{

    use ResponseApi;

    protected $contractInterface;

    public function __construct(ContractInterface $contractInterface)
    {
        $this->contractInterface = $contractInterface;
    }

    public function createTenantContract(Request $request, $tenant_id)
    {
        return $this->contractInterface->createTenantContract($request, $tenant_id);
    }

    public function contractList(Request $request,$contractID)
    {
        return $this->contractInterface->contractList($request, $contractID);
    }

    public function contractListView(int $id = null)
    {
        User::with('tenants')->findOrFail(($id ?? Auth::user()->id));
        return view('pages.contract.contract_list',['tenant_id' => ($id ?? Auth::user()->id), 'tenants' => MasterTenant::whereNotNull('tenant_number')->get()]);
    }

    public function contractDetails(int $id = null)
    {
        return view('pages.contract.contract_details',[
            'user_id' => $id,
            'details' => MasterContract::with('tenant.additional.user.people')->where('lease_number',$id)->first()
        ]);
    }

    public function contractSoaList(Request $request)
    {
        return $this->contractInterface->contractSoaList($request);
    }

    public function birList(Request $request, $lease_id)
    {
        return $this->contractInterface->birList($request, $lease_id);
    }

    public function popList(Request $request, $lease_number)
    {
        return $this->contractInterface->popList($request, $lease_number);
    }

    public function contractBIR(Request $request, $id)
    {
        return $this->contractInterface->contractBIR($request,$id);
    }

    public function downloadBir($bir_id)
    {

        $bir = BirAttachment::where('id',$bir_id)->firstOrFail();
        if(!Storage::exists($bir->path)) abort(404);

        return Storage::download($bir->path,$bir->filename);
    }

    public function downloadBirOther($birOtherID)
    {
        $birOthers = BirOther::where('id', $birOtherID)->firstOrFail();
        if(!Storage::exists($birOthers->path)) abort(404);

        return Storage::download($birOthers->path, $birOthers->filename);
    }

    public function downloadProofOfPayment($id)
    {
        return $this->contractInterface->downloadProofOfPayment($id);
    }

    public function officialReceiptList(Request $request,$contractId)
    {
        return $this->contractInterface->officialReceiptList($request,$contractId);
    }


    public function officialReceiptDownload($id)
    {
        return $this->contractInterface->officialReceiptDownload($id);
    }

    public function storeOtherAttachment(Request $request, $tenant_number)
    {
       return $this->contractInterface->storeOtherAttachment($request, $tenant_number);
    }

    public function birOthersList($tenant_number)
    {
        return $this->contractInterface->birOthersList($tenant_number);
    }

    public function validateContractExist(Request $request,$tenantNumber)
    {
        return $this->contractInterface->validateContractExist($request->id,$tenantNumber);
    }

    public function addMoreTenantContract(Request $request)
    {
        return $this->contractInterface->addMoreTenantContract($request);
    }

    public function attachProofOfPayment(Request $request, $contract_id)
    {
        return $this->contractInterface->attachProofOfPayment($request, $contract_id);
    }

    public function getContractBusinessType()
    {
        return $this->contractInterface->getContractBusinessType();
    }

    public function rejectBIR2307(Request $request, $contract_id)
    {
        return $this->contractInterface->rejectBIR2307($request, $contract_id);
    }

    public function acceptBIR2307($id)
    {
        return $this->contractInterface->acceptBIR2307($id);
    }

    public function rejectedBir()
    {
        return $this->contractInterface->rejectedBir();
    }
}
