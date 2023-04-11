<div class="modal fade" id="{{$modal_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="{{$modal_id}}_header">
                <h5 class="modal-title" id="exampleModalLabel">Add Mall</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="post" class="form" id="create_mall_form">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Mall Name</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">

                                <input class="form-control" id="mall_name" type="text" name="mall_name">

                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Office Hours</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="mall_hours">
                                <input class="form-control" id="mall_hours" type="text" name="mall_hours">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Mall Address</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="mall_address">
                                <textarea class="form-control" id="mall_address" type="text" name="mall_address"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <h5 class="col-form-label col-lg-12 col-sm-12 modal-title text-center">Credit & Collection Analyst</h5>
                    </div>

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

                    <div class="form-group row">
                        <h5 class="col-form-label col-lg-12 col-sm-12 modal-title text-center">POS Admin</h5>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Name</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="pos_name">
                                <input class="form-control" id="pos_name" type="text" name="pos_name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Email</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="pos_email">
                                <input class="form-control" id="pos_email" type="text" name="pos_email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Contact</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="pos_contact">
                                <input class="form-control" id="pos_contact" type="text" name="pos_contact">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="closeMallModal" data-dismiss="modal">Close</button>
                <button type="button" id="mall_modal_submit" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('/js/pages/malldirectory/add_mall.js')}}"></script>
@endpush

