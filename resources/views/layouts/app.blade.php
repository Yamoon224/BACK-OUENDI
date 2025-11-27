<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-skin="default" data-bs-theme="light" data-assets-path="{{ public_path() }}" data-template="vertical-menu-template">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ app_env('url') }}">
        <meta name="robots" content="noindex, nofollow" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name="description" content="{{ app_env('description') }}" />
        <!-- Canonical SEO -->
        <meta name="keywords" content="{{ app_env('keywords') }}" />
        <meta property="og:title" content="{{ app_env('title') }}" />
        <meta property="og:type" content="{{ app_env('type') }}" />
        <meta property="og:url" content="{{ app_env('url') }}" />
        <meta property="og:image" content="{{ app_env('image') }}" />
        <meta property="og:description" content="{{ app_env('description') }}" />
        <meta property="og:site_name" content="{{ app_env('site_name') }}" />
        <link rel="canonical" href="https://themeforest.net/item/materialize-material-design-admin-template/11446068" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
            rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

        <!-- Core CSS -->

        <!-- build:css assets/vendor/css/theme.css -->
        <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />

        <script src="{{ asset('vendor/libs/@algolia/autocomplete-js.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />


        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

        <!-- endbuild -->
        @stack('links')

        <!-- Page CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/css/pages/app-logistics-dashboard.css') }}" />

        <!-- Helpers -->
        <script src="{{ asset('vendor/js/helpers.js') }}"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js. -->
        <script src="{{ asset('vendor/js/template-customizer.js') }}"></script>

        <!--? Config: Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file. -->
        <script src="{{ asset('js/config.js') }}"></script>
    </head>
    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">

                <x-app-aside></x-app-aside>

                <div class="menu-mobile-toggler d-xl-none rounded-1">
                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
                        <i class="ri ri-menu-line icon-base"></i>
                        <i class="ri ri-arrow-right-s-line icon-base"></i>
                    </a>
                </div>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">   
                    <x-app-nav></x-app-nav>

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        {{ $slot }}

                        <x-app-footer></x-app-footer>

                        <div class="content-backdrop fade"></div>
                    </div>
                </div>

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>
            
                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                <div class="drag-target"></div>
            </div>
        </div>

        <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>

        <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>

        <script src="{{ asset('vendor/libs/@algolia/autocomplete-js.js') }}"></script>

        <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>
        <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
        <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>

        <script src="{{ asset('vendor/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        @stack('scripts')

        <!-- Main JS -->
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
