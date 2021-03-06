@extends('layouts.master',['headerLess'=>true])
@section('title', __('Reset Password'))
@section('content')
    <div class="text-center mb-3">
        <a href="{{route('home')}}" class="lf-logo{{!empty(settings('logo_inversed_secondary')) ? ' lf-logo-inversed' : ''}}">
            <img src="{{ company_logo() }}" class="img-fluid" alt="">
        </a>
    </div>
    <h4 class="text-center mb-4">{{ __('Reset Password') }}</h4>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <form class="validator" action="{{ $passwordResetLink }}" method="post">
                @csrf
                @basekey

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-lock"></i></div>
                    </div>
                    <input type="password" class="form-control" name="{{ fake_field('new_password') }}"
                           placeholder="Password">
                    <span class="invalid-feedback">{{ $errors->first('new_password') }}</span>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-lock"></i></div>
                    </div>
                    <input type="password" class="form-control" name="{{ fake_field('password_confirmation') }}"
                           placeholder="Confirm Password">
                    <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                </div>

                @if( env('APP_ENV') != 'local' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
                    <div class="input-group mb-3">
                        <div>
                            {{ view_html(NoCaptcha::display()) }}
                        </div>
                        <span class="invalid-feedback">{{ $errors->first('g-recaptcha-response') }}</span>
                    </div>
                @endif

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success">{{ __('Reset') }}</button>
                </div>
            </form>
            <div class="text-center pt-2">
                <a class="txt2" href="{{ route('forget-password.index') }}">{{ __('Forgot Password?') }}</a>
            </div>
            <div class="text-center pt-1">
                <a class="txt2" href="{{ route('register.index') }}">{{ __('Create your Account') }}<i
                        class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.validator').cValidate({});
        });
    </script>
@endsection
