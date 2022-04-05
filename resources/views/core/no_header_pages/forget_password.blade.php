@extends('layouts.master',['headerLess'=>true])
@section('title', __('Reset Password'))
@section('content')
    <div class="text-center mb-3">
        <a href="{{route('home')}}" class="lf-logo{{!empty(settings('logo_inversed_secondary')) ? ' lf-logo-inversed' : ''}}">
            <img src="{{ company_logo() }}" class="img-fluid" alt="">
        </a>
    </div>
    <h4 class="text-center mb-4">{{ __('Password Reset Link') }}</h4>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <form class="laraframe-form" action="{{ route('forget-password.send-mail') }}" method="post">
                @csrf
                @basekey
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user"></i></div>
                    </div>
                    <input type="text"
                           class="{{ $errors->has('email') ? 'form-control invalid-form' : 'form-control' }}"
                           name="{{ fake_field('email') }}"
                           placeholder="Email">
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
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
                    <button type="submit" class="btn btn-block btn-success">{{ __('Get Password Reset Link') }}</button>
                </div>
            </form>
            <div class="text-center pt-2">
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>
            @if(settings('require_email_verification') == ACTIVE_STATUS_ACTIVE)
                <div class="text-center pt-1">
                    <a href="{{ route('verification.form') }}">{{ __('Get verification email') }}</a>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    @if( env('APP_ENV') == 'production' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
        {{ view_html(NoCaptcha::renderJs()) }}
    @endif
@endsection
