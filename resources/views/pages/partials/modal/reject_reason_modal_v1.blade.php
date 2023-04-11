<div class="modal fade" id="reject_bir_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="reject_bir_modal_header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Reason</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="post" class="form" id="reject_reason_form">


                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Reason</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="mall_address">
                                <textarea class="form-control" id="status_message" type="text" name="status_message"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="closeBirRejectModal" data-bs-dismiss="modal">Close</button>
                <button type="button" id="reject_bir_button" data-id="{{$lease_id}}" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </div>
    </div>
</div>
