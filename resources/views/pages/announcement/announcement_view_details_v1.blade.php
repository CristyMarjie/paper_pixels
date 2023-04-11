@extends('pages.index',['title' => 'Profile'])

@section('content')
<div class="container">
        <!--begin::Body-->
        <div class="card-body p-0">
            <!--begin::Header-->
            <div class="d-flex align-items-center justify-content-between flex-wrap card-spacer-x py-3">
                <!--begin::Title-->
                <div class="d-flex flex-column mr-2 py-2">
                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mr-3">{{$announcement->title}}</a>
                    <div class="d-flex align-items-center py-1">
                        <a href="#" class="d-flex align-items-center text-muted text-hover-primary mr-2">
                        <span class="fa fa-genderless text-danger icon-md mr-2"></span>In progress</a>
                        <a href="#" class="d-flex align-items-center text-muted text-hover-primary">
                        <span class="fa fa-genderless text-success icon-md mr-2"></span>Urgent</a>
                    </div>
                </div>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="d-flex py-2">
                    <span class="btn btn-default btn-sm btn-icon" data-dismiss="modal">
                        <i class="flaticon2-fax"></i>
                    </span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Messages-->
            <div class="mb-3">
                <!--begin::Message-->
                <div class="cursor-pointer shadow-xs toggle-on" data-inbox="message">
                    <!--begin::Info-->
                    <div class="d-flex align-items-start card-spacer-x py-4">
                        <!--begin::User Photo-->
                        <span class="symbol symbol-35 mr-3 mt-1">
                            <span class="symbol-label" style="background-image: url('../assets/images/blank.png')"></span>
                        </span>
                        <!--end::User Photo-->
                        <!--begin::User Details-->
                        <div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
                            <div class="d-flex">
                                @foreach ($announcement->user_announcements as $intended)
                                    <a href="#" class="font-size-lg font-weight-bolder text-dark-75 text-hover-primary mr-2">{{$intended->role->description}},</a>
                                @endforeach

                                <div class="font-weight-bold text-muted">
                                <span class="label label-success label-dot mr-2"></span>{{$day_count}} Day ago</div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="toggle-off-item">
                                    <span class="font-weight-bold text-muted cursor-pointer" data-toggle="dropdown">to me
                                    <i class="flaticon2-down icon-xs ml-1 text-dark-50"></i></span>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-left p-5">
                                        <table>
                                            <tr>
                                                <td class="text-muted w-75px py-2">From</td>
                                                <td>{{$addedBy->people->full_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted py-2">Date:</td>
                                                <td>{{date('F jS, Y',strtotime($announcement->created_at))}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted py-2">Reply to:</td>
                                                <td>{{$addedBy->email}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="text-muted font-weight-bold toggle-on-item" data-inbox="toggle">With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part....</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-muted mr-2">{{\Carbon\Carbon::now()->toDateTimeString()}}</div>
                            <div class="d-flex align-items-center" data-inbox="toolbar">
                                <span class="btn btn-clean btn-xs btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="Star">
                                    <i class="flaticon-star icon-1x text-warning"></i>
                                </span>
                                <span class="btn btn-clean btn-xs btn-icon" data-toggle="tooltip" data-placement="top" title="Mark as important">
                                    <i class="flaticon-add-label-button icon-1x"></i>
                                </span>
                            </div>
                        </div>
                        <!--end::User Details-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Comment-->
                    <div class="card-spacer-x pt-2 pb-5 toggle-off-item">
                        <!--begin::Text-->
                        <div class="mb-1">
                            <p>{!! $announcement->description !!}</p>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Comment-->
                </div>
                <!--end::Message-->

            </div>
            <!--end::Messages-->
        </div>
        <!--end::Body-->
</div>
@endsection

