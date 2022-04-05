@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3">
                    <h5 class="float-left">{{ view_html(__('Basic Details of :tourPackages', ['tourPackages' => '<strong>' . $tourPackage->package_name . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('tourPackages.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    @component('components.table', ['type' => 'striped borderless'])
                        <tr>
                            <th>{{ __('Package Name') }}</th>
                            <td>{{ $tourPackage->package_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Valid Till') }}</th>
                            <td>{{ $tourPackage->valid_till }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Package Cost') }}</th>
                            <td>{{ $tourPackage->package_cost }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Discount') }}</th>
                            <td>{!! $tourPackage->discount !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Details') }}</th>
                            <td>{!! $tourPackage->details !!}</td>
                        </tr>

                        <tr>
                            <th>{{ __('Created By') }}</th>
                            <td>{{ $tourPackage->createdBy->profile->full_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Hotel Image') }}</th>
                            <td>
                              @if(sizeof($tourPackage->image)>0)
                              @foreach($tourPackage->image as $key=>$value)
                              <a href="{{get_tour_package_image($value->image_path)}}" target="_blank"><img src="{{get_tour_package_image($value->image_path)}}" style="width:90px" alt=""></a>
                              @endforeach
                              @endif
                            </td>
                        </tr>
                    @endcomponent
                </div>
                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('tourPackages.edit', $tourPackage->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Information') }}</a>

                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('tourPackages.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Area') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
