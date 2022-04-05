@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3">
                    <h5 class="float-left">{{ view_html(__('Basic Details of :rentCars', ['rentCars' => '<strong>' . $rentCars->car_model . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('rentCars.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    @component('components.table', ['type' => 'striped borderless'])
                        <tr>
                            <th>{{ __('Owner Name') }}</th>
                            <td>{{ $rentCars->owner_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Car Model') }}</th>
                            <td>{{ $rentCars->car_model }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Owner Contact') }}</th>
                            <td>{!! $rentCars->owner_contact !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Owner Address') }}</th>
                            <td>{!! $rentCars->owner_address !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Description') }}</th>
                            <td>{!! $rentCars->description !!}</td>
                        </tr>


                        <tr>
                            <th>{{ __('Created By') }}</th>
                            <td>{{ $rentCars->createdBy->profile->full_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Rent Cars Image') }}</th>
                            <td>
                              @if(sizeof($rentCars->image)>0)
                              @foreach($rentCars->image as $key=>$value)
                              <a href="{{get_rent_car_image($value->image_path)}}" target="_blank"><img src="{{get_rent_car_image($value->image_path)}}" style="width:90px" alt=""></a>
                              @endforeach
                              @endif
                            </td>
                        </tr>
                    @endcomponent
                </div>
                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('rentCars.edit', $rentCars->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Information') }}</a>

                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('rentCars.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Rent Card') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
