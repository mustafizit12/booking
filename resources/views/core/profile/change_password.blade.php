@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                @include('core.profile.avatar')
            </div>
            <div class="col-md-9">
                @include('core.profile.profile_nav')
                {{ Form::open(['route'=>['profile.update-password'],'class'=>'form-horizontal validator','method'=>'put']) }}
                <input type="hidden" value="{{base_key()}}" name="base_key">
                {{--password--}}
                <div class="form-group row">
                    <label for="{{ fake_field('password') }}"
                           class="col-md-4 control-label required">{{ __('Current Password') }}</label>
                    <div class="col-md-8">
                    {{ Form::password(fake_field('password'), ['class'=>form_validation($errors, 'password'), 'placeholder' => __('Enter current password'), 'id' => fake_field('password'),'data-cval-name' => 'The password','data-cval-rules' => 'required|escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('password') }}">{{ $errors->first('password') }}</span>
                    </div>
                </div>
                {{--new password--}}
                <div class="form-group row">
                    <label for="new_password"
                           class="col-md-4 control-label required">{{ __('New Password') }}</label>
                    <div class="col-md-8">
                    {{ Form::password('new_password', ['class'=>form_validation($errors, 'new_password'), 'placeholder' => __('Enter new password'), 'id' => 'new_password','data-cval-name' => 'The new password','data-cval-rules' => 'required|escapeInput|between:6,32|followedBy:new_password_confirmation']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('new_password') }}">{{ $errors->first('new_password') }}</span>
                    </div>
                </div>
                {{--email--}}
                <div class="form-group row">
                    <label for="new_password_confirmation"
                           class="col-md-4 control-label required">{{ __('Confirm New Password') }}</label>
                    <div class="col-md-8">
                    {{ Form::password('new_password_confirmation', ['class'=>form_validation($errors, 'new_password_confirmation'), 'placeholder' => __('Confirm new password'), 'id' => 'new_password_confirmation','data-cval-name' => 'The confirm new password','data-cval-rules' => 'required|escapeInput|between:6,32|follow:new_password']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('new_password_confirmation') }}">{{ $errors->first('new_password_confirmation') }}</span>
                    </div>
                </div>
                {{--submit button--}}
                <div class="form-group row">
                    <div class="offset-md-4 col-md-8">
                    {{ Form::submit(__('Update Password'),['class'=>'btn btn-info btn-sm btn-left btn-sm-block form-submission-button']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.validator').cValidate();
        });
    </script>
@endsection
