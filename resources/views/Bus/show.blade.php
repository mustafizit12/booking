@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3">
                    <h5 class="float-left">{{ view_html(__('Basic Details of :bus', ['bus' => '<strong>' . $bus->company_name . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('buss.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    @component('components.table', ['type' => 'striped borderless'])
                        <tr>
                            <th>{{ __('Company Name') }}</th>
                            <td>{{ $bus->company_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Bus Model') }}</th>
                            <td>{{ $bus->bus_model }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Starting Point') }}</th>
                            <td>{{ $bus->starting_point }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('End Point') }}</th>
                            <td>{!! $bus->end_point !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Departure Time') }}</th>
                            <td>{!! $bus->departure_time !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Arrival Time') }}</th>
                            <td>{!! $bus->arrival_time !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Seat Quantity') }}</th>
                            <td>{{ $bus->seat_quantity }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Price') }}</th>
                            <td>{{ $bus->price }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Bus Quality') }}</th>
                            <td>@if($bus->bus_quality == 0)Non Ac @else Ac @endif</td>
                        </tr>
                        <tr>
                            <th>{{ __('Created By') }}</th>
                            <td>{{ $bus->createdBy->profile->full_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Bus Image') }}</th>
                            <td>
                              @if(sizeof($bus->image)>0)
                              @foreach($bus->image as $key=>$value)
                              <a href="{{get_bus_image($value->image_path)}}" target="_blank"><img src="{{get_bus_image($value->image_path)}}" style="width:90px" alt=""></a>
                              @endforeach
                              @endif
                            </td>
                        </tr>
                    @endcomponent
                </div>
                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('buss.edit', $bus->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Information') }}</a>

                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('buss.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Area') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
