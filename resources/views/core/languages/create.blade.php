@extends('layouts.master')

@section('title', $title)

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        {{ Form::open(['route' => 'languages.store', 'class' => 'cvalidate', 'files' => true]) }}
                        @include('core.languages._form', ['buttonText' => __('Create')])
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.js') }}"></script>
    <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.cvalidate').cValidate();
        });
    </script>
@endsection
