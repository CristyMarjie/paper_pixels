@extends('pages.index',['title' => 'Contract Details'])

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
@section('content')
<meta name="user_role" content="{{Auth::user()->super_user}}">
<div class="container">
<div class="card card-custom gutter-b">
    <div class="card-body">
        <div class="d-flex">
            <!--begin::Pic-->
            <div class="flex-shrink-0 mr-7">
                <div class="symbol symbol-50 symbol-lg-120">
                    <img alt="Pic" src="{{asset('/assets/images/logo.png')}}">
                </div>
            </div>
            <!--end::Pic-->
            <!--begin: Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <!--begin::User-->
                    <div class="mr-3">
                        <div class="d-flex align-items-center mr-3">
                            <!--begin::Name-->
                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$details->lesse_trade_name}}</a>
                            <!--end::Name-->
                        </div>
                        <!--begin::Contacts-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="javsacript:;" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                <!--begin::Svg Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>{{$details->tenant->additional->user->email}}</a>
                            <a href="javascript:;" class="text-muted text-hover-primary font-weight-bold">
                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>{{$details->tenant->additional->user->people->address1}}</a>
                        </div>
                        <!--end::Contacts-->
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Title-->
                <!--begin::Content-->
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <!--begin::Description-->
                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5" style="max-width: 450px;text-align: justify">
                            <div class="d-flex">
                                <span class="text-dark-75 font-weight-bolder mr-2">Lessee Name:</span>
                                <a href="javascript:;" class="text-muted text-hover-primary">{{$details->lessee}}</a>
                            </div>
                            <div class="d-flex">
                                <span class="text-dark-75 font-weight-bolder mr-2">Address:</span>
                                <a href="javascript:;" class="text-muted text-hover-primary">{{$details->address}}</a>
                            </div>
                            <div class="d-flex">
                                <span class="text-dark-75 font-weight-bolder mr-2">Line Of Business:</span>
                                <a href="javascript:;" class="text-muted text-hover-primary">{{$details->business_line}} <small>{{$details->business_type}}</small></a>
                            </div>
                            <div class="d-flex">
                                <span class="text-dark-75 font-weight-bolder mr-2">Location & Floor Area:</span>
                                <a href="javascript:;" class="text-muted text-hover-primary">{{$details->location}} {{$details->floor_area}} &#13217;</a>
                            </div>

                            {{-- @if ($details->attachments)
                                <div class="d-flex">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Attachment:</span>
                                    <a href="/download?id={{$details->attachments->id}}&filename={{$details->attachments->filename}}" class="text-muted text-hover-primary">{{$details->attachments->filename}}</a>
                                </div>
                            @endif --}}
                    </div>
                   <!--end::Description-->
                <!--end::Content-->
            </div>
            <!--end::Info-->
        </div>
    </div>
</div>
</div>


<div class="row">
    <div class="col-xl-4 pb-10">
        <div class="card card-custom">
            <div class="card-header h-auto py-4">
                <div class="card-title">
                    <h3 class="card-label">Modules
                    <span class="d-block text-muted pt-2 font-size-sm">Sub Modules</span></h3>
                </div>
            </div>
            <div class="card-body py-4">
                <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                    <div class="navi-item mb-2">
                        <a href="javascript:;" class="navi-link py-4 active">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                            <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                            <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">BIR Related</span>
                        </a>
                    </div>
                    <div class="navi-item mb-2">
                        <a href="javascript:;" class="navi-link py-4">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Reports</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-8">
        <div class="card card-custom gutter-b">
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-bold nav-tabs-line-3x" role="tablist">
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#kt_statement_of_account">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"></path>
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"></circle>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text">Statement Of Account</span>
                            </a>
                        </li>

                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_official_receipt">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"></path>
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"></circle>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text">Official Receipt</span>
                            </a>
                        </li>

                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_bir_2307">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"></path>
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"></circle>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text">BIR 2307</span>
                            </a>
                        </li>

                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_pop">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"></path>
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"></circle>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text">Proof of Payment</span>
                            </a>
                        </li>

                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_others">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"></path>
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"></circle>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text">Others</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="dropdown dropdown-inline mr-2 mt-5">
                {{-- @if(Auth::user()->role_id == 1)
                <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addSoaModal">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                    </span>Add SOA
                </a>
                @endif --}}
                </div>

            </div>
            {{--  --}}
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="kt_statement_of_account" role="tabpanel">
                        <div class="mb-7" >
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="SOA Number" id="kt_datatable_search_query" />
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block w-100px">SOA Date</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="statement_date_search" placeholder="Select date" id='statementDateSearch' />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar-check-o"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-5 mt-lg-0">
                                            <a href="javascript:;" id="soaSearchClear" class="btn btn-light-primary px-6 font-weight-bold">Clear</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="datatable datatable-bordered datatable-head-custom" id="statementOfAccounts"></div>
                    </div>

                    <div class="tab-pane fade" id="kt_official_receipt" role="tabpanel">
                        <div class="datatable datatable-bordered datatable-head-custom" id="officialReceipts"></div>
                    </div>

                    <div class="tab-pane fade" id="kt_bir_2307" role="tabpanel">
                        <div class="mb-7" >
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-12">
                                <div class="row align-items-center">
                                        <div class="col-md-8 my-md-0">
                                            <div class='input-group'>
                                                <label class="mr-3 mt-3 mb-0 d-none d-md-block w-100px">BIR Date Range</label>
                                                <input type='text' class="ml-15 form-control" readonly="readonly" placeholder="Select date range" id='kt_daterangepicker_1_validate'/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar-check-o"></i>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="ml-15 d-flex align-items-center">
                                            <a class="btn btn-light-primary font-weight-bold ml-2" data-toggle="modal" data-target="#addBirModal">
                                                <i class="flaticon2-plus-1"></i>
                                                Attach BIR
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="datatable datatable-bordered datatable-head-custom" id="bir2307"></div>
                    </div>

                    <div class="tab-pane fade" id="kt_pop" role="tabpanel">
                        <div class="mb-7" >
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-12">
                                <div class="row align-items-center">

                                        <div class="col-md-8 my-md-0">
                                            <div class='input-group'>
                                                <label class="mr-3 mt-3 mb-0 d-none d-md-block w-100px">Date Range</label>
                                                <input type='text' class="ml-15 form-control" readonly="readonly" placeholder="Select date range" id='kt_daterangepicker_1_validate'/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar-check-o"></i>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="ml-15 d-flex align-items-center">
                                            <a class="btn btn-light-primary font-weight-bold ml-2" data-toggle="modal" data-target="#addPOPModal">
                                                <i class="flaticon2-plus-1"></i>
                                                Attach Proof of Payment
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="datatable datatable-bordered datatable-head-custom" id="pop_attachments"></div>
                    </div>

                    <div class="tab-pane fade" id="kt_others" role="tabpanel">
                        <div class="mb-7" >
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-12">
                                <div class="row align-items-center">

                                        <div class="col-md-8 my-md-0">
                                            <div class='input-group'>
                                                <label class="mr-3 mt-3 mb-0 d-none d-md-block w-100px">Date Filter</label>
                                                <input type='text' class="ml-15 form-control" readonly="readonly" placeholder="Select date range" id='kt_daterangepicker_1_validate'/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar-check-o"></i>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="ml-15 d-flex align-items-center">
                                            <a class="btn btn-light-primary font-weight-bold ml-2" data-toggle="modal" data-target="#addOthersModal">
                                                <i class="flaticon2-plus-1"></i>
                                                Attach
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="datatable datatable-bordered datatable-head-custom" id="others"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('pages.partials.modal.add_soa_modal_v1')
@include('pages.partials.modal.add_bir_modal_v1',['lease_id' => $details->lease_number])
@include('pages.partials.modal.add_others_modal_v1',['tenant_number' => $details->tenant_number])
@include('pages.partials.modal.add_proof_of_payment_modal_v1',['lease_id' => $details->lease_number])
@include('pages.partials.modal.reject_reason_modal_v1',['lease_id' => $details->lease_number])
@endsection

@push('scripts')
<script>
    let tenantId= {!! $details->tenant_number !!}
    let leaseNumber = {!! $details->tenant_number !!}
</script>

<script src="{{asset('/js/pages/contract/official_receipt.js')}}"></script>
<script src="{{asset('/js/pages/contract/contract_details.js')}}" async></script>
@endpush
