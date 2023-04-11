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
<div class="modal fade" id="addAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" id="addContractModal_header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="post" class="form" id="create_announcement_form">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Announcement Title</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="title">
                                <input class="form-control" id="title" type="text" name="title">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Announcement Date</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="timestamp">
                                <input class="form-control" id="timestamp" type="text" name="timestamp">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Intended For</label>
                        <div class="col-lg-8 col-md-12 col-sm-12 pt-3">
                            @foreach (\App\Models\Role::get(); as $role)
                                <label class="px-2" class="checkbox checkbox-outline checkbox-success">
                                    <input class="px-2 mb-5 intended_for"   type="checkbox" name="roles[]" value="{{$role->id}}"/> {{$role->description}}

                                    <span></span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row" id="sendOption">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Specific or Category</label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label class="switch">
                                <input type="checkbox" id="sendOption_slider">
                                <span class="slider round"></span>
                              </label>

                        </div>
                    </div>


                    <div class="form-group row" id="specific_category">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Category</label>
                         <div class="col-lg-8 col-md-12 col-sm-12">
                            <select autocomplete="off" style="width: 100%" class="form-control form-control-solid form-control-lg" multiple="multiple" name="category[]" id="category">
                                    <option value="0">All</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="specific_tenant">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Tenant</label>
                         <div class="col-lg-8 col-md-12 col-sm-12">
                            <select autocomplete="off" style="width: 100%" class="form-control form-control-solid form-control-lg" multiple="multiple" name="specific[]" id="specific">
                                    <option value="0">All</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Attachments</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="file-loading">
                                <input id="announcementAttachment" name="announcementAttachment[]" type="file" multiple data-show-preview="false">
                            </div>
                            <div class="fv-plugins-message-container">
                                <div data-field="announcementAttachment" data-validator="announcementAttachment" id="attachment_error" class="fv-help-block">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Description</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <textarea name="description" id="kt-ckeditor-1">
                            </textarea>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="addAnnounceModal" data-dismiss="modal">Close</button>
                <button type="button" id="announcement_submit" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')

<script src="{{asset('/js/globals/fileinput.min.js')}}"></script>
<script src="{{ asset('/js/globals/ckeditor-classic.bundle.js')}}"></script>
<script src="{{ asset('/js/pages/announcement/add_announcement.js')}}"></script>
@endpush

