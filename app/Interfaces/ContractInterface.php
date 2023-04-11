<?php

namespace App\Interfaces;

interface ContractInterface
{
    public function contractSoaList($request);

    public function contractList($request,$contractID);

    public function createTenantContract($request, $tenant_id);

    public function contractBIR($request,$id);

    public function birList($request,$lease_id);

    public function birOthersList($tenant_number);

    public function officialReceiptList($request,$contractId);

    public function officialReceiptDownload($id);

    public function downloadProofOfPayment($id);

    public function storeOtherAttachment($request,$tenant_number);

    public function validateContractExist($id,$tenantNumber);

    public function addMoreTenantContract($request);

    public function attachProofOfPayment($request, $contract_id);

    public function popList($request, $lease_number);

    public function getContractBusinessType();

    public function rejectBIR2307($request,$id);

    public function acceptBIR2307($id);

    public function rejectedBir();
}
