<!-- Modal-->
<div class="modal fade" id="viewModalCenter_{{$key}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Credit & Collection Analyst</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" id="view_analyst_form" >
                    @foreach ($collectionTeams as $key => $collectionTeam)

                        @if($collectionTeam->status === 1)
                        @if(Auth::user()->isAdmin())
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end">
                            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                <a href="#" class="btn btn-clean
                                btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                    <!--begin::Naviigation-->
                                    <ul class="navi">
                                        <li class="navi-header font-weight-bold py-5">
                                            <span class="font-size-lg">Actions:</span>

                                        </li>
                                        <li class="navi-separator mb-3 opacity-70"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link update_analyst" data-id="{{$collectionTeam->id}}" data-toggle="modal" data-target="#updateModalCenter">
                                                <span class="navi-icon">
                                                    <i class="fas fa-user-edit"></i>
                                                </span>
                                                <span class="navi-text" >Update</span>
                                            </a>
                                        </li>
                                        <li class="navi-separator mt-3 opacity-70"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link"  data-target="" id="deactivate_analyst">
                                                <span class="navi-icon">
                                                    <i class="fas fa-user-times"></i>
                                                </span>
                                                <span class="navi-text" data-id="{{$collectionTeam->id}}" >Remove</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <!--end::Naviigation-->
                                </div>
                            </div>
                        </div>
                        <!--end::Toolbar-->
                        @endif
                        <div class="d-flex flex-column" id="analyst_view_form">
                            <!--begin::Pic-->
                            <div class="flex-shrink-0 mr-4 mt-lg-0 text-center">
                                <div class="symbol symbol-lg-75 symbol-circle symbol-light-success align-items-center">
                                    <span class="symbol-label font-size-h3 font-weight-boldest">{{ucwords($collectionTeam->analyst_name[0])}}</span>
                                </div>

                            </div>
                            <!--end::Pic-->
                            <div class="mb-4">
                                <ul class="navi">
                                    <li class="navi-item">
                                        <a class="navi-link" href="#">
                                            <span class="navi-icon">
                                                <i class="far fa-id-card"></i>
                                            </span>
                                            <span class="navi-text">Name</span>
                                            <span class="navi-label">
                                                <span class="font-size-h4 font-weight-bolder">{{$collectionTeam->analyst_name}}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a class="navi-link" href="#">
                                            <span class="navi-icon">
                                                <i class="far fa-envelope"></i>
                                            </span>
                                            <span class="navi-text">Email</span>
                                            <span class="navi-label">
                                                <span class="font-size-h4 font-weight-bolder">{{$collectionTeam->analyst_email}}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a class="navi-link" href="#">
                                            <span class="navi-icon">
                                                <i class="fas fa-mobile-alt"></i>
                                            </span>
                                            <span class="navi-text">Contact</span>
                                            <span class="navi-label">
                                                <span class="font-size-h4 font-weight-bolder">{{$collectionTeam->analyst_contact}}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-separator my-4"></li>
                                </ul>
                            </div>

                        </div>
                        @endif

                    @endforeach
                    </div>
                </div>

    </div>
</div>



