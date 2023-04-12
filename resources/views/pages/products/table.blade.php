@extends('pages.index',['title' => 'Products'])


@push('styles')
<link rel="stylesheet" href="{{asset('/css/globals/datatables.bundle.css')}}">
@endpush
@section('content')
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Products
                <!--begin::Separator-->
                <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <!-- <span class="text-muted fs-7 fw-bold mt-2">#XRS-45670</span> -->
                <!--end::Description-->
                <a href="../../demo1/dist/.html" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"><i class="fa-solid fa-plus"></i></a>
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Primary button-->
            <a href="../../demo1/dist/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"><i class="fa-solid fa-plus"></i></a>
            <!--end::Primary button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Product List
                <!-- <span class="text-muted pt-2 font-size-sm d-block"><i class="fa-solid fa-folder-plus"></i>Product List</span></h3> -->
            </div>
        </div>
        <div class="card-body">
            <table id="productList" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th>User Name</th>
                    <th>Email</th>

                    <th>Product Name</th>
                    <th>Address</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold">
                </tbody>
            </table>
            <!--end::Datatable-->

        </div>
    </div>
    <!--end::Card-->
</div>
@endsection

@push('scripts')
<script src="{{asset('/js/globals/datatables.bundle.js')}}" ></script>
<script src="{{ asset('/js/pages/product/product.js')}}"></script>
@endpush
