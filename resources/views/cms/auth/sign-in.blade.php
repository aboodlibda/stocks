<!DOCTYPE html>
@if(App::getLocale()=='ar')
    <html dir="rtl" lang="ar">
    @else
        <html dir="ltr" lang="en">
        @endif
        <!--begin::Head-->
        <head>
            <base href="../../../"/>
            <title>Stocks - {{trans('dashboard_trans.Sign In')}}</title>
            {{--    @notifyCss--}}
            <meta charset="utf-8"/>
            <meta name="description"
                  content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free."/>
            <meta name="keywords"
                  content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <meta property="og:locale" content="en_US"/>
            <meta property="og:type" content="article"/>
            <meta property="og:title"
                  content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template"/>
            <meta property="og:url" content="https://keenthemes.com/metronic"/>
            <meta property="og:site_name" content="Keenthemes | Metronic"/>
            <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
            <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>
            <!--begin::Fonts(mandatory for all pages)-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
            <!--end::Fonts-->
            <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
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
            <!--end::Global Stylesheets Bundle-->
            <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
        </head>
        <!--end::Head-->
        <!--begin::Body-->
        <body id="kt_body" class="auth-bg">
        <!--begin::Theme mode setup on page load-->
        <script>var defaultThemeMode = "light";
            var themeMode;
            if (document.documentElement) {
                if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                } else {
                    if (localStorage.getItem("data-bs-theme") !== null) {
                        themeMode = localStorage.getItem("data-bs-theme");
                    } else {
                        themeMode = defaultThemeMode;
                    }
                }
                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-bs-theme", themeMode);
            }</script>
        <!--end::Theme mode setup on page load-->
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page bg image-->
            <style>body {
                    background-image: url('{{asset('assets/media/auth/bg10.jpeg')}}');
                }

                [data-bs-theme="dark"] body {
                    background-image: url('{{asset('assets/media/auth/bg10-dark.jpeg')}}');
                }</style>
            <!--end::Page bg image-->
            <!--begin::Authentication - Sign-in -->
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">

                <!--begin::Aside-->
                <div class="d-flex flex-lg-row-fluid">
                    <!--begin::Content-->
                    <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                        <!--begin::Image-->
                        <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                             src="{{asset('assets/media/auth/agency.png')}}" alt=""/>
                        <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                             src="{{asset('assets/media/auth/agency-dark.png')}}" alt=""/>
                        <!--end::Image-->
                        <!--begin::Title-->
                        <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post,
                            <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person
                            they’ve interviewed
                            <br/>and provides some background information about
                            <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their
                            <br/>work following this is a transcript of the interview.
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--begin::Aside-->
                <!--begin::Body-->
                <div
                    class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                    <!--begin::Wrapper-->
                    <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                        <!--begin::Content-->
                        <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                                <!--begin::Form-->
                                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                                      data-kt-redirect-url="{{route('dashboard')}}" action="{{route('do-login')}}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="text-center mb-11">
                                        <!--begin::Title-->
                                        <h1 class="text-dark fw-bolder mb-3">{{trans('dashboard_trans.Sign In')}}</h1>
                                        <!--end::Title-->
                                        <!--begin::Subtitle-->
                                        <div class="text-gray-500 fw-semibold fs-6"></div>
                                        <!--end::Subtitle=-->
                                    </div>
                                    <!--begin::Heading-->
                                    <!--begin::Login options-->
{{--                                    <div class="row g-3 mb-9">--}}
{{--                                        <div class="text-center align-items-center">--}}
{{--                                            <!--begin::Symbol-->--}}
{{--                                            <a href="#" class="symbol symbol-circle symbol-50px w-50px bg-light me-3">--}}
{{--                                                <img alt="Logo"--}}
{{--                                                     src="{{asset('assets/media/svg/brand-logos/google-icon.svg')}}"--}}
{{--                                                     class="p-4">--}}
{{--                                            </a>--}}
{{--                                            <!--end::Symbol-->--}}
{{--                                            <!--begin::Symbol-->--}}
{{--                                            <a href="#" class="symbol symbol-circle symbol-50px w-50px bg-light me-3">--}}
{{--                                                <img alt="Logo"--}}
{{--                                                     src="{{trans('assets/media/svg/brand-logos/facebook-3.svg')}}"--}}
{{--                                                     class="p-4">--}}
{{--                                            </a>--}}
{{--                                            <!--end::Symbol-->--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <!--end::Login options-->
                                    <!--begin::Separator-->
{{--                                    <div class="separator separator-content my-14">--}}
{{--                                        <span--}}
{{--                                            class="w-125px text-gray-500 fw-semibold fs-7">{{trans('dashboard_trans.Or with email')}}</span>--}}
{{--                                    </div>--}}
                                    <!--end::Separator-->
                                    <!--begin::Input group=-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Email-->
                                        <input type="text" placeholder="{{trans('dashboard_trans.Email')}}" name="email"
                                               autocomplete="off" class="form-control bg-transparent"/>
                                        <!--end::Email-->
                                        <span id="email-error" class="error-message"></span>
                                    </div>
                                    <!--end::Input group=-->
                                    <div class="fv-row mb-3">
                                        <!--begin::Password-->
                                        <input type="password" placeholder="{{trans('dashboard_trans.Password')}}"
                                               name="password" autocomplete="off" class="form-control bg-transparent"/>
                                        <!--end::Password-->
                                        <span id="password-error" class="error-message"></span>
                                    </div>
                                    <!--end::Input group=-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                        <div></div>
                                        <!--begin::Link-->
                                        <a href="#" class="link-primary">{{trans('dashboard_trans.Forgot Password')}}
                                            ?</a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Submit button-->
                                    <div class="d-grid mb-10">
                                        <button type="submit" class="btn btn-primary" id="kt_sign_in_submit">
                                            <!--begin::Indicator label-->
                                            <span class="indicator-label">{{trans('dashboard_trans.Sign In')}}</span>
                                            <!--end::Indicator label-->
                                            <!--begin::Indicator progress-->
                                            <span class="indicator-progress">{{trans('dashboard_trans.Please wait')}}...
											<span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            <!--end::Indicator progress-->
                                        </button>
                                    </div>
                                    <!--end::Submit button-->
                                    <!--begin::Sign up-->
                                    <div
                                        class="text-gray-500 text-center fw-semibold fs-6">{{trans('dashboard_trans.Not a Member yet')}}
                                        ?
                                        <a href="#" class="link-primary">{{trans('dashboard_trans.Sign Up')}}</a></div>
                                    <!--end::Sign up-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Footer-->
                            <div class="m-0">
                                <!--begin::Toggle-->
                                @if (App::getLocale() == 'en')
                                    <button class="btn btn-flex btn-link rotate" data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
                                        <img data-kt-element="current-lang-flag"
                                             class="w-25px h-25px rounded-circle me-3"
                                             src="{{asset('assets/media/flags/united-states.svg')}}" alt=""/>
                                        <span data-kt-element="current-lang-name" class="me-2">English</span>
                                        <i class="ki-duotone ki-down fs-2 text-muted rotate-180 m-0"></i>
                                    </button>
                                @else
                                    <button class="btn btn-flex btn-link rotate" data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
                                        <img data-kt-element="current-lang-flag"
                                             class="w-25px h-25px rounded-circle me-3"
                                             src="{{asset('assets/media/flags/saudi-arabia.svg')}}" alt=""/>
                                        <span data-kt-element="current-lang-name" class="me-2">العربية</span>
                                        <i class="ki-duotone ki-down fs-2 text-muted rotate-180 m-0"></i>
                                    </button>
                                @endif

                                <!--end::Toggle-->
                                <!--begin::Menu-->
                                <div
                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4"
                                    data-kt-menu="true" id="kt_auth_lang_menu">
                                    <!--begin::Menu item-->
                                    @foreach(LaravelLocalization::getSupportedLocales()  as $localeCode => $properties)
                                        <div class="menu-item px-3">
                                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                               hreflang="{{ $localeCode }}" class="menu-link d-flex px-5"
                                               data-kt-lang="English">
                                                <span data-kt-element="lang-name">{{ $properties['native'] }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
        <!--end::Root-->
        <!--end::Main-->
        <!--begin::Javascript-->
        <script>var hostUrl = "assets/";</script>
        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Custom Javascript(used for this page only)-->
        <script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>
        <script src="{{asset('assets/js/custom/authentication/sign-in/i18n.js')}}"></script>
        <!--end::Custom Javascript-->
        {{--<x-notify::notify />--}}
        {{--@notifyJs--}}
        <!--end::Javascript-->
        </body>

        <!--end::Body-->
        </html>
