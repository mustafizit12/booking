@extends('layouts.master',['headerLess'=>true])

@section('title', __('Error 404'))

@section('content')
    <div class="mb-4 text-center" style="padding: 0 15px;">
    <img src="{{asset('storage/images/404.png')}}" alt="" class="img-fluid">
    </div>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <h4 class="text-center text-danger mb-4">{{ (isset($exception) && $exception->getMessage()) ? $exception->getMessage() : __('Not Found!')  }}</h4>
            <p class="text-center pb-3">{{ __('The page you are looking for might be changed, removed or not exists. Go back and try other links') }}</p>
            <a href="{{ route('home') }}" class="btn btn-success btn-block">{{ __('Go Home') }}</a>
        </div>
    </div>
@endsection
