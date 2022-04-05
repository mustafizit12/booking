@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
      <div class="row">
          <div class="offset-1 col-md-10">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left">{{ __('Edit Area Information') }}</h5>
                <div class="float-right">
                    <a href="{{ route('areas.index') }}"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            {{ Form::open(['route'=>['areas.update',$area->id], 'method'=>'PUT','class'=> 'roles-form clearfix']) }}
            @basekey
            {{--name--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('name') }}" class="col-form-label text-right required">{{ __('Area Name') }}</label>
                <div>
                    {{ Form::text(fake_field('name'),  old('name', isset($area) ? $area->name : null), ['class'=>form_validation($errors, 'name'), 'id' => fake_field('name'),'data-cval-name' => 'The name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('name') }}">{{ $errors->first('name') }}</span>
                </div>
            </div>

            {{--details--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('details') }}" class="col-form-label text-right">{{ __('Details') }}</label>
                <div>
                    {{ Form::textarea(fake_field('details'), old('details', isset($area) ? $area->details : null), ['class'=>form_validation($errors, 'details'), 'id' => fake_field('details'), 'rows'=>2,'data-cval-name' => 'The details field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('details') }}">{{ $errors->first('details') }}</span>
                </div>
            </div>
            {{--submit button--}}
            <div class="form-group ">

                    {{ Form::submit(__('Update Information'),['class'=>'btn btn-info btn-sm btn-left form-submission-button']) }}


            </div>
            {{ Form::close() }}
          </div>
      </div>
        <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('areas.show', $area->id) }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('areas.index') }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View All Area') }}</a>
                </div>
            </div>
        </div>
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
