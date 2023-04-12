@extends('pages.index',['title' => 'Products'])


@push('styles')
<link rel="stylesheet" href="{{asset('/css/globals/datatables.bundle.css')}}">
@endpush
@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Products
                <span class="text-muted pt-2 font-size-sm d-block">Product List</span></h3>
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
