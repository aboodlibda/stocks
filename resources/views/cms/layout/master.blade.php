<!DOCTYPE html>
@if(App::getLocale()=='ar')
    <html dir="rtl" lang="ar">
    @else
        <html dir="ltr" lang="en">
        @endif

        <!--begin::Head-->
        <head>
            <base href="">
            <title>{{trans('dashboard_trans.Dashboard')}} | @yield('title')</title>
            <meta name="description"
                  content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free."/>
            <meta name="keywords"
                  content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <meta charset="utf-8"/>
            <meta property="og:locale" content="en_US"/>
            <meta property="og:type" content="article"/>
            <meta property="og:title"
                  content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme"/>
            <meta property="og:url" content="https://keenthemes.com/metronic"/>
            <meta property="og:site_name" content="Keenthemes | Metronic"/>
            <link rel="canonical" href="Https://preview.keenthemes.com/metronic8"/>
            <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
            <!--begin::Fonts-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
            <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
                  rel="stylesheet">

            {{--    <link href="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css" />--}}

            <!-- Toastr CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


            @if(App::getLocale()=='ar')
                <!--AR files-->
                <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css">
                <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css">

            @else
                <!--EN files-->
                <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
                <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
            @endif
            <!--end::Fonts-->

            @yield('style')

            <style>
                .toast-success {
                    background-color: #28a745 !important; /* Green */
                    color: #fff !important;
                }

                .toast-error {
                    background-color: #dc3545 !important; /* Red */
                    color: #fff !important;
                }

                .toast-info {
                    background-color: #17a2b8 !important; /* Blue */
                    color: #fff !important;
                }

                .toast-warning {
                    background-color: #ffc107 !important; /* Yellow */
                    color: #212529 !important;
                }
            </style>

        </head>
        <!--end::Head-->
        <!--begin::Body-->

        <body id="kt_body" class="header-fixed sidebar-enabled">
        <!--begin::loader-->
        <div class="page-loader flex-column">
            <img alt="Logo" class="theme-light-show max-h-50px" src="{{asset('assets/media/logos/keenthemes.svg')}}">
            <img alt="Logo" class="theme-dark-show max-h-50px"
                 src="{{asset('assets/media/logos/keenthemes-dark.svg')}}">

            <div class="d-flex align-items-center mt-5">
                <span class="spinner-border text-primary" role="status"></span>
                <span class="text-muted fs-6 fw-semibold ms-5">Loading...</span>
            </div>
        </div>
        <!--end::Loader-->
        <!--begin::Main-->
        <!--begin::Root-->
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
                <div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside"
                     data-kt-drawer-activate="{default: true, lg: false}"
                     data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                    <!--begin::Brand-->
                    <div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
                        <!--begin::Logo-->
                        <a href="../../demo3/dist/index.html">
                            <img alt="Logo" src="{{asset('assets/media/logos/demo3.svg')}}"
                                 class="h-20px logo theme-light-show"/>
                            <img alt="Logo" src="{{asset('assets/media/logos/demo3-dark.svg')}}"
                                 class="h-20px logo theme-dark-show"/>
                        </a>
                        <!--end::Logo-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Aside menu-->
                    <div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
                        <!--begin::Aside Menu-->
                        <div class="w-100 hover-scroll-overlay-y d-flex pe-3" id="kt_aside_menu_wrapper"
                             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                             data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper"
                             data-kt-scroll-offset="100">
                            <!--begin::Menu-->
                            <div
                                class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold my-auto"
                                id="#kt_aside_menu" data-kt-menu="true">
                                <!--begin:Menu item-->
                                <div class="menu-item here">
                                    <a class="menu-link active" href="{{ route('dashboard') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                        <span class="menu-title">{{trans('dashboard_trans.Dashboard')}}</span>
                                    </a>
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion ">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-black-right fs-2"></i>
										</span>
										<span class="menu-title">{{trans('dashboard_trans.portfolios')}}</span>
										<span class="menu-arrow"></span>
									</span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="{{ route('portfolios.index') }}"
                                               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                               data-bs-placement="right">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                <span
                                                    class="menu-title">{{trans('dashboard_trans.All portfolios')}}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="{{ route('portfolios.create') }}"
                                               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                               data-bs-placement="right">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                <span
                                                    class="menu-title">{{trans('dashboard_trans.Create portfolio')}}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->

                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div class="menu-item ">
                                    <a class="menu-link" href="{{ route('market-stock-screen') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                        <span class="menu-title">{{'شاشة الأسهم المالية'}}</span>
                                    </a>
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div class="menu-item ">
                                    <a class="menu-link" href="{{ route('select-stock') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                        <span class="menu-title">{{'تحليل أداء الأسهم واختيار أسهم المحفظة'}}</span>
                                    </a>
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div class="menu-item ">
                                    <a class="menu-link" href="{{ route('notes.index') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                        <span class="menu-title">{{'الملاحظات'}}</span>
                                    </a>
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion ">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-black-right fs-2"></i>
										</span>
										<span class="menu-title">{{'القطاعات'}}</span>
										<span class="menu-arrow"></span>
									</span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="{{ route('sectors.index') }}"
                                               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                               data-bs-placement="right">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                <span
                                                    class="menu-title">{{'بيانات القطاعات'}}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="{{ route('sectors.upload-page') }}"
                                               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                               data-bs-placement="right">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                <span
                                                    class="menu-title">{{' تحديث بيانات القطاعات'}}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->

                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div class="menu-item ">
                                    <a class="menu-link" href="{{ route('titles.index') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                          fill="black"/>
													<path opacity="0.3"
                                                          d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                        <span class="menu-title">{{'العناوين'}}</span>
                                    </a>
                                </div>
                                <!--end:Menu item-->

                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Aside Menu-->
                    </div>
                    <!--end::Aside menu-->
                    <!--begin::Footer-->
                    <div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">
                        <!--begin::User panel-->
                        <div class="d-flex flex-stack">
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-circle symbol-40px">
                                    <img src="{{asset('assets/media/avatars/300-1.jpg')}}" alt="photo"/>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::User info-->
                                <div class="ms-2">
                                    <!--begin::Name-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold lh-1">Admin</a>
                                    <!--end::Name-->
                                    <!--begin::Major-->
                                    <span class="text-muted fw-semibold d-block fs-7 lh-1">Admin</span>
                                    <!--end::Major-->
                                </div>
                                <!--end::User info-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::User menu-->
                            <div class="ms-1">
                                <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2"
                                     data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true"
                                     data-kt-menu-placement="top-end">
                                    <i class="ki-duotone ki-setting-2 fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--begin::User account menu-->
                                <div
                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="{{asset('assets/media/avatars/300-1.jpg')}}"/>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">Admin
                                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Admin</span>
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">admin@admin.com</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="../../demo3/dist/account/overview.html"
                                           class="menu-link px-5">{{trans('dashboard_trans.My Profile')}}</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="../../demo3/dist/apps/projects/list.html" class="menu-link px-5">
                                            <span class="menu-text">{{trans('dashboard_trans.My Products')}}</span>
                                            <span class="menu-badge">
												<span
                                                    class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
											</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->

                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->

                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                         data-kt-menu-placement="right-end" data-kt-menu-offset="-15px, 0">
                                        <a href="#" class="menu-link px-5">
											<span class="menu-title position-relative">{{trans('dashboard_trans.Language')}}
                                                @if (App::getLocale() == 'en')
                                                    <span
                                                        class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
											<img class="w-15px h-15px rounded-1 ms-2"
                                                 src="{{asset('assets/media/flags/united-states.svg')}}" alt=""/>
                                            </span>
                                                @else
                                                    <span
                                                        class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">العربية
                                                    <img class="w-15px h-15px rounded-1 ms-2"
                                                         src="{{asset('assets/media/flags/saudi-arabia.svg')}}" alt=""/>
                                            </span>
                                                @endif
                                            </span>

                                        </a>
                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            @foreach(LaravelLocalization::getSupportedLocales()  as $localeCode => $properties)
                                                <div class="menu-item px-3">
                                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                       hreflang="{{ $localeCode }}" class="menu-link d-flex px-5">

                                                        @if($localeCode == 'en')
                                                            <span class="symbol symbol-20px me-4">
													<img class="rounded-1"
                                                         src="{{asset('assets/media/flags/united-states.svg')}}"
                                                         alt=""/>
                                                </span>{{ $properties['native'] }}
                                                        @else
                                                            <span class="symbol symbol-20px me-4">
													<img class="rounded-1"
                                                         src="{{asset('assets/media/flags/saudi-arabia.svg')}}" alt=""/>
                                                </span>{{ $properties['native'] }}
                                                        @endif
                                                    </a>
                                                </div>
                                            @endforeach
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5 my-1">
                                        <a href="#"
                                           class="menu-link px-5">{{trans('dashboard_trans.Account Settings')}}</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{ route('logout') }}"
                                           class="menu-link px-5">{{trans('dashboard_trans.Sign Out')}}</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                            </div>
                            <!--end::User menu-->
                        </div>
                        <!--end::User panel-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" class="header mt-0 mt-lg-0 pt-lg-0" data-kt-sticky="true"
                         data-kt-sticky-name="header" data-kt-sticky-offset="{lg: '300px'}">
                        <!--begin::Container-->
                        <div class="container d-flex flex-stack flex-wrap gap-4" id="kt_header_container">
                            <!--begin::Wrapper-->
                            <div class="d-flex d-lg-none align-items-center ms-n3 me-2">
                                <!--begin::Aside mobile toggle-->
                                <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-1 mt-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Aside mobile toggle-->
                                <!--begin::Logo-->
                                <a href="../../demo3/dist/index.html" class="d-flex align-items-center">
                                    <img alt="Logo" src="{{asset('assets/media/logos/demo3.svg')}}"
                                         class="theme-light-show h-20px"/>
                                    <img alt="Logo" src="{{asset('assets/media/logos/demo3-da.svg')}}"
                                         class="theme-dark-show h-20px"/>
                                </a>
                                <!--end::Logo-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Topbar-->
                            <div class="d-flex align-items-center flex-shrink-0 mb-0 mb-lg-0">

                                <!--begin::Notifications-->
                                <div class="d-flex align-items-center ms-3 ms-lg-4">
                                    <!--begin::Menu- wrapper-->
                                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">
                                        <i class="ki-duotone ki-notification-bing fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
                                        <!--begin::Heading-->
                                        <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{asset('assets/media/misc/menu-header-bg.jpg')}}')">
                                            <!--begin::Title-->
                                            <h3 class="text-white fw-semibold px-9 mt-10 mb-6">الإشعارات
                                                <span class="fs-8 opacity-75 ps-3">24</span></h3>
                                            <!--end::Title-->
                                            <!--begin::Tabs-->
{{--                                            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9">--}}
{{--                                                <li class="nav-item">--}}
{{--                                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_1">Alerts</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
                                            <!--end::Tabs-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Tab content-->
                                        <div class="tab-content">
                                            <!--begin::Tab panel-->
                                            <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
                                                <!--begin::Items-->
                                                <div class="scroll-y mh-325px my-5 px-8">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-primary">
																	<i class="ki-duotone ki-abstract-28 fs-2 text-primary">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Alice</a>
                                                                <div class="text-gray-400 fs-7">Phase 1 development</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">1 hr</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-danger">
																	<i class="ki-duotone ki-information fs-2 text-danger">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																	</i>
																</span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">HR Confidential</a>
                                                                <div class="text-gray-400 fs-7">Confidential staff documents</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">2 hrs</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-warning">
																	<i class="ki-duotone ki-briefcase fs-2 text-warning">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Company HR</a>
                                                                <div class="text-gray-400 fs-7">Corporeate staff profiles</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">5 hrs</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-success">
																	<i class="ki-duotone ki-abstract-12 fs-2 text-success">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Redux</a>
                                                                <div class="text-gray-400 fs-7">New frontend admin theme</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">2 days</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-primary">
																	<i class="ki-duotone ki-colors-square fs-2 text-primary">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																		<span class="path4"></span>
																	</i>
																</span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Breafing</a>
                                                                <div class="text-gray-400 fs-7">Product launch status update</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">21 Jan</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-info">
																	<i class="ki-duotone ki-picture fs-2 text-info"></i>
																</span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Banner Assets</a>
                                                                <div class="text-gray-400 fs-7">Collection of banner images</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">21 Jan</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-warning">
																	<i class="ki-duotone ki-color-swatch fs-2 text-warning">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																		<span class="path4"></span>
																		<span class="path5"></span>
																		<span class="path6"></span>
																		<span class="path7"></span>
																		<span class="path8"></span>
																		<span class="path9"></span>
																		<span class="path10"></span>
																		<span class="path11"></span>
																		<span class="path12"></span>
																		<span class="path13"></span>
																		<span class="path14"></span>
																		<span class="path15"></span>
																		<span class="path16"></span>
																		<span class="path17"></span>
																		<span class="path18"></span>
																		<span class="path19"></span>
																		<span class="path20"></span>
																		<span class="path21"></span>
																	</i>
																</span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Icon Assets</a>
                                                                <div class="text-gray-400 fs-7">Collection of SVG icons</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">20 March</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Items-->
                                                <!--begin::View more-->
                                                <div class="py-3 text-center border-top">
                                                    <a href="../../demo1/dist/pages/user-profile/activity.html"
                                                       class="btn btn-color-gray-600 btn-active-color-primary">
                                                        عرض الكل
                                                        <i class="ki-duotone ki-arrow-right fs-5">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i></a>
                                                </div>
                                                <!--end::View more-->
                                            </div>
                                            <!--end::Tab panel-->

                                        </div>
                                        <!--end::Tab content-->
                                    </div>
                                    <!--end::Menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::Notifications-->
                                <!--begin::Chat-->
                                <div class="d-flex align-items-center ms-3 ms-lg-4">
                                    <!--begin::Drawer wrapper-->
                                    <div
                                        class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px position-relative"
                                        id="kt_drawer_chat_toggle">
                                        <i class="ki-duotone ki-message-text-2 fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                                        <!--end::Bullet-->
                                    </div>
                                    <!--end::Drawer wrapper-->
                                </div>
                                <!--end::Chat-->
                                <!--begin::Theme mode-->
                                <div class="d-flex align-items-center ms-3 ms-lg-4">
                                    <!--begin::Menu toggle-->
                                    <a href="#"
                                       class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px"
                                       data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                       data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-night-day theme-light-show fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                            <span class="path6"></span>
                                            <span class="path7"></span>
                                            <span class="path8"></span>
                                            <span class="path9"></span>
                                            <span class="path10"></span>
                                        </i>
                                        <i class="ki-duotone ki-moon theme-dark-show fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <!--begin::Menu toggle-->
                                    <!--begin::Menu-->
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                               data-kt-value="light">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-night-day fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
														<span class="path6"></span>
														<span class="path7"></span>
														<span class="path8"></span>
														<span class="path9"></span>
														<span class="path10"></span>
													</i>
												</span>
                                                <span class="menu-title">Light</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                               data-kt-value="dark">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-moon fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
                                                <span class="menu-title">Dark</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                               data-kt-value="system">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-screen fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</span>
                                                <span class="menu-title">System</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Theme mode-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Content-->
                    @yield('content')
                    <!--end::Content-->
                    <!--begin::Footer-->
                    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                        <!--begin::Container-->
                        <div class="container d-flex flex-column flex-md-row flex-stack">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-gray-400 fw-semibold me-1">Debeloped by</span>
                                <a href="https://github.com/aboodlibda" target="_blank" class="text-muted text-hover-primary fw-semibold me-2 fs-6">Abdullah
                                    Yousuf</a>
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item">
                                    <a href="#" target="_blank" class="menu-link px-2">About</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" target="_blank" class="menu-link px-2">Support</a>
                                </li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->
        <!--begin::Drawers-->


        <!--begin::Modals-->

        <!--end::Modals-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
            <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1"/>
						<path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
			</span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Scrolltop-->


        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            // toastr default options
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            // custom toast function
            function toast(key, message) {
                switch (key) {
                    case 'success':
                        toastr.success(message);
                        break;
                    case 'error':
                        toastr.error(message);
                        break;
                    case 'info':
                        toastr.info(message);
                        break;
                    case 'warning':
                        toastr.warning(message);
                        break;
                }
            }

            // check if session has toast data
            @if(session('toast'))
            let toastData = @json(session('toast'));
            toast(toastData.key, toastData.message);
            @endif
        </script>



        @yield('script')

        </body>
        <!--end::Body-->
        </html>
