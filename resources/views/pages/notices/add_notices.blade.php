@extends('pages.index',['title' => 'Add Notices'])

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Notice</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Add Notice</span>
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
            <div class="card card-custom">
                <!--begin::Card header-->
                <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                            <!--begin::Item-->
                            <li class="nav-item mr-3">
                                <a class="nav-link active" data-toggle="tab" href="#addNoticeTab">
                                    <span class="nav-icon">
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span class="nav-text font-size-lg">Notice</span>
                                </a>
                            </li>
                            <!--end::Item-->

                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body px-0">
                    <form class="form" id="addNoticeForm">
                        <div class="tab-content">
                            <!--begin::Tab-->
                            <div class="tab-pane show px-7 active" id="addNoticeTab" role="tabpanel">
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-7 my-2">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <label class="col-3"></label>
                                            <div class="col-9">
                                                <h6 class="text-dark font-weight-bold mb-10">Notice Details:</h6>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Notice Type</label>
                                            <div class="col-9">
                                                <select name="notice_type" id="notice_type" class="form-control form-control-lg form-control-solid sl2">
                                                    <option value="FIRST_NOTICE">First Notice</option>
                                                    <option value="SECOND_NOTICE">Second Notice</option>
                                                    <option value="THIRD_NOTICE">Third Notice</option>
                                                    <option value="TURNOVER_NOTICE">Takeover Notice</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Issuance Date</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg " type="text" id="issuance_date" name="issuance_date">
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Tenant</label>
                                            <div class="col-9">
                                                <select name="tenant" class="form-control form-control-lg form-control-solid sl2" id="tenantList">

                                                    @foreach ($tenants as $tenant)
                                                        <option value="{{$tenant->master_tenant->lease_number}}">{{$tenant->master_tenant->tenant}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row soaContainer">
                                            <label class="col-form-label col-3 text-lg-right text-left">SOA Number</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg " name="soa_number" type="text" >
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row d-none second-notice">
                                            <label class="col-form-label col-3 text-lg-right text-left">Notice From</label>
                                            <div class="col-9">
                                                <select name="notice_from" class="form-control form-control-lg ">
                                                    <option value="01">JANUARY</option>
                                                    <option value="02">FEBRUARY</option>
                                                    <option value="03">MARCH</option>
                                                    <option value="04">APRIL</option>
                                                    <option value="05">MAY</option>
                                                    <option value="06">JUNE</option>
                                                    <option value="07">JULY</option>
                                                    <option value="08">AUGUST</option>
                                                    <option value="09">SEPTEMBER</option>
                                                    <option value="10">OCTOBER</option>
                                                    <option value="11">NOVEMBER</option>
                                                    <option value="12">DECEMBER</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row d-none second-notice">
                                            <label class="col-form-label col-3 text-lg-right text-left">Notice To</label>
                                            <div class="col-9">
                                                <select name="notice_to" class="form-control form-control-lg">
                                                    <option value="01">JANUARY</option>
                                                    <option value="02">FEBRUARY</option>
                                                    <option value="03">MARCH</option>
                                                    <option value="04">APRIL</option>
                                                    <option value="05">MAY</option>
                                                    <option value="06">JUNE</option>
                                                    <option value="07">JULY</option>
                                                    <option value="08">AUGUST</option>
                                                    <option value="09">SEPTEMBER</option>
                                                    <option value="10">OCTOBER</option>
                                                    <option value="11">NOVEMBER</option>
                                                    <option value="12">DECEMBER</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Balance</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg " name="balance" type="text" >
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left" id="deadlineLable">Deadline Of Payment</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg" name="deadline" type="text"  id="deadline">
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row first_second_notice">
                                            <label class="col-form-label col-3 text-lg-right text-left" id="contactLable">Contact Number</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg" name="contact_number" type="text"  id="contact_number">
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row" id="takeover">
                                            <label class="col-form-label col-3 text-lg-right text-left" >Take-over date</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg" name="takeover_date" type="text"  id="takeoverdt" >
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Prepared By</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg " name="collection_officer" type="text" >
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-primary btn-lg" id="btnSubmitNotice">Submit</button>

                                        </div>
                                    </div>

                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab-->
                        </div>
                    </form>
                </div>
                <!--begin::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection

@push('scripts')
<script src="{{ mix('/js/pages/notice/add_notice.js')}}"></script>
@endpush
