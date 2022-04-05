@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left">{{ __('Create New User') }}</h5>
                    <div class="float-right">
                        <a href="{{ route('users.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                {{ Form::open(['route'=>'users.store', 'method' => 'post', 'class'=>'form-horizontal user-form']) }}
                @include('core.users._create_form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.user-form').cValidate({});
            $('#area-div').hide();
            $('#{{ fake_field('role_id') }}').change(function(){
                var id = $(this).val();
                if(id == 3){
                  $('#area-div').show();
                  $('#{{ fake_field('area_id') }}').attr('required',true);
                }else{
                  $('#area-div').hide();
                  $('#{{ fake_field('area_id') }}').attr('required',false);
                }
            });
        });
    </script>
@endsection
