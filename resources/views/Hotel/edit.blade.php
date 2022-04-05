@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
      <div class="row">
          <div class="offset-1 col-md-10">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left">{{ __('Edit Hotel Information') }}</h5>
                <div class="float-right">
                    <a href="{{ route('hotels.index') }}"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            {{ Form::open(['route'=>['hotels.update',$hotel->id], 'method'=>'PUT','class'=> 'roles-form clearfix','files'=> true]) }}
            @basekey

            <div class="row">
              {{--name--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('name') }}" class="col-form-label text-right required">{{ __('Hotel Name') }}</label>
                  <div>
                      {{ Form::text(fake_field('name'),  old('name', isset($hotel) ? $hotel->name : null), ['class'=>form_validation($errors, 'name'), 'id' => fake_field('name'),'data-cval-name' => 'The name field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('name') }}">{{ $errors->first('name') }}</span>
                  </div>
              </div>
              {{--contact_number--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('contact_number') }}" class="col-form-label text-right required">{{ __('Contact Number') }}</label>
                  <div>
                      {{ Form::text(fake_field('contact_number'),  old('contact_number', isset($hotel) ? $hotel->contact_number : null), ['class'=>form_validation($errors, 'contact_number'), 'id' => fake_field('contact_number'),'data-cval-name' => 'The contact number field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('contact_number') }}">{{ $errors->first('contact_number') }}</span>
                  </div>
              </div>
            </div>
            <div class="row">
              {{--vendor--}}
              <div class="form-group mb-1 col-md-6" >
                  <label for="{{ fake_field('user_id') }}"
                         class="col-form-label text-right required">{{ __('Vendor') }}</label>
                  <div>
                      <div class="lf-select">
                      {{ Form::select(fake_field('user_id'), $vendor_list, old('user_id', isset($hotel) ? $hotel->user_id : null),['class' => [form_validation($errors, 'user_id'),'select2'],'id' => fake_field('user_id'), 'placeholder' => __('Select Vendor'),'data-cval-name' => 'The Vendor field','placeholder'=>'Select Vendor','data-cval-rules' => 'required|integer']) }}
                      </div>
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('user_id') }}">{{ $errors->first('user_id') }}</span>
                  </div>
              </div>


              {{--area--}}
              <div class="form-group mb-1 col-md-6" >
                  <label for="{{ fake_field('area_id') }}"
                         class="col-form-label text-right required">{{ __('Area') }}</label>
                  <div>
                      <div class="lf-select">
                      {{ Form::select(fake_field('area_id'), $areas, old('area_id', isset($hotel) ? $hotel->area_id : null),['class' => [form_validation($errors, 'area_id'),'select2'],'id' => fake_field('area_id'), 'placeholder' => __('Select Area'),'data-cval-name' => 'The Area field','placeholder'=>'Select Area','data-cval-rules' => 'required|integer']) }}
                      </div>
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('area_id') }}">{{ $errors->first('area_id') }}</span>
                  </div>
              </div>
            </div>
            <div class="row">
              {{--agent_id--}}
              <div class="form-group mb-1 col-md-6" >
                  <label for="{{ fake_field('agent_id') }}"
                         class="col-form-label text-right required">{{ __('Agent') }}</label>
                  <div>
                      <div class="lf-select">
                      {{ Form::select(fake_field('agent_id'), $agent_list, old('agent_id', isset($hotel) ? $hotel->area_id : null),['class' => [form_validation($errors, 'agent_id'),'select2','agent_id'],'id' => fake_field('agent_id'), 'placeholder' => __('Select Vendor'),'data-cval-name' => 'The Agent field','placeholder'=>'Select Agent','data-cval-rules' => 'required|integer']) }}
                      </div>
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('agent_id') }}">{{ $errors->first('agent_id') }}</span>
                  </div>
              </div>
              {{--hotel_category--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('hotel_category') }}" class="col-form-label text-right required">{{ __('Hotel Category') }}</label>
                  <div>
                      {{ Form::number(fake_field('hotel_category'),  old('hotel_category', isset($hotel) ? $hotel->hotel_category : null), ['class'=>form_validation($errors, 'hotel_category'), 'id' => fake_field('hotel_category'),'data-cval-name' => 'The Hotel Category field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('hotel_category') }}">{{ $errors->first('hotel_category') }}</span>
                  </div>
              </div>
            </div>
            <div class="row">
              {{--vendor_commision--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('vendor_commision') }}" class="col-form-label text-right required">{{ __('Vendor Commision:(%)') }}</label>
                  <div>
                      {{ Form::number(fake_field('vendor_commision'),  old('vendor_commision', isset($hotel) ? $hotel->vendor_commision : null), ['class'=>form_validation($errors, 'vendor_commision'),'step'=>'any', 'id' => fake_field('vendor_commision'),'data-cval-name' => 'The Vendor Commision field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('vendor_commision') }}">{{ $errors->first('vendor_commision') }}</span>
                  </div>
              </div>
              {{--agent_commision--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('agent_commision') }}" class="col-form-label text-right required">{{ __('Agent Commision:(%)') }}</label>
                  <div>
                      {{ Form::number(fake_field('agent_commision'),  old('agent_commision', isset($hotel) ? $hotel->agent_commision : null), ['class'=>form_validation($errors, 'agent_commision'),'step'=>'any', 'id' => fake_field('agent_commision'),'data-cval-name' => 'The Agent Commision field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('agent_commision') }}">{{ $errors->first('agent_commision') }}</span>
                  </div>
              </div>
            </div>
            {{--description--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('description') }}" class="col-form-label text-right">{{ __('Description') }}</label>
                <div>
                    {{ Form::textarea(fake_field('description'), old('description', isset($hotel) ? $hotel->description : null), ['class'=>[form_validation($errors, 'description'),'textarea'], 'id' => fake_field('description'), 'rows'=>2,'data-cval-name' => 'The description field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('description') }}">{{ $errors->first('description') }}</span>
                </div>
            </div>
            {{--address--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('address') }}" class="col-form-label text-right">{{ __('Address') }}</label>
                <div>
                    {{ Form::textarea(fake_field('address'), old('address', isset($hotel) ? $hotel->address : null), ['class'=>[form_validation($errors, 'address'),'textarea'], 'id' => fake_field('address'), 'rows'=>2,'data-cval-name' => 'The address field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('address') }}">{{ $errors->first('address') }}</span>
                </div>
            </div>
            {{--features--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('features') }}" class="col-form-label text-right">{{ __('Features') }}</label>
                <div>
                    {{ Form::textarea(fake_field('features'), old('features', isset($hotel) ? $hotel->features : null), ['class'=>[form_validation($errors, 'features'),'textarea'], 'id' => fake_field('features'), 'rows'=>2,'data-cval-name' => 'The features field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('features') }}">{{ $errors->first('features') }}</span>
                </div>
            </div>
            @php
            $keywords = [];
            if(sizeof($hotel->keywords)>0){
              $keywords = $hotel->keywords->pluck('keyword')->toArray();
              //dd($keywords);
            }
            @endphp
            <div class="row">
              <div class="form-group mb-1 col-md-12">
                <label class="col-form-label text-right required">Hotel facilites</label>
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords1" name="hotel_keywords[]" type="checkbox" value="Wi-Fi" @if(in_array('Wi-Fi',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords1">Wi-Fi</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords2" name="hotel_keywords[]" type="checkbox" value="Parking" @if(in_array('Parking',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords2">Parking</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords3" name="hotel_keywords[]" type="checkbox" value="Airport Shuttle" @if(in_array('Airport Shuttle',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords3">Airport Shuttle</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords4" name="hotel_keywords[]" type="checkbox" value="Meeting / Banquet Facilities" @if(in_array('Meeting / Banquet Facilities',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords4">Meeting / Banquet Facilities</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords5" name="hotel_keywords[]" type="checkbox" value="Swimming pool" @if(in_array('Swimming pool',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords5">Swimming pool</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords6" name="hotel_keywords[]" type="checkbox" value="Restaurant" @if(in_array('Restaurant',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords6">Restaurant</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords7" name="hotel_keywords[]" type="checkbox" value="Fitness Centre" @if(in_array('Fitness Centre',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords7">Fitness Centre</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords8" name="hotel_keywords[]" type="checkbox" value="SPA & Wellness Centre" @if(in_array('SPA & Wellness Centre',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords8">SPA & Wellness Centre</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords9" name="hotel_keywords[]" type="checkbox" value="Pets allowed" @if(in_array('Pets allowed',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords9">Pets allowed</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords10" name="hotel_keywords[]" type="checkbox" value="Lift" @if(in_array('Lift',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords10">Lift</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords11" name="hotel_keywords[]" type="checkbox" value="Air condition" @if(in_array('Air condition',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords11">Air condition</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords12" name="hotel_keywords[]" type="checkbox" value="Family rooms" @if(in_array('Family rooms',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords12">Family rooms</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords13" name="hotel_keywords[]" type="checkbox" value="Non - smoking rooms" @if(in_array('Non - smoking rooms',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords13">Non - smoking rooms</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords14" name="hotel_keywords[]" type="checkbox" value="Rooms/facilities for disabled guests" @if(in_array('Rooms/facilities for disabled guests',$keywords)) checked @endif>
                            <label class="" for="hotel_keywords14">Rooms/facilities for disabled guests</label>
                      </div>
                  </div>
                </div>
            </div>
            </div>
            <div class="row">
              {{--image--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('image') }}" class="col-form-label text-right required">{{ __('Hotel Image') }}</label>
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

                      <div class="preview-images-zone" @if(sizeof($hotel->image) == 0)style="display:none;"@endif>
                          @if(sizeof($hotel->image)>0)
                              @foreach($hotel->image as $key=>$img)
                                  <div class="preview-image preview-show-{{$key}}">
                                      <div class="image-cancel remove_image" id="{{$img->id}}" data-no="{{$key}}">x</div>
                                      <div class="image-zone"><img id="pro-img-{{$key}}" src="{{ get_hotel_image($img->image_path) }}"></div>
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

                    {{ Form::submit(__('Update Information'),['class'=>'btn btn-info btn-sm btn-left ']) }}


            </div>
            {{ Form::close() }}
          </div>
      </div>
        <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('hotels.show', $hotel->id) }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('hotels.index') }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View All Hotel') }}</a>
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
            });
            $("#{{ fake_field('area_id') }}").change(function(){
                var area_id = $(this).val();
                if(area_id)
                {
                    $.ajax({
                        url : '/hotels/getAgent/' +area_id,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                        //console.log(data);
                        $("#{{ fake_field('agent_id') }}").empty();
                        jQuery.each(data, function(key,value){
                            $("#{{ fake_field('agent_id') }}").append('<option value="'+ value['user_id'] +'">'+ value['first_name'] +' '+ value['last_name'] +'</option>');
                        });
                        }
                    });
                }
                else
                {
                    $("#{{ fake_field('agent_id') }}").empty();
                }
            });
        });
    </script>
@endsection
