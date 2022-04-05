@extends('layouts.master',['headerLess'=>true])

@section('title', __('Unauthorized'))

@section('content')
    <div class="mb-4 text-center" style="padding: 0 15px;">
        <img src="{{asset('storage/images/unauthorized.png')}}" alt="" class="img-fluid" style="max-width: 230px">
    </div>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <h4 class="text-center text-warning mb-4">{{ (isset($exception) && $exception->getMessage()) ? $exception->getMessage() : __('Unauthorized!')  }}</h4>
            <p class="text-center pb-3">{{ __('You are not authorized to access this page.') }}</p>
            @guest
                <a href="{{ route('home') }}" class="btn btn-success btn-block">{{ __('Go Home') }}</a>
            @endguest
            @auth
                <a href="{{ route('profile.index') }}" class="btn btn-success btn-block">{{ __('Go Profile') }}</a>
            @endauth
        </div>
    </div>
@endsection
