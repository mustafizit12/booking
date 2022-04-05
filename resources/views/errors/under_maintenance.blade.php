@extends('layouts.master',['headerLess'=>true])
@section('title', __('Under Maintenance'))
@section('content')
    <div class="mb-4 text-center" style="padding: 0 15px;">
        <img src="{{asset('storage/images/sandglass.png')}}" alt="" class="img-fluid" style="max-width: 230px">
    </div>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <h4 class="text-center text-warning mb-4">{{ __('Under Maintenance')  }}</h4>
            <p class="text-center">{{ __("The website is still under maintenance mode. send us an email anytime :email",['email' => settings('admin_receive_email')])}}</p>
        </div>
    </div>
@endsection
