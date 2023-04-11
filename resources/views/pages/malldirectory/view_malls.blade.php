@extends('pages.index',['title' => 'Tenants'])


@section('content')
    <div class="container">
        <div class="card card-custom">
            <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Subheader-->
            <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
                <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                    <!--begin::Details-->
                    <div class="d-flex align-items-center flex-wrap mr-2">
                        <!--begin::Title-->
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{Str::plural('Mall', $mallDirectories)}}</h5>
                        <!--end::Title-->
                        <!--begin::Separator-->
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Search Form-->
                        <div class="d-flex align-items-center" id="kt_subheader_search">
                            <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{$count}} Total</span>
                            <form class="ml-5">
                                <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                                    <input type="text" class="form-control" id="kt_subheader_search_form" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Search Form-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Toolbar-->
                    <div class="d-flex align-items-center">
                        <!--begin::Button-->
                        <a href="#" class=""></a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        @if(Auth::user()->isAdmin())
                        <a class="btn btn-light-primary font-weight-bold ml-2" data-toggle="modal" data-target="#addMallModal">Add Mall</a>
                        @endif
                        <!--end::Button-->
                    </div>
                    <!--end::Toolbar-->
                </div>
            </div>
            <!--end::Subheader-->
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Row-->
                    <div class="row">
                        @foreach ($mallDirectories as $key => $mallDirectory)

                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                                   <!--begin::Card-->
                            <div class="card card-custom gutter-b card-stretch">

                                <!--begin::Body-->
                                <div class="card-body pt-4">
                                    @if(Auth::user()->isAdmin())
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end">
                                        <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                <!--begin::Naviigation-->
                                                <ul class="navi">
                                                    <li class="navi-header font-weight-bold py-5">
                                                        <span class="font-size-lg">Add New:</span>

                                                    </li>
                                                    <li class="navi-separator mb-3 opacity-70"></li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link add_analyst" data-toggle="modal" data-id="{{$mallDirectory->id}}" data-target="#addCcAnalystModal" id="">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-user-plus"></i>
                                                            </span>
                                                            <span class="navi-text" data-id="{{$mallDirectory->id}}">Add Analyst</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-separator mt-3 opacity-70"></li>
                                                </ul>
                                                <!--end::Naviigation-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Toolbar-->
                                    @endif
                                    <!--begin::User-->
                                <div class="d-flex align-items-center mb-7">
                                        <!--begin::Pic-->
                                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                            <div class="symbol symbol-circle symbol-lg-75 d-none">
                                                <img src="assets/media/users/300_10.jpg" alt="image" />
                                            </div>

                                            <div class="symbol symbol-lg-75 symbol-circle symbol-{{$colorClasses[rand(0,count($colorClasses) -1)]}}">
                                                <span class="symbol-label font-size-h3 font-weight-boldest">{{ucwords($mallDirectory->mall_name[0])}}</span>
                                            </div>

                                        </div>
                                        <!--end::Pic-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{$mallDirectory->mall_name}}</a>
                                            <span class="text-muted font-weight-bold">{{$mallDirectory->mall_hours}}</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Desc-->
                                    <p class="mb-7">{{$mallDirectory->mall_address}}</p>
                                    <!--end::Desc-->
                                    <!--begin::Info-->
                                    <div class="mb-7">
                                        <div class="d-flex flex-column">
                                            <span class="text-muted font-weight-bold">POS Admin</span>
                                        </div>


                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-dark-75 font-weight-bolder mr-2">Name:</span>
                                            <a href="#" class="text-muted text-hover-primary">{{$mallDirectory->posAdmin->pos_name}}</a>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                                            <a href="#" class="text-muted text-hover-primary">{{$mallDirectory->posAdmin->pos_email}}</a>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-cente my-2">
                                            <span class="text-dark-75 font-weight-bolder mr-2">Contact:</span>
                                            <a href="#" class="text-muted text-hover-primary">{{$mallDirectory->posAdmin->pos_contact}}</a>
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                    <a class="btn btn-block btn-sm btn-light-success font-weight-bolder text-uppercase py-4" data-toggle="modal" data-target="#viewModalCenter_{{$key}}">Credit & Collection Analyst</a>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            @include('pages.partials.modal.mall_directory_modal.view_credit_analyst_modal_v1',['collectionTeams' => $mallDirectory->creditCollectionAnalysts, 'key' => $key])
                        @endforeach
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->

        <div class="modal fade updateModalCenter" id="updateModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Credit & Collection Analyst</h5>
                    </div>

                    <div class="modal-body">
                            <form action="post" class="form" id="update_analyst_form">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-right">Name</label>
                                    <div class="col-lg-8 col-md-12 col-sm-12">
                                        <div>
                                            <input class="form-control analyst_data analyst_name" id="analyst_name" type="text" name="analyst_name" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-right">Email</label>
                                    <div class="col-lg-8 col-md-12 col-sm-12">
                                        <div class="analyst_email">
                                            <input class="form-control analyst_data" id="analyst_email" type="text" name="analyst_email">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-right">Contact</label>
                                    <div class="col-lg-8 col-md-12 col-sm-12">
                                        <div class="analyst_contact">
                                            <input class="form-control analyst_data" id="analyst_contact" type="text" name="analyst_contact">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" id="closeAnalystModal">Close</button>
                            <button type="button" id="analyst_modal_update_submit" data-id="" class="btn btn-primary font-weight-bold">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <button type="button" id="analyst_modal_submit" data-id="" class="btn btn-primary font-weight-bold">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        @include('pages.partials.modal.mall_directory_modal.add_mall_modal_v1',['modal_id' => 'addMallModal'])
        {{-- End Modal --}}
        </div>
    </div>

@endsection

@push('scripts')
<script src="{{ asset('/js/pages/malldirectory/add_analyst.js')}}"></script>
<script src="{{ asset('/js/pages/malldirectory/analyst_action.js')}}"></script>
@endpush




