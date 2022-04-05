@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
      <div class="row">
          <div class="col-md-12">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left">{{ __('Edit Slider Information') }}</h5>
                <div class="float-right">
                    <a href="{{ route('sliders.index') }}"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            {{ Form::open(['route'=>['sliders.update',$slider->id], 'method'=>'PUT','class'=> 'roles-form clearfix','files'=> true]) }}
            @basekey
              {{--title--}}
              <div class="form-group mb-1 ">
                  <label for="{{ fake_field('title') }}" class="col-form-label text-right required">{{ __('Title') }}</label>
                  <div>
                      {{ Form::text(fake_field('title'),  old('title', isset($slider) ? $slider->title : null), ['class'=>form_validation($errors, 'title'), 'id' => fake_field('title'),'data-cval-name' => 'The Title field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('title') }}">{{ $errors->first('title') }}</span>
                  </div>
              </div>

            {{--details--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('details') }}" class="col-form-label text-right">{{ __('Details') }}</label>
                <div>
                    {{ Form::textarea(fake_field('details'), old('details', isset($slider) ? $slider->details : null), ['class'=>[form_validation($errors, 'details'),'textarea'], 'id' => fake_field('details'), 'rows'=>2,'data-cval-name' => 'The details field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('details') }}">{{ $errors->first('details') }}</span>
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
                          <input type="file" id="pro-image" name="image" style="display: none;" class="form-control" accept="image/*">
                      </fieldset>
                      <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('image') }}">{{ $errors->first('image') }}</span>

                      <div class="preview-images-zone" @if(!$slider->image)style="display:none;"@endif>
                          <div class="preview-image preview-show-{{$slider->id}}">
                              <div class="image-cancel remove_image" id="{{$slider->id}}" data-no="{{$slider->id}}">x</div>
                              <div class="image-zone"><img id="pro-img-{{$slider->id}}" src="{{ get_slider_image($slider->image) }}"></div>
                              <div class="tools-edit-image"></div>
                          </div>
                      </div>
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
                    <a href="{{ route('sliders.show', $slider->id) }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('sliders.index') }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View All Venue') }}</a>
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
