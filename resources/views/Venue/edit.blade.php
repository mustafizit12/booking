@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
      <div class="row">
          <div class="offset-1 col-md-10">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left">{{ __('Edit Hotel Information') }}</h5>
                <div class="float-right">
                    <a href="{{ route('venues.index') }}"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            {{ Form::open(['route'=>['venues.update',$venue->id], 'method'=>'PUT','class'=> 'roles-form clearfix','files'=> true]) }}
            @basekey

            <div class="row">
              {{--area--}}
              <div class="form-group mb-1 col-md-6" >
                  <label for="{{ fake_field('area_id') }}"
                         class="col-form-label text-right required">{{ __('Area') }}</label>
                  <div>
                      <div class="lf-select">
                      {{ Form::select(fake_field('area_id'), $areas, old('area_id', isset($venue) ? $venue->area_id : null),['class' => [form_validation($errors, 'area_id'),'select2'],'id' => fake_field('area_id'), 'placeholder' => __('Select Area'),'data-cval-name' => 'The Area field','placeholder'=>'Select Area','data-cval-rules' => 'required|integer']) }}
                      </div>
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('area_id') }}">{{ $errors->first('area_id') }}</span>
                  </div>
              </div>
              {{--venue_name--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('venue_name') }}" class="col-form-label text-right required">{{ __('Venue Name') }}</label>
                  <div>
                      {{ Form::text(fake_field('venue_name'),  old('venue_name', isset($venue) ? $venue->venue_name : null), ['class'=>form_validation($errors, 'venue_name'), 'id' => fake_field('venue_name'),'data-cval-name' => 'The venue name field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('venue_name') }}">{{ $errors->first('venue_name') }}</span>
                  </div>
              </div>

            </div>
            <div class="row">
              {{--rent--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('rent') }}" class="col-form-label text-right required">{{ __('Rent') }}</label>
                  <div>
                      {{ Form::number(fake_field('rent'),  old('rent', isset($venue) ? $venue->rent : null), ['class'=>form_validation($errors, 'rent'),'step'=>'any', 'id' => fake_field('rent'),'data-cval-name' => 'The Rent field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('rent') }}">{{ $errors->first('rent') }}</span>
                  </div>
              </div>
              {{--discount--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('discount') }}" class="col-form-label text-right required">{{ __('Discount') }}</label>
                  <div>
                      {{ Form::number(fake_field('discount'),  old('discount', isset($venue) ? $venue->discount : null), ['class'=>form_validation($errors, 'discount'),'step'=>'any', 'id' => fake_field('discount'),'data-cval-name' => 'The Discount field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('discount') }}">{{ $errors->first('discount') }}</span>
                  </div>
              </div>
            </div>
            {{--description--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('description') }}" class="col-form-label text-right">{{ __('Description') }}</label>
                <div>
                    {{ Form::textarea(fake_field('description'), old('description', isset($venue) ? $venue->description : null), ['class'=>[form_validation($errors, 'description'),'textarea'], 'id' => fake_field('description'), 'rows'=>2,'data-cval-name' => 'The description field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('description') }}">{{ $errors->first('description') }}</span>
                </div>
            </div>
            {{--address--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('address') }}" class="col-form-label text-right">{{ __('Address') }}</label>
                <div>
                    {{ Form::textarea(fake_field('address'), old('address', isset($venue) ? $venue->address : null), ['class'=>[form_validation($errors, 'address'),'textarea'], 'id' => fake_field('address'), 'rows'=>2,'data-cval-name' => 'The address field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('address') }}">{{ $errors->first('address') }}</span>
                </div>
            </div>
            {{--features--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('features') }}" class="col-form-label text-right">{{ __('Features') }}</label>
                <div>
                    {{ Form::textarea(fake_field('features'), old('features', isset($venue) ? $venue->features : null), ['class'=>[form_validation($errors, 'features'),'textarea'], 'id' => fake_field('features'), 'rows'=>2,'data-cval-name' => 'The features field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('features') }}">{{ $errors->first('features') }}</span>
                </div>
            </div>
            <div class="row">
              {{--image--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('image') }}" class="col-form-label text-right required">{{ __('Venue Image') }}</label>
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

                      <div class="preview-images-zone" @if(sizeof($venue->image) == 0)style="display:none;"@endif>
                          @if(sizeof($venue->image)>0)
                              @foreach($venue->image as $key=>$img)
                                  <div class="preview-image preview-show-{{$key}}">
                                      <div class="image-cancel remove_image" id="{{$img->id}}" data-no="{{$key}}">x</div>
                                      <div class="image-zone"><img id="pro-img-{{$key}}" src="{{ get_venue_image($img->image_path) }}"></div>
                                      <div class="tools-edit-image"></div>
                                  </div>
                              @endforeach
                          @endif
                      </div>
                  </div>
              </div>
              {{--contact_info--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('contact_info') }}" class="col-form-label text-right required">{{ __('Contact Info') }}</label>
                  <div>
                      {{ Form::text(fake_field('contact_info'),  old('contact_info', isset($venue) ? $venue->contact_info : null), ['class'=>form_validation($errors, 'contact_info'), 'id' => fake_field('contact_info'),'data-cval-name' => 'The contact number field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('contact_info') }}">{{ $errors->first('contact_info') }}</span>
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
                    <a href="{{ route('venues.show', $venue->id) }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('venues.index') }}"
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
            $('.remove_image').click(function(){
              var id = $(this).attr('id');
              var data = '<input type="hidden" name="remove_image[]"  value="'+id+'">';
              $('#all_remove_image_ids').append(data);
            })
        });
    </script>
@endsection
