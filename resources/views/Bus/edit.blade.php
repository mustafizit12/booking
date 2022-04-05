@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
      <div class="row">
          <div class="offset-1 col-md-10">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left">{{ __('Edit Bus Information') }}</h5>
                <div class="float-right">
                    <a href="{{ route('buss.index') }}"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            {{ Form::open(['route'=>['buss.update',$bus->id], 'method'=>'PUT','class'=> 'roles-form clearfix','files'=> true]) }}
            @basekey

            <div class="row">
              {{--company_name--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('company_name') }}" class="col-form-label text-right required">{{ __('Company Name') }}</label>
                  <div>
                      {{ Form::text(fake_field('company_name'),  old('company_name', isset($bus) ? $bus->company_name : null), ['class'=>form_validation($errors, 'company_name'), 'id' => fake_field('company_name'),'data-cval-name' => 'The company name field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('company_name') }}">{{ $errors->first('company_name') }}</span>
                  </div>
              </div>
              {{--bus_model--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('bus_model') }}" class="col-form-label text-right required">{{ __('Bus Model') }}</label>
                  <div>
                      {{ Form::text(fake_field('bus_model'),  old('bus_model', isset($bus) ? $bus->bus_model : null), ['class'=>form_validation($errors, 'bus_model'), 'id' => fake_field('bus_model'),'data-cval-name' => 'The contact number field','data-cval-rules' => '']) }}
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
                      {{ Form::text(fake_field('starting_point'),  old('starting_point', isset($bus) ? $bus->starting_point : null), ['class'=>form_validation($errors, 'starting_point'), 'id' => fake_field('starting_point'),'data-cval-name' => 'The contact number field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('starting_point') }}">{{ $errors->first('starting_point') }}</span>
                  </div>
              </div>
              {{--end_point--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('end_point') }}" class="col-form-label text-right required">{{ __('End Point') }}</label>
                  <div>
                      {{ Form::text(fake_field('end_point'),  old('end_point', isset($bus) ? $bus->end_point : null), ['class'=>form_validation($errors, 'end_point'), 'id' => fake_field('end_point'),'data-cval-name' => 'The contact number field','data-cval-rules' => 'required']) }}
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
                      {{ Form::text(fake_field('departure_time'),  old('departure_time', isset($bus) ? $bus->departure_time : null), ['class'=>[form_validation($errors, 'departure_time'),'time24'], 'id' => fake_field('departure_time'),'data-cval-name' => 'The Departure Time field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('departure_time') }}">{{ $errors->first('departure_time') }}</span>
                  </div>
              </div>
              {{--arrival_time--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('arrival_time') }}" class="col-form-label text-right required">{{ __('Arrival Time') }}</label>
                  <div>
                      {{ Form::text(fake_field('arrival_time'),  old('arrival_time', isset($bus) ? $bus->arrival_time : null), ['class'=>[form_validation($errors, 'arrival_time'),'time24'], 'id' => fake_field('arrival_time'),'data-cval-name' => 'The Arrival Time field','data-cval-rules' => '']) }}
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
                      {{ Form::number(fake_field('seat_quantity'),  old('seat_quantity', isset($bus) ? $bus->seat_quantity : null), ['class'=>form_validation($errors, 'seat_quantity'), 'id' => fake_field('seat_quantity'),'data-cval-name' => 'The Seat Quantity field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('seat_quantity') }}">{{ $errors->first('seat_quantity') }}</span>
                  </div>
              </div>
              {{--price--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('price') }}" class="col-form-label text-right required">{{ __('Price') }}</label>
                  <div>
                      {{ Form::number(fake_field('price'),  old('price', isset($bus) ? $bus->price : null), ['class'=>form_validation($errors, 'price'), 'id' => fake_field('price'),'step'=>'any','data-cval-name' => 'The Price field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('price') }}">{{ $errors->first('price') }}</span>
                  </div>
              </div>
            </div>
            <div class="row">
              {{--image--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('image') }}" class="col-form-label text-right required">{{ __('Image') }}</label>
                  <div >
                      <!--  <input type="file" name="image[]" multiple class="form-control" >
                      {{ Form::file(fake_field('image'),  ['class'=>form_validation($errors, 'image'), 'id' => fake_field('image'),'multiple'=>"multiple",'data-cval-image' => 'The File field','data-cval-rules' => '']) }} -->
                      <fieldset class="form-group form-control">
                          <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                          <input type="file" id="pro-image" name="image[]" style="display: none;" class="form-control" multiple accept="image/*">
                      </fieldset>
                      <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('image') }}">{{ $errors->first('image') }}</span>
                      <div style="display:none;" id="all_remove_image_ids">

                      </div>

                      <div class="preview-images-zone" @if(sizeof($bus->image) == 0)style="display:none;"@endif>
                          @if(sizeof($bus->image)>0)
                              @foreach($bus->image as $key=>$img)
                                  <div class="preview-image preview-show-{{$key}}">
                                      <div class="image-cancel remove_image" id="{{$img->id}}" data-no="{{$key}}">x</div>
                                      <div class="image-zone"><img id="pro-img-{{$key}}" src="{{ get_bus_image($img->image_path) }}"></div>
                                      <div class="tools-edit-image"></div>
                                  </div>
                              @endforeach
                          @endif
                      </div>
                  </div>
              </div>
              {{--bus_quality--}}
              <div class="form-group mb-1 col-md-6" >
                  <label for="{{ fake_field('bus_quality') }}"
                         class="col-form-label text-right required">{{ __('Bus Quality') }}</label>
                  <div>
                      <div class="lf-select">
                      {{ Form::select(fake_field('bus_quality'), [0=>'Non Ac',1=>'Ac'], old('bus_quality', isset($bus) ? $bus->bus_quality : null),['class' => [form_validation($errors, 'bus_quality'),'select2'],'id' => fake_field('bus_quality'), 'placeholder' => __('Select Bus Quality'),'data-cval-name' => 'The Bus Quality field','placeholder'=>'Select Bus Quality','data-cval-rules' => 'required|integer']) }}
                      </div>
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('bus_quality') }}">{{ $errors->first('bus_quality') }}</span>
                  </div>
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
                    <a href="{{ route('buss.show', $bus->id) }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('buss.index') }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View All Bus') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.js') }}"></script>
    <script src="{{ asset('js/role_manager.js') }}"></script>
    @include('layouts.includes.list-js')
    <script>
        $(document).ready(function () {
            $('.roles-form').cValidate({});
            $('.remove_image').click(function(){
              var id = $(this).attr('id');
              var data = '<input type="hidden" name="remove_image[]"  value="'+id+'">';
              $('#all_remove_image_ids').append(data);
            })
        });
    </script>
@endsection
