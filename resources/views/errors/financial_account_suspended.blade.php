@extends('layouts.master',['headerLess'=>true])
@section('title', __('Financial Suspension'))
@section('content')
    <div class="mb-5 text-center" style="padding: 0 15px;">
        <img src="{{asset('storage/images/freeze.png')}}" alt="" class="img-fluid">
    </div>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <h4 class="text-center text-danger mb-4">{{ __('Financially Suspended!')  }}</h4>
            <p class="text-center pb-3">{{ __('Please contact administrator to get back your financial access.') }}</p>
            @guest
                <a href="{{ route('home') }}" class="btn btn-success btn-block">{{ __('Go Home') }}</a>
            @endguest
            @auth
                <a href="{{ route('profile.index') }}" class="btn btn-success btn-block">{{ __('Go Profile') }}</a>
            @endauth
        </div>
    </div>
@endsection
