@extends('pages.index',['title' => 'Tenants'])

@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">

                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <input type="text" data-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search User"/>
                </div>
                <!--end::Search-->
            <div class="card-toolbar">
                <a class="btn btn-light-primary font-weight-bold mr-2" data-toggle="modal" data-target="#addAnnouncementModal">Add Announcement</a>
            </div>
        </div>
        <div class="card-body">

            @foreach ($Announcements as $announcement)
                <div class="list list-hover">
                        <div class="d-flex align-items-start list-item card-spacer-x py-4" data-inbox="message">
                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center">
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center mr-3" data-inbox="actions">
                                    <!--begin::Buttons-->
                                    <a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" >
                                        <i class="flaticon-star text-muted"></i>
                                    </a>
                                    <!--end::Buttons-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Info-->
                            <div class="flex-grow-1 mt-1 mr-2" data-toggle="view">
                                <!--begin::Title-->
                                <div class="font-weight-bolder mr-2">
                                    <a style="color:black;" href="{{route('announcement.view',['id' => $announcement->id])}}">{{$announcement->title}}</a>
                                </div>
                                <!--end::Title-->
                                <!--begin::Labels-->
                                <div class="mt-2">
                                    <span class="label label-light-danger font-weight-bold label-inline">{{$announcement->user_announcements['added_by_data']->people->full_name}}</span>
                                </div>
                                <!--end::Labels-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Details-->
                            <div class="d-flex align-items-center justify-content-end flex-wrap" data-toggle="view">
                                <!--begin::Datetime-->
                                <div class="font-weight-bolder" data-toggle="view">{{date('F jS, Y',strtotime($announcement->created_at))}}</div>
                                <!--end::Datetime-->
                                <!--begin::User Photo-->
                                <span class="symbol symbol-30 ml-3">
                                    <a href="{{route('announcement.deactivate',['announcementID' => $announcement->id])}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                    <rect x="0" y="7" width="16" height="2" rx="1"/>
                                                    <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                                </g>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </a>
                                </span>
                                <!--end::User Photo-->
                            </div>
                            <!--end::Details-->
                        </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--end::Card-->
</div>
@include('pages.announcement.announcement_modal.add_announcement_modal_v1')
@endsection

