<!DOCTYPE html>
<html 
    lang="{{ app()->getLocale() }}"
    class=" layout-wide customizer-hide" dir="ltr" data-skin="default" data-bs-theme="light" data-assets-path="{{ asset('') }}" data-template="vertical-menu-template">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

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
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

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

        <!-- Vendor -->
        <link rel="stylesheet" href="{{ asset('vendor/libs/@form-validation/form-validation.css') }}" />

        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" />

        <!-- Helpers -->
        <script src="{{ asset('vendor/js/helpers.js') }}"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        
        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js. -->
        <script src="{{ asset('vendor/js/template-customizer.js') }}"></script>
        
        <!--? Config: Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file. -->
        <script src="{{ asset('js/config.js') }}"></script>
    </head>
    <body>
        <div class="position-relative" style="background: url({{ asset('images/bg-auth.png') }}); background-size: cover">
            <div class="authentication-wrapper authentication-basic container-p-y p-2 p-sm-0">
                <div class="authentication-inner py-3">
                    <!-- Login -->
                    <div class="card p-3">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mt-5">
                            <a href="{{ route('welcome') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <span class="text-primary">
                                        <x-app-logo width="80" height="80" isRadius="'true'"></x-app-logo>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <div class="card-body mt-1">
                            <h4 class="mb-1">@lang('locale.welcome', ['site_name'=>app_env('name')])</h4>
                            <p class="mb-5 {{ !$errors->isEmpty() ? 'text-danger' : '' }}"> 
                                {{ !$errors->isEmpty() ? implode(', ', $errors->all()) : __('locale.sign_in_prompt') }}
                            </p>

                            {{ $slot }}

                            <div class="divider my-2">
                                <div class="divider-text">{{ app_env('name') }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- /Login -->
                    <img alt="mask" src="{{ asset('images/illustrations/auth-basic-login-mask-light.png') }}" class="authentication-image d-none d-lg-block" data-app-light-img="{{ asset('images/illustrations/auth-basic-login-mask-light.png') }}" data-app-dark-img="{{ asset('images/illustrations/auth-basic-login-mask-dark.png') }}" />
                </div>
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
        <script src="{{ asset('vendor/libs/@form-validation/popular.js') }}"></script>
        <script src="{{ asset('vendor/libs/@form-validation/bootstrap5.js') }}"></script>
        <script src="{{ asset('vendor/libs/@form-validation/auto-focus.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('js/main.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('js/pages-auth.js') }}"></script>
    </body>
</html>
