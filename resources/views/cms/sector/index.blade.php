@extends('cms.layout.master')
@section('title','القطاعات')
@section('style')

    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">


@endsection
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0"
         data-kt-swapper="true" data-kt-swapper-mode="prepend"
         data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">القطاعات</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}"
                   class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-dark">إستيراد القطاعات</li>

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

                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" id="search" class="form-control form-control-solid border-dark w-250px ps-12" placeholder="بحث بإسم أو رمز القطاع">
                        </div>
                        <!--end::Search-->
                    </div>

                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                            <!--begin::Add product-->
                                            <a href="{{ route('sectors.upload-page') }}" class="btn btn-primary">تحميل ملف القطاعات</a>
                                            <!--end::Add product-->
                                        </div>
                    <!--end::Card toolbar-->

                </div>
                <!--end::Card header-->


                <!--begin::Row-->

                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="itemsTable">
                        @include('cms.sector.partials.table', ['sectors' => $sectors])
                    </div>
                    <!--end::Table-->
                </div>



            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.excelDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 10, // MB
            maxFiles: 1,    // allow only ONE file
            acceptedFiles: ".csv",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            init: function () {
                this.on("success", function (file, response) {
                    toastr.success(response.message);
                });
                this.on("error", function (file, errorMessage) {
                    toastr.error(errorMessage.message);
                });
            }
        };
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Live Search -->
    <script>
        $(document).ready(function(){

            function fetch_data(query = '') {
                $.ajax({
                    url: "{{ route('sectors.search') }}",
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $('#itemsTable').html(data);
                    }
                });
            }

            $('#search').on('keyup', function(){
                let query = $(this).val();
                fetch_data(query);
            });

            // handle pagination links (ajax load)
            $(document).on('click', '.pagination a', function(e){
                e.preventDefault();
                let pageUrl = $(this).attr('href');
                $.get(pageUrl, function(data) {
                    $('#itemsTable').html(data);
                });
            });
        });
    </script>

@endsection
