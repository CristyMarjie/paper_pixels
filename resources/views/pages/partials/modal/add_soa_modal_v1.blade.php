<div class="modal fade" id="addSoaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="addSoaModal_header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Statement of Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="post" class="form" id="tenant_addSoa_form">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Statement of Account Number</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="lessor">
                                <input class="form-control" id="statement_of_account" type="text" name="statement_of_account_number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Statement Date</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="statement_date" placeholder="Select date" id='statementDate' />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Rental Period</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="rental_period" placeholder="Select date" id='rentalPeriodStart' />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Payment Due Date</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="payment_due_date" placeholder="Select date" id='paymentDue' />
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
                                <input id="attachments" name="soaAttachments[]" type="file" multiple data-show-preview="false">
                            </div>
                            <div class="fv-plugins-message-container">
                                <div data-field="soaAttachments" data-validator="attachments" id="attachment_error" class="fv-help-block">

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="addSoaModal_cancel" data-dismiss="modal">Close</button>
                <button type="button" id="soa_submit" data-id="{{$user_id}}" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </div>
    </div>
</div>

