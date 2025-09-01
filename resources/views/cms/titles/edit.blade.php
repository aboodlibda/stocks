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

            <div class="card-title ">
                <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <input type="text" data-kt-ecommerce-coupons-filter="search"
                                                   class="form-control form-control-solid w-250px ps-12" placeholder="Search Notes" />
                                        </div>
                <!--end::Search-->
            </div>
            <!--begin::Form-->
            <form id="kt_ecommerce_edit_coupon_form" method="POST" action="{{route('titles.update','test')}}"
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
                                    <div class="card-body pt-5">
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
'Stock Risk Measurement',
                                                    'Sharp Risk Ratio',
                                                    'Beta Coefficient',
                                                    'Daily Stock Volatility',
                                                    'Annual Stock Volatility',
                                                    'Stock Risk Ranking',

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
                                            <div class="accordion mb-10" id="accordionExample-{{ $loop->index }}">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                                                        <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false" aria-controls="collapse-{{ $loop->index }}">
                                                            {{ trans('trans.' . $title, [], app()->getLocale()) }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse-{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $loop->index }}" data-bs-parent="#accordionExample-{{ $loop->index }}">
                                                        <div class="accordion-body">
                                                            @foreach ($sectionFields as $field)
                                                                @if (in_array($field, $fields))
                                                                    @php($fieldSlug = Str::slug($field))
                                                                    <div class="row mb-10">
                                                                        <div class="col-md-6 fv-row">
                                                                            <div class="accordion" id="kt_accordion_{{ $fieldSlug }}_en">
                                                                                <div class="accordion-item">
                                                                                    <h2 class="accordion-header" id="kt_accordion_{{ $fieldSlug }}_en_header">
                                                                                        <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_{{ $fieldSlug }}_en_body" aria-expanded="false" aria-controls="kt_accordion_{{ $fieldSlug }}_en_body">
                                                                                            {{ trans('trans.' . $field, [], 'en') }}
                                                                                        </button>
                                                                                    </h2>
                                                                                    <div id="kt_accordion_{{ $fieldSlug }}_en_body" class="accordion-collapse collapse" aria-labelledby="kt_accordion_{{ $fieldSlug }}_en_header" data-bs-parent="#kt_accordion_{{ $fieldSlug }}_en">
                                                                                        <div class="accordion-body">
                                                                                            <input type="text" class="form-control" name="{{ $field }}[en]" value="{{ trans('trans.' . $field, [], 'en') }}"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 fv-row">
                                                                            <div class="accordion" id="kt_accordion_{{ $fieldSlug }}_ar">
                                                                                <div class="accordion-item">
                                                                                    <h2 class="accordion-header" id="kt_accordion_{{ $fieldSlug }}_ar_header">
                                                                                        <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_{{ $fieldSlug }}_ar_body" aria-expanded="false" aria-controls="kt_accordion_{{ $fieldSlug }}_ar_body">
                                                                                            {{ trans('trans.' . $field, [], 'ar') }}
                                                                                        </button>
                                                                                    </h2>
                                                                                    <div id="kt_accordion_{{ $fieldSlug }}_ar_body" class="accordion-collapse collapse" aria-labelledby="kt_accordion_{{ $fieldSlug }}_ar_header" data-bs-parent="#kt_accordion_{{ $fieldSlug }}_ar">
                                                                                        <div class="accordion-body">
                                                                                            <input type="text" class="form-control" name="{{ $field }}[ar]" value="{{ trans('trans.' . $field, [], 'ar') }}"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                        <a href="{{route('titles.index')}}" id="kt_ecommerce_edit_coupon_cancel"
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
