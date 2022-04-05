@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3">
                    <h5 class="float-left">{{ view_html(__('Basic Details of :hotel', ['hotel' => '<strong>' . $hotel->name . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('hotels.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    @component('components.table', ['type' => 'striped borderless'])
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <td>{{ $hotel->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Vendor') }}</th>
                            <td>{{ $hotel->user->profile->full_name }}</td>
                        </tr>
                        @if($hotel->agent_id != null)
                        <tr>
                            <th>{{ __('Agent') }}</th>
                            <td>{{ $hotel->agent_user->profile->full_name }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>{{ __('Area') }}</th>
                            <td>{{ $hotel->area->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Description') }}</th>
                            <td>{!! $hotel->description !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Address') }}</th>
                            <td>{!! $hotel->address !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Features') }}</th>
                            <td>{!! $hotel->features !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Hotel Category') }}</th>
                            <td>{{ $hotel->hotel_category }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Vendor Commision') }}</th>
                            <td>{{ $hotel->vendor_commision }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Agent Commision') }}</th>
                            <td>{{ $hotel->agent_commision }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Created By') }}</th>
                            <td>{{ $hotel->createdBy->profile->full_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Hotel Image') }}</th>
                            <td>
                              @if(sizeof($hotel->image)>0)
                              @foreach($hotel->image as $key=>$value)
                              <a href="{{get_hotel_image($value->image_path)}}" target="_blank"><img src="{{get_hotel_image($value->image_path)}}" style="width:90px" alt=""></a>
                              @endforeach
                              @endif
                            </td>
                        </tr>
                    @endcomponent
                </div>
                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('hotels.edit', $hotel->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Information') }}</a>

                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('hotels.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Hotel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
