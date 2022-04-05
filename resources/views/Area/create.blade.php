@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left">{{ __('Create New Area') }}</h5>
                    <div class="float-right">
                        <a href="{{ route('areas.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                {{ Form::open(['route'=>'areas.store', 'method' => 'post', 'class'=>'form-horizontal user-form']) }}
                @basekey

                {{--name--}}
                <div class="form-group mb-1">
                    <label for="{{ fake_field('name') }}" class="col-form-label text-right required">{{ __('Area Name') }}</label>
                    <div>
                        {{ Form::text(fake_field('name'),  old('name', null), ['class'=>form_validation($errors, 'name'), 'id' => fake_field('name'),'data-cval-name' => 'The name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('name') }}">{{ $errors->first('name') }}</span>
                    </div>
                </div>

                {{--details--}}
                <div class="form-group mb-1">
                    <label for="{{ fake_field('details') }}" class="col-form-label text-right">{{ __('Details') }}</label>
                    <div>
                        {{ Form::textarea(fake_field('details'), old('details', null), ['class'=>form_validation($errors, 'details'), 'id' => fake_field('details'), 'rows'=>2,'data-cval-name' => 'The details field','data-cval-rules' => 'escapeInput']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('details') }}">{{ $errors->first('details') }}</span>
                    </div>
                </div>
                {{--submit buttn--}}
                <div class="form-group">
                    {{ Form::submit(__('Create'),['class'=>'btn btn-sm btn-info form-submission-button']) }}
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
            $('.user-form').cValidate({});
        });
    </script>
@endsection
