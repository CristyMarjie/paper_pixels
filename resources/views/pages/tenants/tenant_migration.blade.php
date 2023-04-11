@extends('pages.index',['title' => 'Tenants'])


@push('styles')
<link rel="stylesheet" href="{{asset('/css/globals/datatables.bundle.css')}}">
@endpush
@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Tenant Master List
                <span class="text-muted pt-2 font-size-sm d-block">View unmigrated tenant masterfiles</span></h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-9">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom" id="tenant_master_list"></div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
</div>
@endsection

@push('scripts')
<script src="{{ asset('/js/pages/tenant/tenant_migration.js')}}"></script>
@endpush
