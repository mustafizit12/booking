@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3">
                    <h5 class="float-left">{{ view_html(__('Basic Details of :venue', ['venue' => '<strong>' . $venue->venue_name . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('venues.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    @component('components.table', ['type' => 'striped borderless'])
                        <tr>
                            <th>{{ __('Area') }}</th>
                            <td>{{ $venue->area->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Vendor Name') }}</th>
                            <td>{{ $venue->venue_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Contact Info') }}</th>
                            <td>{{ $venue->contact_info }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Rent') }}</th>
                            <td>{{ $venue->rent }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Discount') }}</th>
                            <td>{{ $venue->discount }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Description') }}</th>
                            <td>{!! $venue->description !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Address') }}</th>
                            <td>{!! $venue->address !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Features') }}</th>
                            <td>{!! $venue->features !!}</td>
                        </tr>

                        <tr>
                            <th>{{ __('Created By') }}</th>
                            <td>{{ $venue->createdBy->profile->full_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Venue Image') }}</th>
                            <td>
                              @if(sizeof($venue->image)>0)
                              @foreach($venue->image as $key=>$value)
                              <a href="{{get_venue_image($value->image_path)}}" target="_blank"><img src="{{get_venue_image($value->image_path)}}" style="width:90px" alt=""></a>
                              @endforeach
                              @endif
                            </td>
                        </tr>
                    @endcomponent
                </div>
                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('venues.edit', $venue->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Information') }}</a>

                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('venues.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Area') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
