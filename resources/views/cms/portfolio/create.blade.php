@extends('cms.layout.master')
@section('title',trans('dashboard_trans.Create portfolio'))
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{trans('dashboard_trans.Create portfolio')}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Dashboard')}}</li>
            <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="{{ route('portfolios.index') }}">{{trans('dashboard_trans.portfolios')}}</a></li>
            <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Create portfolio')}}</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Form-->
            <form id="kt_ecommerce_add_coupon_form" action="{{route('portfolios.store')}}" class="form d-flex flex-column flex-lg-row" data-kt-redirect="{{route('portfolios.index')}}">
             @csrf
                @method('POST')
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_coupon_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{trans('dashboard_trans.Portfolio data')}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{trans('dashboard_trans.portfolio')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="name" class="form-control rounded-4 mb-2" placeholder="{{trans('dashboard_trans.Name')}}" value="" />
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">{{trans('dashboard_trans.Portfolio name is recommended to be unique')}}.</div>
                                            <!--end::Description-->
                                            <div id="name-error" class="error-message" style="color: red;"></div>
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{trans('dashboard_trans.Investment amount')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="investment_amount" class="form-control rounded-4 mb-2" placeholder="{{trans('dashboard_trans.Investment amount')}}" value="" />
                                            <!--end::Input-->
                                            <div id="investment_amount-error" class="error-message" style="color: red;"></div>
                                        </div>


                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{trans('dashboard_trans.Status')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select rounded-4 mb-2" name="status" data-control="select2"   data-hide-search="true" data-placeholder="{{trans('dashboard_trans.Select an option')}}" id="kt_ecommerce_add_coupon_status_select">
                                                <option></option>
                                                <option value="active">{{trans('dashboard_trans.Active')}}</option>
                                                <option value="inactive">{{trans('dashboard_trans.Inactive')}}</option>
                                            </select>
                                            <!--end::Select2-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">{{trans('dashboard_trans.Set the portfolio status')}}.</div>
                                            <!--end::Description-->
                                        </div>
                                        <div id="status-error" class="error-message"></div>
                                        <!--end::Input group-->


                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                            </div>
                        </div>
                        <!--end::Tab pane-->
                        </div>
                    </div>
                    <!--end::Tab content-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('portfolios.index')}}" id="kt_ecommerce_add_coupon_cancel" class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_coupon_submit" class="btn btn-primary">
                            <span class="indicator-label">{{trans('dashboard_trans.Create')}}</span>
                            <span class="indicator-progress">{{trans('dashboard_trans.Please wait')}}...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('assets/js/custom/save_portfolio.js')}}"></script>
    <!--end::Custom Javascript-->

@endsection
