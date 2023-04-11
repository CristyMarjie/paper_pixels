<div class="modal fade" id="addCcAnalystModal" tabindex="-1" role="dialog" aria-labelledby="addCcAnalystModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add CC Analyst</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="post" class="form" id="create_analyst_form">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Name</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="analyst_name">
                                <input class="form-control" id="analyst_name" type="text" name="analyst_name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Email</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="analyst_email">
                                <input class="form-control" id="analyst_email" type="text" name="analyst_email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Contact</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="analyst_contact">
                                <input class="form-control" id="analyst_contact" type="text" name="analyst_contact">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="closeAnalystModal" data-dismiss="modal">Close</button>
                <button type="button" id="analyst_modal_submit"  class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('/js/pages/malldirectory/add_analyst.js')}}"></script>
@endpush

