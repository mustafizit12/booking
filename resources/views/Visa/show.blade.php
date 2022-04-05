@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3">
                    <h5 class="float-left">{{ view_html(__('Basic Details of :visa', ['visa' => '<strong>' . $visa->title . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('visas.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    @component('components.table', ['type' => 'striped borderless'])
                        <tr>
                            <th>{{ __('Title') }}</th>
                            <td>{{ $visa->title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Visa Country') }}</th>
                            <td>{{ $visa->visa_country }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Cost') }}</th>
                            <td>{{ $visa->cost }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Visa Duration') }}</th>
                            <td>{!! $visa->visa_duration !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Details') }}</th>
                            <td>{{ $visa->details }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Created By') }}</th>
                            <td>{{ $visa->createdBy->profile->full_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Visa Image') }}</th>
                            <td>
                              @if(sizeof(explode(',',$visa->image))>0)
                                  @foreach(explode(',',$visa->image) as $key=>$img)
                              <a href="{{get_visa_image($img)}}" target="_blank"><img src="{{get_visa_image($img)}}" style="width:90px" alt=""></a>
                              @endforeach
                              @endif
                            </td>
                        </tr>
                    @endcomponent
                </div>
                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('visas.edit', $visa->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Information') }}</a>

                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('visas.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Visa') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
