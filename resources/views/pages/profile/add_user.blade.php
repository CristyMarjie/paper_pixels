@extends('pages.index',['title' => 'Profile'])

@section('content')
<link rel="stylesheet" href="{{ asset('/css/globals/wizard-4.css')}}">

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">New User</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Enter user details and submit</span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom card-transparent">
                <div class="card-body p-0">
                    <!--begin::Wizard-->
                    <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
                        <!--begin::Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps">
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">1</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Profile</div>
                                            <div class="wizard-desc">User's Personal Information</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">2</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Account</div>
                                            <div class="wizard-desc">User's Account &amp; Settings</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">3</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Address</div>
                                            <div class="wizard-desc">User's Address</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">4</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Submission</div>
                                            <div class="wizard-desc">Review and Submit</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Nav-->
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                        <form class="form" id="kt_form">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <h5 class="text-dark font-weight-bold mb-10">User's Profile Details:</h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="image-input image-input-outline" id="kt_user_add_avatar">
                                                                    <div class="image-input-wrapper"></div>
                                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                                        <input id="profile_avatar" type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                                        <input type="hidden" name="profile_avatar_remove" />
                                                                    </label>
                                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="first_name" type="text" value="" />
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="last_name" type="text" value="" />
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="phone_number" placeholder="Phone" />
                                                                </div>
                                                                <span class="form-text text-muted">Enter valid PH phone number(e.g: 09458215816).</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                         <!--begin::Group-->
                                                         <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Tin (Optional)</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="tin" type="text" value="" />
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                    </div>
                                                    <!--end::Wizard Step 1-->
                                                    <!--begin::Wizard Step 2-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <h5 class="text-dark font-weight-bold mb-10 mt-5">User's Account Details</h5>

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-xl-3 col-lg-3">Role</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <select autocomplete="off" class="form-control form-control-solid form-control-lg" name="role_id" id="role_id">
                                                                    @foreach ($roles as $role )
                                                                        <option value="{{$role->id}}">{{$role->description}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" id="finance_SU" hidden>
                                                            <label class="col-form-label col-xl-3 col-lg-3">Super User</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <label class="switch">
                                                                    <input type="checkbox" name="super_user" id="super_user">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" id="tenant_number" hidden>
                                                            <label class="col-form-label col-xl-3 col-lg-3">Tenant Name</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                {{-- <input class="form-control form-control-solid form-control-lg" name="tenant_number" type="text" value=""/> --}}
                                                                <select class="form-control select2" style="width: 100%" name="tenant_number[]" id="tenant_select2">

                                                                </select>
                                                            </div>

                                                            <label class="col-form-label col-xl-3 col-lg-3 pt-5">Location</label>
                                                            <div class="col-xl-9 col-lg-9 pt-5">
                                                                <div class="form-group">
                                                                    <input type="text" id="location" class="form-control form-control-solid form-control-lg" name="location" value="" disabled/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <div class="separator separator-dashed my-10"></div>
                                                        <h5 class="text-dark font-weight-bold mb-10">User's Account Settings</h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-at"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="email" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-xl-3 col-lg-3">Password</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="password" type="password" value="" />
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-xl-3 col-lg-3">Confirm Password</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="confirm_password" type="password" value="" />
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                    </div>
                                                    <!--end::Wizard Step 2-->
                                                    <!--begin::Wizard Step 3-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <h5 class="mb-10 font-weight-bold text-dark">Setup Your Address</h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group">
                                                            <label>Location</label>
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <select autocomplete="off" class="form-control form-control-solid form-control-lg" name="address1">
                                                                    @foreach ($locations as $location)
                                                                        <option value="{{$location->location}}">{{$location->location}}</option>
                                                                    @endforeach
                                                                </select>                                </div>
                                                            <span class="form-text text-muted">Please enter gmall address code ex: GMDV for Davao.</span>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label>Location</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="address1" placeholder="Address Line 1" value="GMDV" />
                                                            <span class="form-text text-muted">Please enter gmall address code ex GMDV for Davao.</span>
                                                        </div> --}}
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <!--begin::Group-->
                                                                <div class="form-group">
                                                                    <label>Postcode</label>
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="postcode" placeholder="Postcode" value="3000" />
                                                                    <span class="form-text text-muted">Please enter your Postcode.</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="col-xl-6">
                                                                <div class="form-group">
                                                                    <label>City</label>
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="city" placeholder="City" value="Melbourne" />
                                                                    <span class="form-text text-muted">Please enter your City.</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <!--end::Row-->

                                                    </div>
                                                    <!--end::Wizard Step 3-->
                                                    <!--begin::Wizard Step 4-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <h5 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h5>
                                                        <!--begin::Item-->
                                                        <div class="border-bottom mb-5 pb-5">
                                                            <div class="font-weight-bolder mb-3">Your Account Details:</div>
                                                            <div class="mb-1">First Name: <span class="first_name font-weight-bold"></span></div>
                                                            <div class="mb-1">Last Name: <span class="last_name font-weight-bold"></span></div>
                                                            <div class="mb-1">Email: <span class="email font-weight-bold"></span></div>
                                                            <div class="mb-1">Contact Number: <span class="phone_number font-weight-bold"></span></div>
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="border-bottom mb-5 pb-5">
                                                            <div class="font-weight-bolder mb-3">Your Address Details:</div>
                                                            <div class="mb-1">Address: <span class="address1 font-weight-bold"></span></div>
                                                            <div class="mb-1">Postcode: <span class="postcode font-weight-bold"></span></div>
                                                            <div class="mb-1">City: <span class="city font-weight-bold"></span></div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 4-->
                                                    <!--begin::Wizard Actions-->
                                                    <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                        <div class="mr-2">
                                                            <button id="prev-step" class="btn btn-light-primary font-weight-bolder px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                                        </div>
                                                        <div>
                                                            <button type="button" id="btnSubmit" class="btn btn-light-primary font-weight-bolder px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                            <button id="next-step" class="btn btn-primary font-weight-bolder px-9 py-4" data-wizard-type="action-next">Next</button>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Actions-->
                                                </div>
                                            </div>
                                        </form>
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Wizard-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

@endsection

@push('scripts')
<script src="{{ asset('/js/pages/profile/add-user.js')}}"></script>
@endpush
