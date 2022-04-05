@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
      <div class="row">
          <div class="offset-1 col-md-10">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left">{{ __('Edit Room Information') }}</h5>
                <div class="float-right">
                    <a href="{{ route('rooms.index') }}"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            {{ Form::open(['route'=>['rooms.update',$room->id], 'method'=>'PUT','class'=> 'roles-form clearfix','files'=> true]) }}
            @basekey

            <div class="row">
              {{--hotel--}}
              <div class="form-group mb-1 col-md-6" >
                  <label for="{{ fake_field('hotel_id') }}"
                         class="col-form-label text-right required">{{ __('Hotel') }}</label>
                  <div>
                      <div class="lf-select">
                      {{ Form::select(fake_field('hotel_id'), $hotels, old('hotel_id', isset($room) ? $room->hotel_id : null),['class' => [form_validation($errors, 'hotel_id'),'select2'],'id' => fake_field('hotel_id'), 'placeholder' => __('Select Hotel'),'data-cval-name' => 'The Hotel field','placeholder'=>'Select Hotel','data-cval-rules' => 'required|integer']) }}
                      </div>
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('hotel_id') }}">{{ $errors->first('hotel_id') }}</span>
                  </div>
              </div>
              {{--room_name--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('room_name') }}" class="col-form-label text-right required">{{ __('Room Name') }}</label>
                  <div>
                      {{ Form::text(fake_field('room_name'),  old('room_name', isset($room) ? $room->room_name : null), ['class'=>form_validation($errors, 'name'), 'id' => fake_field('room_name'),'data-cval-name' => 'The room name field','data-cval-rules' => 'required']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('room_name') }}">{{ $errors->first('room_name') }}</span>
                  </div>
              </div>

            </div>

            {{--room_details--}}
            <div class="form-group mb-1">
                <label for="{{ fake_field('room_details') }}" class="col-form-label text-right">{{ __('Room Details') }}</label>
                <div>
                    {{ Form::textarea(fake_field('room_details'), old('room_details', isset($room) ? $room->room_details : null), ['class'=>[form_validation($errors, 'room_details'),'textarea'], 'id' => fake_field('room_details'), 'rows'=>2,'data-cval-name' => 'The room_details field','data-cval-rules' => 'escapeInput']) }}
                    <span class="invalid-feedback cval-error"
                          data-cval-error="{{ fake_field('room_details') }}">{{ $errors->first('room_details') }}</span>
                </div>
            </div>
            <div class="row">
              {{--floor--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('floor') }}" class="col-form-label text-right required">{{ __('Floor') }}</label>
                  <div>
                      {{ Form::number(fake_field('floor'),  old('floor', isset($room) ? $room->floor : null), ['class'=>form_validation($errors, 'floor'), 'id' => fake_field('floor'),'data-cval-name' => 'The Floor field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('floor') }}">{{ $errors->first('floor') }}</span>
                  </div>
              </div>
              {{--quantity--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('quantity') }}" class="col-form-label text-right required">{{ __('Quantity') }}</label>
                  <div>
                      {{ Form::number(fake_field('quantity'),  old('quantity', isset($room) ? $room->quantity : null), ['class'=>form_validation($errors, 'quantity'), 'id' => fake_field('quantity'),'data-cval-name' => 'The Hotel Category field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('quantity') }}">{{ $errors->first('quantity') }}</span>
                  </div>
              </div>
            </div>
            <div class="row">
              {{--room_rent_adult--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('room_rent_adult') }}" class="col-form-label text-right required">{{ __('Room Rent Adult') }}</label>
                  <div>
                      {{ Form::number(fake_field('room_rent_adult'),  old('room_rent_adult', isset($room) ? $room->room_rent_adult : null), ['class'=>form_validation($errors, 'room_rent_adult'), 'id' => fake_field('room_rent_adult'),'step'=>'any','data-cval-name' => 'The Room Rent Adult field','data-cval-rules' => 'required|numaric']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('room_rent_adult') }}">{{ $errors->first('room_rent_adult') }}</span>
                  </div>
              </div>
              {{--discount_rent_adult--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('discount_rent_adult') }}" class="col-form-label text-right required">{{ __('Discount Rent Adult') }}</label>
                  <div>
                      {{ Form::number(fake_field('discount_rent_adult'),  old('discount_rent_adult', isset($room) ? $room->discount_rent_adult : null), ['class'=>form_validation($errors, 'discount_rent_adult'), 'id' => fake_field('discount_rent_adult'),'step'=>'any','data-cval-name' => 'The Discount Rent Adult field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('discount_rent_adult') }}">{{ $errors->first('discount_rent_adult') }}</span>
                  </div>
              </div>
            </div>
            <div class="row">
              {{--room_rent_child--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('room_rent_child') }}" class="col-form-label text-right required">{{ __('Room Rent Child') }}</label>
                  <div>
                      {{ Form::number(fake_field('room_rent_child'),  old('room_rent_child', isset($room) ? $room->room_rent_child : null), ['class'=>form_validation($errors, 'room_rent_child'), 'id' => fake_field('room_rent_child'),'step'=>'any','data-cval-name' => 'The Room Rent Child field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('room_rent_child') }}">{{ $errors->first('room_rent_child') }}</span>
                  </div>
              </div>
              {{--discount_rent_child--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('discount_rent_child') }}" class="col-form-label text-right required">{{ __('Discount Rent Child') }}</label>
                  <div>
                      {{ Form::number(fake_field('discount_rent_child'),  old('discount_rent_child', isset($room) ? $room->discount_rent_child : null), ['class'=>form_validation($errors, 'discount_rent_child'), 'id' => fake_field('discount_rent_child'),'step'=>'any','data-cval-name' => 'The Discount Rent Child field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('discount_rent_child') }}">{{ $errors->first('discount_rent_child') }}</span>
                  </div>
              </div>
            </div>
            @php
            $keywords = [];
            if(sizeof($room->keywords)>0){
              $keywords = $room->keywords->pluck('keyword')->toArray();
              //dd($keywords);
            }
            @endphp
            <div class="row">
              <div class="form-group mb-1 col-md-12">
                <label class="col-form-label text-right required">Room facilites</label>
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="room_facilities1" name="room_facilities[]" type="checkbox" value="Bathroom" @if(in_array('Bathroom',$keywords)) checked @endif>
                            <label class="" for="room_facilities1">Bathroom</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="room_facilities2" name="room_facilities[]" type="checkbox" value="Cable TV" @if(in_array('Cable TV',$keywords)) checked @endif>
                            <label class="" for="room_facilities2">Cable TV</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="room_facilities3" name="room_facilities[]" type="checkbox" value="Air conditioning" @if(in_array('Air conditioning',$keywords)) checked @endif>
                            <label class="" for="room_facilities3">Air conditioning</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="room_facilities4" name="room_facilities[]" type="checkbox" value="Mini bar" @if(in_array('Mini bar',$keywords)) checked @endif>
                            <label class="" for="room_facilities4">Mini bar</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="room_facilities5" name="room_facilities[]" type="checkbox" value="WiFi" @if(in_array('WiFi',$keywords)) checked @endif>
                            <label class="" for="room_facilities5">WiFi</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="room_facilities6" name="room_facilities[]" type="checkbox" value="Wheelchair - friendly room" @if(in_array('Wheelchair - friendly room',$keywords)) checked @endif>
                            <label class="" for="room_facilities6">Wheelchair - friendly room</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="room_facilities7" name="room_facilities[]" type="checkbox" value="Pay TV" @if(in_array('Pay TV',$keywords)) checked @endif>
                            <label class="" for="room_facilities7">Pay TV</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="room_facilities8" name="room_facilities[]" type="checkbox" value="Desk" @if(in_array('Desk',$keywords)) checked @endif>
                            <label class="" for="room_facilities8">Desk</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="room_facilities9" name="room_facilities[]" type="checkbox" value="Room safe" @if(in_array('Room safe',$keywords)) checked @endif>
                            <label class="" for="room_facilities9">Room safe</label>
                      </div>
                  </div>

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

                      <div class="preview-images-zone" @if(sizeof($room->image) == 0)style="display:none;"@endif>
                          @if(sizeof($room->image)>0)
                              @foreach($room->image as $key=>$img)
                                  <div class="preview-image preview-show-{{$key}}">
                                      <div class="image-cancel remove_image" id="{{$img->id}}" data-no="{{$key}}">x</div>
                                      <div class="image-zone"><img id="pro-img-{{$key}}" src="{{ get_room_image($img->image_path) }}"></div>
                                      <div class="tools-edit-image"></div>
                                  </div>
                              @endforeach
                          @endif
                      </div>
                  </div>
              </div>
              {{--person_quantity--}}
              <div class="form-group mb-1 col-md-6">
                  <label for="{{ fake_field('person_quantity') }}" class="col-form-label text-right required">{{ __('Person Quantity') }}</label>
                  <div>
                      {{ Form::number(fake_field('person_quantity'),  old('person_quantity', isset($room) ? $room->person_quantity : null), ['class'=>form_validation($errors, 'person_quantity'), 'id' => fake_field('person_quantity'),'data-cval-name' => 'The Person Quantity field','data-cval-rules' => '']) }}
                      <span class="invalid-feedback cval-error"
                            data-cval-error="{{ fake_field('person_quantity') }}">{{ $errors->first('person_quantity') }}</span>
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
                    <a href="{{ route('rooms.show', $room->id) }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('rooms.index') }}"
                       class="btn btn-sm btn-info btn-sm-block">{{ __('View All Room') }}</a>
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
