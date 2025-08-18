@extends('cms.layout.master')
@section('title','كافة الملاحظات')
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">الملاحظات</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-dark">الملاحظات</li>

        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
{{--                        <div class="d-flex align-items-center position-relative my-1">--}}
{{--                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">--}}
{{--                                <span class="path1"></span>--}}
{{--                                <span class="path2"></span>--}}
{{--                            </i>--}}
{{--                            <input type="text" data-kt-ecommerce-coupons-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Notes" />--}}
{{--                        </div>--}}
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
{{--                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">--}}
{{--                        <!--begin::Add product-->--}}
{{--                        <a href="" class="btn btn-primary">Create Note</a>--}}
{{--                        <!--end::Add product-->--}}
{{--                    </div>--}}
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_coupons_table">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="text-dark min-w-100px">العنوان</th>
                            <th class="text-dark text-end min-w-70px">الإجرائات</th>
                        </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                        <tr data-note-id="{{ $note->id }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-5">
                                        <a href="{{route('notes.edit',$note)}}" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{'كافة الملاحظات'}}</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    الإجرائات
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{route('notes.edit',$note)}}" class="menu-link px-3">تعديل</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
{{--                                    <div class="menu-item px-3">--}}
{{--                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-coupons-filter="delete_row">حذف</a>--}}
{{--                                    </div>--}}
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
@endsection
