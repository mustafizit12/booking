@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
      <div class="row">
          <div class="offset-1 col-md-10">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left">{{ __('Edit Visa Information') }}</h5>
                <div class="float-right">
                    <a href="{{ route('visas.index') }}"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            {{ Form::open(['route'=>['visas.update',$visa->id], 'method'=>'PUT','class'=> 'roles-form clearfix','files'=> true]) }}
            @basekey

            <div class="row">
              {{--title--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('title') }}" class="col-form-label text-right required">{{ __('Title') }}</label>
                  <div>
                      {{ Form::text(fake_field('title'),  old('title', isset($visa) ? $visa->title : null), ['class'=>form_validation($errors, 'title'), 'id' => fake_field('title'),'data-cval-name' => 'The title field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('title') }}">{{ $errors->first('title') }}</span>
                  </div>
              </div>
              {{--visa_country--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('visa_country') }}" class="col-form-label text-right required">{{ __('Visa Country') }}</label>
                  <div>
                      {{ Form::text(fake_field('visa_country'),  old('visa_country', isset($visa) ? $visa->visa_country : null), ['class'=>form_validation($errors, 'visa_country'), 'id' => fake_field('visa_country'),'data-cval-name' => 'The contact number field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('visa_country') }}">{{ $errors->first('visa_country') }}</span>
                  </div>
              </div>
            </div>
            <div class="row">
              {{--cost--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('cost') }}" class="col-form-label text-right required">{{ __('Cost') }}</label>
                  <div>
                      {{ Form::number(fake_field('cost'),  old('cost', isset($visa) ? $visa->cost : null), ['class'=>form_validation($errors, 'cost'),'step'=>'any', 'id' => fake_field('cost'),'data-cval-name' => 'The Visa cost field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('cost') }}">{{ $errors->first('cost') }}</span>
                  </div>
              </div>
              {{--visa_duration--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('visa_duration') }}" class="col-form-label text-right required">{{ __('Visa Duration') }}</label>
                  <div>
                      {{ Form::text(fake_field('visa_duration'),  old('visa_duration', isset($visa) ? $visa->visa_duration : null), ['class'=>form_validation($errors, 'visa_duration'), 'id' => fake_field('visa_duration'),'data-cval-name' => 'The visa duration field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('visa_duration') }}">{{ $errors->first('visa_duration') }}</span>
                  </div>
              </div>
            </div>
            {{--details--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('details') }}" class="col-form-label text-right">{{ __('Details') }}</label>
                <div>
                    {{ Form::textarea(fake_field('details'), old('details', isset($visa) ? $visa->details : null), ['class'=>[form_validation($errors, 'details'),'textarea'], 'id' => fake_field('details'), 'rows'=>2,'data-cval-name' => 'The details field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('details') }}">{{ $errors->first('details') }}</span>
                </div>
            </div>

            <div class="row">
              {{--image--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('image') }}" class="col-form-label text-right required">{{ __('Visa Image') }}</label>
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

                      <div class="preview-images-zone" @if(sizeof(explode(',',$visa->image)) == 0)style="display:none;"@endif>
                          @if(sizeof(explode(',',$visa->image))>0)
                              @foreach(explode(',',$visa->image) as $key=>$img)
                                  <div class="preview-image preview-show-{{$key}}">
                                      <div class="image-cancel remove_image" id="{{$key}}" data-no="{{$key}}">x</div>
                                      <div class="image-zone"><img id="pro-img-{{$key}}" src="{{ get_visa_image($img) }}"></div>
                                      <div class="tools-edit-image"></div>
                                  </div>
                              @endforeach
                          @endif
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
                    <a href="{{ route('visas.show', $visa->id) }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('visas.index') }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View All Visa') }}</a>
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
