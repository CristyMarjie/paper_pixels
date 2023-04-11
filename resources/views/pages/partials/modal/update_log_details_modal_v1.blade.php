<div class="modal fade" id="logDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="_header">
                <h5 class="modal-title" id="exampleModalLabel">Update User Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="post" class="form" id="update_user_profile">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">First Name</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                                <input class="form-control"  type="text" name="first_name" id="first_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Last Name</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="mall_hours">
                                <input class="form-control"  type="text" name="last_name" id="last_name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Address</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="mall_address">
                                <textarea class="form-control"  type="text" name="address1" id="address1"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Contact Phone</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="mall_address">
                                <input class="form-control"  type="text" name="phone_number" id="phone_number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Email Address</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="mall_address">
                                <input class="form-control"  type="text" name="email" id="email">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="DeclineUserUpdateModal" >Decline</button>
                <button type="button" id="system_logs_accept_update" class="btn btn-primary font-weight-bold">Accept</button>
            </div>
        </div>
    </div>
</div>

