<div class="dropdown">
    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
            <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-white">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>

                    <span class="label label-sm label-light-danger label-rounded font-weight-bolder position-absolute top-0 right-0 mt-1 mr-1" id="countNotice"></span>
                    <span class="pulse-ring"></span>
            </div>
    </div>

    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
        <form>
           <!--begin::Header-->
           <div class="d-flex flex-column pt-12 bg-dark-o-5 rounded-top">
              <!--begin::Title-->
              <h4 class="d-flex flex-center">
                 <span class="text-dark">User Notice</span>
              </h4>
              <!--end::Title-->
              <!--begin::Tabs-->
              <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary mt-3 px-8" role="tablist">
                 <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">Notices</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#bir_rejected">BIR</a>
                 </li>
              </ul>
              <!--end::Tabs-->
           </div>
           <!--end::Header-->
           <!--begin::Content-->
            <div class="tab-content">
                <!--begin::Tabpane-->
                <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
                    <!--begin::Scroll-->
                    <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200" id="notices-list">
                    </div>
                    <!--end::Scroll-->
                </div>
              <!--end::Tabpane-->
              <!--begin::Tabpane-->
                <div class="tab-pane p-8" id="bir_rejected" role="tabpanel">
                    <!--begin::Scroll-->
                    <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200" id="rejected-list">
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Tabpane-->
            </div>
           <!--end::Content-->
        </form>
    </div>
</div>


@push('scripts')
    <script src="{{ asset('/js/pages/notifications/user_notification.js')}}"></script>
@endpush

