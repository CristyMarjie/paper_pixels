<div class="dropdown">
    <div class="topbar-item" data-toggle="dropdown" data-offset="10px, 0px">
            <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-white">

                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M22,15 L22,19 C22,20.1045695 21.1045695,21 20,21 L4,21 C2.8954305,21 2,20.1045695 2,19 L2,15 L6.27924078,15 L6.82339262,16.6324555 C7.09562072,17.4491398 7.8598984,18 8.72075922,18 L15.381966,18 C16.1395101,18 16.8320364,17.5719952 17.1708204,16.8944272 L18.118034,15 L22,15 Z" fill="#000000"/>
                            <path d="M2.5625,13 L5.92654389,7.01947752 C6.2807805,6.38972356 6.94714834,6 7.66969497,6 L16.330305,6 C17.0528517,6 17.7192195,6.38972356 18.0734561,7.01947752 L21.4375,13 L18.118034,13 C17.3604899,13 16.6679636,13.4280048 16.3291796,14.1055728 L15.381966,16 L8.72075922,16 L8.17660738,14.3675445 C7.90437928,13.5508602 7.1401016,13 6.27924078,13 L2.5625,13 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <span class="label label-sm label-light-danger label-rounded font-weight-bolder position-absolute top-0 right-0 mt-1 mr-1" id="countEmail">0</span>
                <span class="pulse-ring"></span>
            </div>
    </div>

    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
        <form>
            <!--begin::Header-->
            <div class="d-flex flex-column pt-12 bg-dark-o-5 rounded-top">
               <!--begin::Title-->
               <h4 class="d-flex flex-center">
                  <span class="text-dark">Mail</span>
               </h4>
               <!--end::Title-->
               <!--begin::Tabs-->
               <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary mt-3 px-8" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">Emails</a>
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

                  <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200" id="email-list">


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
    <script src="{{ asset('/js/pages/notifications/user_email_notification.js')}}"></script>
@endpush
