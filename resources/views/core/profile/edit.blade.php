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
                {{ Form::open(['route'=>['profile.update'],'class'=>'form-horizontal edit-profile-form','method'=>'put']) }}
                <input type="hidden" value="{{base_key()}}" name="base_key">
                {{--first name--}}
                <div class="form-group row">
                    <label for="{{ fake_field('first_name') }}"
                           class="col-md-4 control-label required">{{ __('First Name') }}</label>
                    <div class="col-md-8">
                    {{ Form::text(fake_field('first_name'), old('first_name', $user->profile->first_name), ['class'=> form_validation($errors, 'first_name'), 'id' => fake_field('first_name'),'data-cval-name' => 'The first name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('first_name') }}">{{ $errors->first('first_name') }}</span>
                    </div>
                </div>
                {{--last name--}}
                <div class="form-group row">
                    <label for="{{ fake_field('last_name') }}"
                           class="col-md-4 control-label required">{{ __('Last Name') }}</label>
                    <div class="col-md-8">
                    {{ Form::text(fake_field('last_name'), old('last_name', $user->profile->last_name), ['class'=>form_validation($errors, 'last_name'), 'id' => fake_field('last_name'),'data-cval-name' => 'The last name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('last_name') }}">{{ $errors->first('last_name') }}</span>
                    </div>
                </div>
                {{--email--}}
                <div class="form-group row">
                    <label class="col-md-4 control-label required">{{ __('Email') }}</label>
                    <div class="col-md-8">
                    <p class="form-control">{{ $user->email }}</p>
                    </div>
                </div>
                {{--username--}}
                <div class="form-group row">
                    <label class="col-md-4 control-label required">{{ __('Username') }}</label>
                    <div class="col-md-8">
                    <p class="form-control">{{ $user->username }}</p>
                    </div>
                </div>
                {{--address--}}
                <div class="form-group row">
                    <label for="{{ fake_field('address') }}"
                           class="col-md-4 control-label">{{ __('Address') }}</label>
                    <div class="col-md-8">
                    {{ Form::textarea(fake_field('address'),  old('address', $user->profile->address), ['class'=>form_validation($errors, 'address'), 'id' => fake_field('address'), 'rows'=>2,'data-cval-name' => 'The address name field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('address') }}">{{ $errors->first('address') }}</span>
                    </div>
                </div>
                {{--submit button--}}
                <div class="form-group row">
                    <div class="offset-md-4 col-md-8">
                        {{ Form::submit(__('Update'),['class'=>'btn btn-info btn-sm btn-sm-block form-submission-button']) }}
                        {{ Form::button('<i class="fa fa-undo"></i>',['class'=>'btn btn-danger btn-sm btn-sm-block reset-button']) }}
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
            $('.edit-profile-form').cValidate();
        });
    </script>
@endsection
