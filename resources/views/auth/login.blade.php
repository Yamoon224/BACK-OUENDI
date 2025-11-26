<x-auth-layout>
    <form id="formAuthentication" class="mb-5" action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-floating form-floating-outline mb-5 form-control-validation">
            <x-app-input type="text" class="form-control" id="username" name="username" placeholder="{{ __('locale.username') }}" autofocus required/>
            <x-app-label for="username">@lang('locale.username')</x-app-label>
        </div>
        <div class="mb-3">
            <div class="form-password-toggle form-control-validation">
                <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                        <x-app-input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required/>
                        <x-app-label for="password">@lang('locale.password')</x-app-label>
                    </div>
                    <span class="input-group-text cursor-pointer"><i class="icon-base ri ri-eye-off-line icon-20px"></i></span>
                </div>
            </div>
        </div>
        <div class="mb-2 d-flex justify-content-between mt-5">
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" name="remember" id="remember-me" />
                <label class="form-check-label" for="remember-me"> @lang('locale.remember_me') </label>
            </div>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="float-end mb-1 mt-2">
                <span>@lang('locale.forgot_password') ?</span>
            </a>
            @endif
        </div>
        <div class="mb-2">
            <x-app-btn class="btn-secondary btn-fab demo waves-effect d-grid w-100">@lang('locale.sign_in')</x-app-btn>
        </div>
    </form>
</x-auth-layout>
