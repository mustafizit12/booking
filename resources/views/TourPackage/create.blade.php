@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-1 col-md-10">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left">{{ __('Create New Tour Package') }}</h5>
                    <div class="float-right">
                        <a href="{{ route('tourPackages.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                {{ Form::open(['route'=>'tourPackages.store', 'method' => 'post', 'class'=>'form-horizontal user-form','files'=> true]) }}
                @basekey
                <div class="row">
                  {{--package_name--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('package_name') }}" class="col-form-label text-right required">{{ __('Package Name') }}</label>
                      <div>
                          {{ Form::text(fake_field('package_name'),  old('package_name', null), ['class'=>form_validation($errors, 'package_name'), 'id' => fake_field('package_name'),'data-cval-name' => 'The package Name field','data-cval-rules' => 'required']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('package_name') }}">{{ $errors->first('package_name') }}</span>
                      </div>
                  </div>
                  {{--valid_till--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('valid_till') }}" class="col-form-label text-right required">{{ __('Valid Till') }}</label>
                      <div>
                          {{ Form::text(fake_field('valid_till'),  old('valid_till', null), ['class'=>[form_validation($errors, 'valid_till'),'datepicker'], 'id' => fake_field('valid_till'),'data-cval-name' => 'The contact number field','data-cval-rules' => '']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('valid_till') }}">{{ $errors->first('valid_till') }}</span>
                      </div>
                  </div>
                </div>
                <div class="row">
                  {{--package_cost--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('package_cost') }}" class="col-form-label text-right required">{{ __('Package Cost') }}</label>
                      <div>
                          {{ Form::number(fake_field('package_cost'),  old('package_cost', null), ['class'=>form_validation($errors, 'package_cost'),'step'=>'any', 'id' => fake_field('package_cost'),'data-cval-name' => 'The package Cost field','data-cval-rules' => 'required']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('package_cost') }}">{{ $errors->first('package_cost') }}</span>
                      </div>
                  </div>
                  {{--discount--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('discount') }}" class="col-form-label text-right required">{{ __('Discount') }}</label>
                      <div>
                          {{ Form::text(fake_field('discount'),  old('discount', null), ['class'=>[form_validation($errors, 'discount')],'step'=>'any', 'id' => fake_field('discount'),'data-cval-name' => 'The Discount field','data-cval-rules' => '']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('discount') }}">{{ $errors->first('discount') }}</span>
                      </div>
                  </div>
                </div>
                {{--details--}}
                <div class="form-group mb-1">
                    <label for="{{ fake_field('details') }}" class="col-form-label text-right">{{ __('Description') }}</label>
                    <div>
                        {{ Form::textarea(fake_field('details'), old('details', null), ['class'=>[form_validation($errors, 'details'),'textarea'], 'id' => fake_field('details'), 'rows'=>2,'data-cval-name' => 'The details field','data-cval-rules' => 'escapeInput']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('details') }}">{{ $errors->first('details') }}</span>
                    </div>
                </div>

                <div class="row">
                  {{--image--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('image') }}" class="col-form-label text-right required">{{ __('Hotel Image') }}</label>
                      <div >
                        <!-- <input type="file" name="image[]" multiple class="form-control" >
                           {{ Form::file(fake_field('image'),  ['class'=>form_validation($errors, 'image'), 'id' => fake_field('image'),'multiple'=>"multiple",'data-cval-image' => 'The File field','data-cval-rules' => '']) }}-->
                           <fieldset class="form-group form-control">
                              <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                              <input type="file" id="pro-image" name="image[]" style="display: none;" class="form-control" multiple accept="image/*">
                          </fieldset>
                          <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('image') }}">{{ $errors->first('image') }}</span>
                          <div class="preview-images-zone" style="display:none;"></div>
                      </div>
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
    @include('layouts.includes.list-js')
    <script>
        $(document).ready(function () {
            $('.user-form').cValidate({});
        });
    </script>
@endsection
