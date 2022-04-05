@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-1 col-md-10">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left">{{ __('Create New Bus') }}</h5>
                    <div class="float-right">
                        <a href="{{ route('buss.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                {{ Form::open(['route'=>'buss.store', 'method' => 'post', 'class'=>'form-horizontal user-form','files'=> true]) }}
                @basekey
                <div class="row">
                  {{--company_name--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('company_name') }}" class="col-form-label text-right required">{{ __('Company Name') }}</label>
                      <div>
                          {{ Form::text(fake_field('company_name'),  old('company_name', null), ['class'=>form_validation($errors, 'company_name'), 'id' => fake_field('company_name'),'data-cval-name' => 'The company name field','data-cval-rules' => 'required']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('company_name') }}">{{ $errors->first('company_name') }}</span>
                      </div>
                  </div>
                  {{--bus_model--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('bus_model') }}" class="col-form-label text-right required">{{ __('Bus Model') }}</label>
                      <div>
                          {{ Form::text(fake_field('bus_model'),  old('bus_model', null), ['class'=>form_validation($errors, 'bus_model'), 'id' => fake_field('bus_model'),'data-cval-name' => 'The contact number field','data-cval-rules' => '']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('bus_model') }}">{{ $errors->first('bus_model') }}</span>
                      </div>
                  </div>
                </div>
                <div class="row">
                  {{--starting_point--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('starting_point') }}" class="col-form-label text-right required">{{ __('Starting Point') }}</label>
                      <div>
                          {{ Form::text(fake_field('starting_point'),  old('starting_point', null), ['class'=>form_validation($errors, 'starting_point'), 'id' => fake_field('starting_point'),'data-cval-name' => 'The contact number field','data-cval-rules' => 'required']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('starting_point') }}">{{ $errors->first('starting_point') }}</span>
                      </div>
                  </div>
                  {{--end_point--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('end_point') }}" class="col-form-label text-right required">{{ __('End Point') }}</label>
                      <div>
                          {{ Form::text(fake_field('end_point'),  old('end_point', null), ['class'=>form_validation($errors, 'end_point'), 'id' => fake_field('end_point'),'data-cval-name' => 'The contact number field','data-cval-rules' => 'required']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('end_point') }}">{{ $errors->first('end_point') }}</span>
                      </div>
                  </div>
                </div>
                <div class="row">
                  {{--departure_time--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('departure_time') }}" class="col-form-label text-right required">{{ __('Departure Time') }}</label>
                      <div>
                          {{ Form::text(fake_field('departure_time'),  old('departure_time', null), ['class'=>[form_validation($errors, 'departure_time'),'time24'], 'id' => fake_field('departure_time'),'data-cval-name' => 'The Departure Time field','data-cval-rules' => '']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('departure_time') }}">{{ $errors->first('departure_time') }}</span>
                      </div>
                  </div>
                  {{--arrival_time--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('arrival_time') }}" class="col-form-label text-right required">{{ __('Arrival Time') }}</label>
                      <div>
                          {{ Form::text(fake_field('arrival_time'),  old('arrival_time', null), ['class'=>[form_validation($errors, 'arrival_time'),'time24'], 'id' => fake_field('arrival_time'),'data-cval-name' => 'The Arrival Time field','data-cval-rules' => '']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('arrival_time') }}">{{ $errors->first('arrival_time') }}</span>
                      </div>
                  </div>
                </div>
                <div class="row">
                  {{--seat_quantity--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('seat_quantity') }}" class="col-form-label text-right required">{{ __('Seat Quantity') }}</label>
                      <div>
                          {{ Form::number(fake_field('seat_quantity'),  old('seat_quantity', null), ['class'=>form_validation($errors, 'seat_quantity'), 'id' => fake_field('seat_quantity'),'data-cval-name' => 'The Seat Quantity field','data-cval-rules' => 'required']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('seat_quantity') }}">{{ $errors->first('seat_quantity') }}</span>
                      </div>
                  </div>
                  {{--price--}}
                  <div class="form-group mb-1 col-md-6">
                      <label for="{{ fake_field('price') }}" class="col-form-label text-right required">{{ __('Price') }}</label>
                      <div>
                          {{ Form::number(fake_field('price'),  old('price', null), ['class'=>form_validation($errors, 'price'), 'id' => fake_field('price'),'step'=>'any','data-cval-name' => 'The Price field','data-cval-rules' => 'required']) }}
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('price') }}">{{ $errors->first('price') }}</span>
                      </div>
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
                  {{--bus_quality--}}
                  <div class="form-group mb-1 col-md-6" >
                      <label for="{{ fake_field('bus_quality') }}"
                             class="col-form-label text-right required">{{ __('Bus Quality') }}</label>
                      <div>
                          <div class="lf-select">
                          {{ Form::select(fake_field('bus_quality'), [0=>'Non Ac',1=>'Ac'], old('bus_quality', 0),['class' => [form_validation($errors, 'bus_quality'),'select2'],'id' => fake_field('bus_quality'), 'placeholder' => __('Select Bus Quality'),'data-cval-name' => 'The Bus Quality field','placeholder'=>'Select Bus Quality','data-cval-rules' => 'required|integer']) }}
                          </div>
                          <span class="invalid-feedback cval-error"
                                data-cval-error="{{ fake_field('bus_quality') }}">{{ $errors->first('bus_quality') }}</span>
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
