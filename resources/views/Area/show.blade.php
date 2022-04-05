@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3">
                    <h5 class="float-left">{{ view_html(__('Basic Details of :area', ['area' => '<strong>' . $area->name . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('areas.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    @component('components.table', ['type' => 'striped borderless'])
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <td>{{ $area->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Details') }}</th>
                            <td>{{ $area->details }}</td>
                        </tr>

                    @endcomponent
                </div>
                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('areas.edit', $area->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Information') }}</a>

                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('areas.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Area') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
