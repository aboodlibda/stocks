@extends('cms.layout.master')
@section('title','تعديل كافة العناوين')
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0"
         data-kt-swapper="true" data-kt-swapper-mode="prepend"
         data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{'تعديل العناوين'}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}"
                   class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Dashboard')}}</li>
            <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary"
                                                      href="{{ route('titles.index') }}">{{'العناوين'}}</a></li>
            <li class="breadcrumb-item text-dark">{{'تعديل العناوين'}}</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Form-->
            <form id="kt_ecommerce_edit_coupon_form" method="POST" action="{{route('titles.update','')}}"
                  class="form d-flex flex-column flex-lg-row" data-kt-redirect="{{route('titles.index')}}">
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
                                            <h2>تعديل بيانات العناوين</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        @php
                                            $fields = [
                                                  'Stock performance analysis',
                                                    'Industry Type',
                                                    'Stock Name',
                                                    'Stock Code',
'Stock Movement',
                                                    'Market Price (Closing Price)',
                                                    'Average Price Midpoint',
                                                    '52 Week High',
                                                    '52 Week Low',
                                                    'Maximum Stock Return over 250 Days Trading',
                                                    'Minimum Stock Return over 250 Days Trading',
'Stock Movement',
                                                    'Market Price (Closing Price)',
                                                    'Average Price Midpoint',
                                                    '52 Week High',
                                                    '52 Week Low',
                                                    'Maximum Stock Return over 250 Days Trading',
                                                    'Minimum Stock Return over 250 Days Trading',
'Stock Performance (Key Financial Ratios)',
                                                    'Indicator name',
                                                    'stock',
                                                    'Average industrial sector',
                                                    'Price Earning Ratio',
                                                    'Market to Book Ratio',
                                                    'Free Cash Flow',
                                                    'Leverage Ratio',
                                                    'Return on Equity',
                                                    'Dividend Yield',
                                                    'Earning Per Share',
                                                    'Annual Dividend Rate',
                                                    'Expected Stock Return Based on Historical Data & CAPM Model',
                                                    'Expected Annual Stock Return',
                                                    'Daily Expected Stock Return',
                                                    'Expected Stock VaR',
                                                    'Stock Value at Risk',
                                                     'Financial Statements Issuance Dates',
                                                    'Last date for dividend distribution',
                                                    'Last Updated Income Statement',
                                                    'Last Updated Balance Sheet',
                                                    'Support and Resistance Price Level',
                                                    'Stock vs. Index Return',
                                                    'Stock dividend distribution possibilities',
                                                    'View Chart Analysis For:',
                                            ];
                                            $sections = [
                                                'Stock Movement' => [
                                                    'Stock Movement',
                                                    'Market Price (Closing Price)',
                                                    'Average Price Midpoint',
                                                    '52 Week High',
                                                    '52 Week Low',
                                                    'Maximum Stock Return over 250 Days Trading',
                                                    'Minimum Stock Return over 250 Days Trading',
                                                ],
                                                'Stock Risk Measurement' => [
                                                    'Stock Risk Measurement',
                                                    'Sharp Risk Ratio',
                                                    'Beta Coefficient',
                                                    'Daily Stock Volatility',
                                                    'Annual Stock Volatility',
                                                    'Stock Risk Ranking',
                                                ],
                                                'Stock Performance (Key Financial Ratios)' => [
                                                    'Stock Performance (Key Financial Ratios)',
                                                    'Indicator name',
                                                    'stock',
                                                    'Average industrial sector',
                                                    'Price Earning Ratio',
                                                    'Market to Book Ratio',
                                                    'Free Cash Flow',
                                                    'Leverage Ratio',
                                                    'Return on Equity',
                                                    'Dividend Yield',
                                                    'Earning Per Share',
                                                    'Annual Dividend Rate',
                                                ],
                                                'Expected Stock Return Based on Historical Data & CAPM Model' => [
                                                    'Expected Stock Return Based on Historical Data & CAPM Model',
                                                    'Expected Annual Stock Return',
                                                    'Daily Expected Stock Return',
                                                ],
                                                'Expected Stock VaR' => [
                                                    'Expected Stock VaR',
                                                    'Stock Value at Risk',
                                                ],
                                                'Financial Statements Issuance Dates' => [
                                                    'Financial Statements Issuance Dates',
                                                    'Last date for dividend distribution',
                                                    'Last Updated Income Statement',
                                                    'Last Updated Balance Sheet',


                                                ],
                                                'Chart Analysis' => [
                                                    'Support and Resistance Price Level',
                                                    'Stock vs. Index Return',
                                                    'Stock dividend distribution possibilities',
                                                    'View Chart Analysis For:',
                                                ],
                                                'Heading Titles' => [
                                                    'Stock performance analysis',
                                                    'Industry Type',
                                                    'Stock Name',
                                                    'Stock Code',
                                                ],
                                            ];
                                        @endphp

                                        @foreach ($sections as $title => $sectionFields)
                                            <h2 class="mb-5">{{ $title }}</h2>
                                            @foreach ($sectionFields as $field)
                                                @if (in_array($field, $fields))
                                                    <div class="row mb-10">
                                                        <div class="col-md-6 fv-row">
                                                            <div class="accordion" id="kt_accordion_{{ $field }}_en">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="kt_accordion_{{ $field }}_en_header">
                                                                        <button
                                                                            class="accordion-button fs-4 fw-semibold collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#kt_accordion_{{ $field }}_en_body"
                                                                            aria-expanded="false"
                                                                            aria-controls="kt_accordion_{{ $field }}_en_body">
                                                                            {{ ucwords(str_replace('_', ' ', $field)) }}
                                                                            (English)
                                                                        </button>
                                                                    </h2>
                                                                    <div id="kt_accordion_{{ $field }}_en_body"
                                                                         class="accordion-collapse collapse"
                                                                         aria-labelledby="kt_accordion_{{ $field }}_en_header"
                                                                         data-bs-parent="#kt_accordion_{{ $field }}_en">
                                                                        <div class="accordion-body">
                                                                            <textarea class="editor"
                                                                                      name="{{ $field }}[en]">{{ trans('trans.' . $field, [], 'en') }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 fv-row">
                                                            <div class="accordion" id="kt_accordion_{{ $field }}_ar">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="kt_accordion_{{ $field }}_ar_header">
                                                                        <button
                                                                            class="accordion-button fs-4 fw-semibold collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#kt_accordion_{{ $field }}_ar_body"
                                                                            aria-expanded="false"
                                                                            aria-controls="kt_accordion_{{ $field }}_ar_body">
                                                                            {{ ucwords(str_replace('_', ' ', $field)) }}
                                                                            (Arabic)
                                                                        </button>
                                                                    </h2>
                                                                    <div id="kt_accordion_{{ $field }}_ar_body"
                                                                         class="accordion-collapse collapse"
                                                                         aria-labelledby="kt_accordion_{{ $field }}_ar_header"
                                                                         data-bs-parent="#kt_accordion_{{ $field }}_ar">
                                                                        <div class="accordion-body">
                                                                            <textarea class="editor"
                                                                                      name="{{ $field }}[ar]">{{ trans('trans.' . $field, [], 'ar') }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endif
                                            @endforeach
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
                        <a href="{{route('notes.index')}}" id="kt_ecommerce_edit_coupon_cancel"
                           class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
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
    <script src="https://cdn.tiny.cloud/1/f1jknqc2028uapitbujovxdivdz2ufny3mvk5zy195agahcx/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>


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
