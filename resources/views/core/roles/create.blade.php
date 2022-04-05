@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        {{ Form::open(['route'=>['roles.store'], 'method'=>'POST' ,'class'=>'roles-form clearfix']) }}
        @include('core.roles._form',['buttonText'=>__('Create')])
        {{ Form::close() }}
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.js') }}"></script>
    <script src="{{ asset('js/role_manager.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.roles-form').cValidate({});
        });
    </script>
@endsection
