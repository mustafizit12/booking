@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3">
                    <h5 class="float-left">{{ view_html(__('Basic Details of :room', ['room' => '<strong>' . $room->room_name . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('rooms.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    @component('components.table', ['type' => 'striped borderless'])
                        <tr>
                            <th>{{ __('Hotel') }}</th>
                            <td>{{ $room->hotel->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Room Name') }}</th>
                            <td>{{ $room->room_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Room Details') }}</th>
                            <td>{!! $room->room_details !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Floor') }}</th>
                            <td>{!! $room->floor !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Quantity') }}</th>
                            <td>{!! $room->quantity !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Room Rent Adult') }}</th>
                            <td>{!! $room->room_rent_adult !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Discount Rent Adult') }}</th>
                            <td>{{ $room->discount_rent_adult }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Room Rent Child') }}</th>
                            <td>{{ $room->room_rent_child }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Discount Rent Child') }}</th>
                            <td>{{ $room->discount_rent_child }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Person Quantity') }}</th>
                            <td>{{ $room->person_quantity }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Created By') }}</th>
                            <td>{{ $room->createdBy->profile->full_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Room Image') }}</th>
                            <td>
                              @if(sizeof($room->image)>0)
                              @foreach($room->image as $key=>$value)
                              <a href="{{get_room_image($value->image_path)}}" target="_blank"><img src="{{get_room_image($value->image_path)}}" style="width:90px" alt=""></a>
                              @endforeach
                              @endif
                            </td>
                        </tr>
                    @endcomponent
                </div>
                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('rooms.edit', $room->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Information') }}</a>

                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('rooms.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Area') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
