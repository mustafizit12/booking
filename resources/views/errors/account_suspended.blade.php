@extends('layouts.master',['headerLess'=>true])
@section('title', __('Suspended Account'))
@section('content')
    <div class="text-center" style="padding: 0 15px;">
        <img src="{{asset('storage/images/suspended.png')}}" alt="" class="img-fluid">
    </div>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <h4 class="text-center text-danger mb-4">{{  __('Account Suspended!')  }}</h4>
            <p class="text-center pb-3">{{ __('Please contact administrator to get back your account.') }}</p>
            @guest
                <a href="{{ route('home') }}" class="btn btn-success btn-block">{{ __('Go Home') }}</a>
            @endguest
            @auth
                <a href="{{ route('profile.index') }}" class="btn btn-success btn-block">{{ __('Go Profile') }}</a>
            @endauth
        </div>
    </div>
@endsection
