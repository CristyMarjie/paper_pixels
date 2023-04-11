@push('styles')
<link href="{{asset('/css/globals/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
<style>
.file-upload-indicator,.btn-close , .fileinput-pause-button{
    display: none !important;
}

.child_datatable > .datatable-pager
{
    display: none !important;
}
</style>
@endpush
<div class="modal fade" id="addPOPModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="addPOPModal_header">
                <h5 class="modal-title" id="exampleModalLabel">Attach Proof of Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="post" class="form" id="tenant_addPOP_form">


                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Date</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="date" placeholder="Select date" id='select_date' />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Attachments</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="file-loading">
                                <input id="PopAttachments" name="PopAttachments[]" type="file" multiple data-show-preview="false">
                            </div>
                            <div class="fv-plugins-message-container">
                                <div data-field="PopAttachments" data-validator="PopAttachments" id="attachment_error" class="fv-help-block">

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="addPopModal_cancel" data-dismiss="modal">Close</button>
                <button type="button" id="Pop_submit" data-id="{{$lease_id}}" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{asset('/js/globals/fileinput.min.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/plugins/sortable.min.js" type="text/javascript"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/js/pages/contract/proof_of_payment.js')}}"></script>
@endpush
