@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        {{ Form::open(['route'=>['roles.update',$role->id], 'method'=>'PUT','class'=> 'roles-form clearfix']) }}
        @include('core.roles._form',['buttonText'=>__('Update')])
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
