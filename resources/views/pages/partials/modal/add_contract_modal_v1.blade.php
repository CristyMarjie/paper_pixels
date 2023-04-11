<div class="modal fade" id="addMoreTenantStore" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="addMoreTenantStore_header">
                <h5 class="modal-title" id="exampleModalLabel">Add More Tenant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="post" class="form" id="tenant_addMoreContract_form">
                    <div class="form-group row" id="tenant_number">
                        <label class="col-form-label col-xl-3 col-lg-3">Tenant Name</label>
                        <div class="col-xl-9 col-lg-9">
                            <select class="form-control select2" style="width: 100%" name="tenant_number" id="tenant_select2">
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-xl-3 col-lg-3">Location</label>
                        <div class="col-xl-9 col-lg-9">
                            <div class="form-group">
                                <input type="text" id="location" class="form-control form-control-solid form-control-lg" name="location" value="" disabled/>
                            </div>
                        </div>
                    </div>

                    <label class="text-danger d-none invalid-tenant" style="padding-left:27%;">Tenant already existed</label>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="addContractModal" data-dismiss="modal">Close</button>
                <button type="button" id="contract_submit" data-id="{{$tenant_id}}" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{asset('/js/pages/contract/add_more_contract.js')}}"></script>
@endpush
