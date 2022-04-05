@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
      <div class="row">
          <div class="offset-1 col-md-10">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left">{{ __('Edit Tour Package Information') }}</h5>
                <div class="float-right">
                    <a href="{{ route('tourPackages.index') }}"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            {{ Form::open(['route'=>['tourPackages.update',$tourPackage->id], 'method'=>'PUT','class'=> 'roles-form clearfix','files'=> true]) }}
            @basekey

            <div class="row">
              {{--package_name--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('package_name') }}" class="col-form-label text-right required">{{ __('Package Name') }}</label>
                  <div>
                      {{ Form::text(fake_field('package_name'),  old('package_name', isset($tourPackage) ? $tourPackage->package_name : null), ['class'=>form_validation($errors, 'package_name'), 'id' => fake_field('package_name'),'data-cval-name' => 'The package Name field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('package_name') }}">{{ $errors->first('package_name') }}</span>
                  </div>
              </div>
              {{--valid_till--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('valid_till') }}" class="col-form-label text-right required">{{ __('Valid Till') }}</label>
                  <div>
                      {{ Form::text(fake_field('valid_till'),  old('valid_till', isset($tourPackage) ? $tourPackage->valid_till : null), ['class'=>[form_validation($errors, 'valid_till'),'datepicker'], 'id' => fake_field('valid_till'),'data-cval-name' => 'The contact number field','data-cval-rules' => '']) }}
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
                      {{ Form::number(fake_field('package_cost'),  old('package_cost', isset($tourPackage) ? $tourPackage->package_cost : null), ['class'=>form_validation($errors, 'package_cost'),'step'=>'any', 'id' => fake_field('package_cost'),'data-cval-name' => 'The package Cost field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('package_cost') }}">{{ $errors->first('package_cost') }}</span>
                  </div>
              </div>
              {{--discount--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('discount') }}" class="col-form-label text-right required">{{ __('Discount') }}</label>
                  <div>
                      {{ Form::text(fake_field('discount'),  old('discount', isset($tourPackage) ? $tourPackage->discount : null), ['class'=>[form_validation($errors, 'discount')],'step'=>'any', 'id' => fake_field('discount'),'data-cval-name' => 'The Discount field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('discount') }}">{{ $errors->first('discount') }}</span>
                  </div>
              </div>
            </div>
            {{--details--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('details') }}" class="col-form-label text-right">{{ __('Description') }}</label>
                <div>
                    {{ Form::textarea(fake_field('details'), old('details', isset($tourPackage) ? $tourPackage->details : null), ['class'=>[form_validation($errors, 'details'),'textarea'], 'id' => fake_field('details'), 'rows'=>2,'data-cval-name' => 'The details field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('details') }}">{{ $errors->first('details') }}</span>
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

                      <div class="preview-images-zone" @if(sizeof($tourPackage->image) == 0)style="display:none;"@endif>
                          @if(sizeof($tourPackage->image)>0)
                              @foreach($tourPackage->image as $key=>$img)
                                  <div class="preview-image preview-show-{{$key}}">
                                      <div class="image-cancel remove_image" id="{{$img->id}}" data-no="{{$key}}">x</div>
                                      <div class="image-zone"><img id="pro-img-{{$key}}" src="{{ get_tour_package_image($img->image_path) }}"></div>
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
                    <a href="{{ route('tourPackages.show', $tourPackage->id) }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('tourPackages.index') }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View All Tour Package') }}</a>
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
