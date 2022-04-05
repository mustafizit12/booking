@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
      <div class="row">
          <div class="offset-1 col-md-10">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left">{{ __('Edit Rent Car Information') }}</h5>
                <div class="float-right">
                    <a href="{{ route('rentCars.index') }}"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            {{ Form::open(['route'=>['rentCars.update',$rentCars->id], 'method'=>'PUT','class'=> 'roles-form clearfix','files'=> true]) }}
            @basekey
            <div class="row">
              {{--owner_name--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('owner_name') }}" class="col-form-label text-right required">{{ __('Rent Car Name') }}</label>
                  <div>
                      {{ Form::text(fake_field('owner_name'),  old('owner_name', isset($rentCars) ? $rentCars->owner_name : null), ['class'=>form_validation($errors, 'owner_name'), 'id' => fake_field('owner_name'),'data-cval-name' => 'The owner name field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('owner_name') }}">{{ $errors->first('owner_name') }}</span>
                  </div>
              </div>
              {{--car_model--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('car_model') }}" class="col-form-label text-right required">{{ __('Car Model') }}</label>
                  <div>
                      {{ Form::text(fake_field('car_model'),  old('car_model', isset($rentCars) ? $rentCars->car_model : null), ['class'=>form_validation($errors, 'car_model'), 'id' => fake_field('car_model'),'data-cval-name' => 'The Car Model field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('car_model') }}">{{ $errors->first('car_model') }}</span>
                  </div>
              </div>
            </div>
            {{--owner_address--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('owner_address') }}" class="col-form-label text-right">{{ __('Owner Address') }}</label>
                <div>
                    {{ Form::textarea(fake_field('owner_address'), old('owner_address', isset($rentCars) ? $rentCars->owner_address : null), ['class'=>[form_validation($errors, 'owner_address'),'textarea'], 'id' => fake_field('owner_address'), 'rows'=>2,'data-cval-name' => 'The owner_address field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('owner_address') }}">{{ $errors->first('owner_address') }}</span>
                </div>
            </div>
            {{--description--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('description') }}" class="col-form-label text-right">{{ __('Description') }}</label>
                <div>
                    {{ Form::textarea(fake_field('description'), old('description', isset($rentCars) ? $rentCars->description : null), ['class'=>[form_validation($errors, 'description'),'textarea'], 'id' => fake_field('description'), 'rows'=>2,'data-cval-name' => 'The description field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('description') }}">{{ $errors->first('description') }}</span>
                </div>
            </div>


            <div class="row">
              {{--image--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('image') }}" class="col-form-label text-right required">{{ __('Banner Image') }}</label>
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

                      <div class="preview-images-zone" @if(sizeof($rentCars->image) == 0)style="display:none;"@endif>
                          @if(sizeof($rentCars->image)>0)
                              @foreach($rentCars->image as $key=>$img)
                                  <div class="preview-image preview-show-{{$key}}">
                                      <div class="image-cancel remove_image" id="{{$img->id}}" data-no="{{$key}}">x</div>
                                      <div class="image-zone"><img id="pro-img-{{$key}}" src="{{ get_rent_car_image($img->image_path) }}"></div>
                                      <div class="tools-edit-image"></div>
                                  </div>
                              @endforeach
                          @endif
                      </div>
                  </div>
              </div>
              {{--owner_contact--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('owner_contact') }}" class="col-form-label text-right required">{{ __('Owner Contact') }}</label>
                  <div>
                      {{ Form::text(fake_field('owner_contact'),  old('owner_contact', isset($rentCars) ? $rentCars->owner_contact : null), ['class'=>form_validation($errors, 'owner_contact'), 'id' => fake_field('owner_contact'),'data-cval-name' => 'The Owner Contact field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('owner_contact') }}">{{ $errors->first('owner_contact') }}</span>
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
                    <a href="{{ route('rentCars.show', $rentCars->id) }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('rentCars.index') }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View All Rent Car') }}</a>
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
            $('.remove_image').click(function(){
              var id = $(this).attr('id');
              var data = '<input type="hidden" name="remove_image[]"  value="'+id+'">';
              $('#all_remove_image_ids').append(data);
            })
        });
    </script>
@endsection
