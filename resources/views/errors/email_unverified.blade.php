@extends('layouts.master',['headerLess'=>true])
@section('title', __('Unverified Account'))
@section('content')
    <div class="mb-4 text-center" style="padding: 0 15px;">
        <img src="{{asset('storage/images/not-vfy.png')}}" alt="" class="img-fluid" style="max-width: 230px">
    </div>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <h4 class="text-center text-warning mb-4">{{ __('Email Unverified!')  }}</h4>
            <p class="text-center pb-3">{{ __('Please verify your email address to explore permitted access paths in full.') }}</p>
            @guest
                <a href="{{ route('home') }}" class="btn btn-success btn-block">{{ __('Go Home') }}</a>
            @endguest
            @auth
                <a href="{{ route('profile.index') }}" class="btn btn-success btn-block">{{ __('Go Profile') }}</a>
            @endauth

            <a href="{{route('verification.form')}}"
               class="btn btn-success btn-block">{{ __('Resend verification link') }}</a>
        </div>
    </div>
@endsection
