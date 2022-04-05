@extends('layouts.master',['headerLess'=>true])

@section('title', __('Unknown Error'))

@section('content')
    <div class="text-center mb-4" style="padding: 0 15px;">
        <img src="{{asset('storage/images/503.png')}}" alt="" class="img-fluid" style="max-width: 230px">
    </div>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <h4 class="text-center text-warning">{{ __('Be right back.') }}</h4>
        </div>
    </div>
@endsection
