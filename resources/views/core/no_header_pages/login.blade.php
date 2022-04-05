@extends('layouts.master',['headerLess'=>true])
@section('title', __('Login'))
@section('content')
    <div class="text-center mb-3">
        <a href="{{route('home')}}" class="lf-logo{{!empty(settings('logo_inversed_secondary')) ? ' lf-logo-inversed' : ''}}">
            <img src="{{ company_logo() }}" class="img-fluid" alt="">
        </a>
    </div>
    <h4 class="text-center mb-4">{{ __('Login Panel') }}</h4>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <form class="laraframe-form" action="{{ route('login') }}" method="post">
                @csrf
                @basekey
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user"></i></div>
                    </div>
                    <input type="text" class="form-control" name="{{ fake_field('username') }}"
                           placeholder="Username" value="{{ old('username') }}">
                    <span class="invalid-feedback">{{ $errors->first('username') }}</span>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-lock"></i></div>
                    </div>
                    <input type="password" class="form-control" name="{{ fake_field('password') }}"
                           placeholder="Password">
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                </div>

                @if( env('APP_ENV') != 'local' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
                    <div class="input-group mb-3">
                        <div>
                            {{ view_html(NoCaptcha::display()) }}
                        </div>
                        <span class="invalid-feedback">{{ $errors->first('g-recaptcha-response') }}</span>
                    </div>
                @endif

                <div class="checkbox mb-3">
                    <div class="lf-checkbox">
                        <input id="rememberMe" type="checkbox" name="{{ fake_field('remember_me') }}">
                        <label for="rememberMe">{{ __('Remember Me') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">{{ __('Login') }}</button>
                </div>
            </form>
            <div class="text-center pt-2 laraframe-form">
                <a class="txt2" href="{{ route('forget-password.index') }}">{{ __('Forgot Password?') }}</a>
            </div>
            <!-- <div class="text-center pt-1 laraframe-form">
                <a class="txt2" href="{{ route('register.index') }}">{{ __('Create your Account') }}</a>
            </div> -->
        </div>
    </div>
@endsection

@section('script')
    @if( env('APP_ENV') == 'production' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
        {{ view_html(NoCaptcha::renderJs()) }}
    @endif
@endsection
