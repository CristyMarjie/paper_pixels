@extends('pages.index',['title' => 'My Contracts'])

@push('styles')
<link href="{{asset('/css/globals/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
<style>
.file-upload-indicator,.btn-close , .fileinput-pause-button{
    display: none !important;
}
</style>
<link rel="stylesheet" href="{{asset('/css/globals/datatables.bundle.css')}}">
@endpush

@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Leaseout Contracts
                <span class="text-muted pt-2 font-size-sm d-block">Leaseout Contract List</span></h3>
            </div>
            <div class="card-toolbar">

                <!--begin::Button-->
                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addMoreTenantStore">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>New Record</a>
                @endif
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            {{-- <div class="datatable datatable-bordered datatable-head-custom" id="contracts"></div> --}}
            <div class="card-body">
                    <table id="contracts" class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th>Tenant Name</th>
                        <th>Address</th>
                        <th>Business Type</th>
                        <th>Lease Period</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-bold">
                    </tbody>
                </table>
                <!--end::Datatable-->

            </div>
        </div>
    </div>
    <!--end::Card-->
</div>
{{-- Start Modal --}}
@include('pages.partials.modal.add_contract_modal_v1',['modal_id' => 'addMoreTenantStore', 'tenant' => $tenants])
{{-- End Modal --}}
@endsection



@push('scripts')
{{-- <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}
<script src="{{asset('/js/globals/datatables.bundle.js')}}" ></script>
<script src="{{asset('/js/globals/fileinput.min.js')}}"></script>
<script src="{{ asset('/js/pages/contract/contract_list.js')}}"></script>
@endpush

