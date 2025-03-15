@extends('cms.layout.master')
@section('title',trans('dashboard_trans.Edit Coupon'))
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{trans('dashboard_trans.Edit Coupon')}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Dashboard')}}</li>
            <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="{{ route('coupons.index') }}">{{trans('dashboard_trans.Coupons')}}</a></li>
            <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Edit Coupon')}}</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Form-->
            <form id="kt_ecommerce_edit_coupon_form" action="{{route('coupons.update',$coupon->id)}}" class="form d-flex flex-column flex-lg-row" data-kt-redirect="{{route('coupons.edit',$coupon->id)}}">
                @csrf
                @method('PUT')
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_edit_coupon_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{trans('dashboard_trans.General')}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{trans('dashboard_trans.Coupon')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="code" class="form-control mb-2" placeholder="{{trans('dashboard_trans.Coupon Code')}}" value="{{$coupon->code}}" />
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">{{trans('dashboard_trans.A coupon code is required and recommended to be unique')}}.</div>
                                            <!--end::Description-->
                                            <div id="code-error" class="error-message" style="color: red;"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        @foreach(config('lang') as $key => $lang)
                                            <div class="col-md-12 mb-5 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label">{{trans('dashboard_trans.Description')}} ({{$lang}})</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <div>
                                                    <textarea name="description[{{$key}}]" class="form-control @error('description') is-invalid @enderror">{{$coupon->getTranslation('description',$key)}}</textarea>
                                                </div>
                                                <!--end::Editor-->
                                                <div id="description-{{$key}}-error" class="error-message"></div>
                                            </div>
                                        @endforeach
                                        <!--end::Input group-->
                                        <!--begin::Tax-->
                                        <div class="d-flex flex-wrap gap-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">{{trans('dashboard_trans.Discount Type')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-select mb-2" data-control="select2" name="discount_type" data-hide-search="true" data-placeholder="{{trans('dashboard_trans.Select an option')}}">
                                                    <option></option>
                                                    <option value="percentage" @selected($coupon->discount_type == 'percentage')>{{trans('dashboard_trans.Percentage')}}</option>
                                                    <option value="fixed" @selected($coupon->discount_type == 'fixed')>{{trans('dashboard_trans.Fixed')}}</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">{{trans('dashboard_trans.Discount Value')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="discount_value" class="form-control mb-2" placeholder="{{trans('dashboard_trans.Discount Value')}}" value="{{$coupon->discount_value}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                        </div>
                                        <!--end:Tax-->
                                        <!--begin::Tax-->
                                        <div class="d-flex flex-wrap gap-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">{{trans('dashboard_trans.Times Used')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" name="times_used" class="form-control mb-2" placeholder="{{trans('dashboard_trans.Times Used')}}" value="{{$coupon->times_used}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">{{trans('dashboard_trans.Max Usage')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" name="max_used" placeholder="{{trans('dashboard_trans.Max Usage')}}" class="form-control mb-2" value="{{$coupon->max_used}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end:Tax-->
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{trans('dashboard_trans.Start Date')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Editor-->
                                            <input type="date" name="start_date" placeholder="{{trans('dashboard_trans.Start Date')}}" class="form-control mb-2" value="{{$coupon->start_date}}" />
                                            <!--end::Editor-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{trans('dashboard_trans.End Date')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Editor-->
                                            <input type="date"  name="end_date" placeholder="{{trans('dashboard_trans.End Date')}}" class="form-control mb-2" value="{{$coupon->end_date}}" />
                                            <!--end::Editor-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                </div>
                                <!--begin::Status-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>{{trans('dashboard_trans.Status')}}</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_edit_coupon_status"></div>
                                        </div>
                                        <!--begin::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Select2-->
                                        <select class="form-select mb-2" name="status" data-control="select2"   data-hide-search="true" data-placeholder="{{trans('dashboard_trans.Select an option')}}" id="kt_ecommerce_edit_coupon_status_select">
                                            <option></option>
                                            <option value="active" @selected($coupon->status == 'active')>{{trans('dashboard_trans.Active')}}</option>
                                            <option value="inactive" @selected($coupon->status == 'inactive')>{{trans('dashboard_trans.Inactive')}}</option>
                                        </select>
                                        <!--end::Select2-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{trans('dashboard_trans.Set the category status')}}.</div>
                                        <!--end::Description-->
                                    </div>
                                    <div id="status-error" class="error-message"></div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Status-->
                            </div>
                            <!--end::Tab pane-->
                        </div>
                    </div>
                    <!--end::Tab content-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('coupons.index')}}" id="kt_ecommerce_edit_coupon_cancel" class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_edit_coupon_submit" class="btn btn-primary">
                            <span class="indicator-label">{{trans('dashboard_trans.Save Edit')}}</span>
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
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/edit-coupon.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
    <!--end::Custom Javascript-->
@endsection
