@extends('cms.layout.master')
@section('title','تعديل كافة الملاحظات')
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{'تعديل الملاحظات'}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Dashboard')}}</li>
            <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="{{ route('notes.index') }}">{{'الملاحظات'}}</a></li>
            <li class="breadcrumb-item text-dark">{{'تعديل الملاحظات'}}</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Form-->
            <form id="kt_ecommerce_edit_coupon_form" method="POST" action="{{route('notes.update',$note->id)}}"  class="form d-flex flex-column flex-lg-row" data-kt-redirect="{{route('notes.edit',$note->id)}}">
                @csrf
                @method('PUT')
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_edit_coupon_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>تعديل بيانات الملاحظات</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        @php
                                            $fields = [
                                                'closing_price',
                                                'average_price_midpoint',
                                                '52_week_high',
                                                '52_week_low',
                                                'maximum_stock_return_over_250_days',
                                                'minimum_stock_return_over_250_days',
                                                'sharp_risk_ratio',
                                                'beta_coefficient',
                                                'daily_stock_volatility',
                                                'annual_stock_volatility',
                                                'stock_risk_ranking',
                                                'price_earning_ratio',
                                                'market_to_book_ratio',
                                                'free_cash_flow',
                                                'leverage_ratio',
                                                'return_on_equity',
                                                'dividend_yield',
                                                'earning_per_share',
                                                'annual_dividend_rate',
                                                'expected_annual_stock_return',
                                                'daily_expected_stock_return',
                                                'stock_value_at_risk',
                                                'last_date_for_dividend_distribution',
                                                'last_updated_income_statement',
                                                'last_updated_balance_sheet',
                                                'stock_dividend_distribution_possibilities_chart',
                                                'last_stock_vs_index_return_chart',
                                                'support_and_resistance_price_level_chart',
                                            ];
                                        @endphp

                                        @foreach ($fields as $field)
                                            <div class="row mb-10">
                                                <div class="col-md-6 fv-row">
                                                    <label class="form-label fw-bold">{{ ucwords(str_replace('_', ' ', $field)) }} (English)</label>
                                                    <textarea class="editor" name="{{ $field }}[en]">{{ $note->{$field}['en'] ?? '' }}</textarea>
                                                </div>
                                                <div class="col-md-6 fv-row">
                                                    <label class="form-label fw-bold">{{ ucwords(str_replace('_', ' ', $field)) }} (Arabic)</label>
                                                    <textarea class="editor" name="{{ $field }}[ar]">{{ $note->{$field}['ar'] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Tab content-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('notes.index')}}" id="kt_ecommerce_edit_coupon_cancel" class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
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
    <script src="https://cdn.tiny.cloud/1/f1jknqc2028uapitbujovxdivdz2ufny3mvk5zy195agahcx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: 'textarea.editor',   // all textareas with class="editor"
            height: 400,
            plugins: 'print preview importcss searchreplace autolink autosave save directionality ' +
                'code visualblocks visualchars fullscreen image link media template codesample ' +
                'table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists ' +
                'wordcount imagetools textpattern help emoticons autosave',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | ' +
                'alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | ' +
                'forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | ' +
                'charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ' +
                'ltr rtl',
            menubar: 'file edit view insert format tools table help',
            toolbar_sticky: false,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_restore_when_empty: true,
            autosave_retention: "2m",
            image_advtab: true,
            importcss_append: true,
        });
    </script>

@endsection
