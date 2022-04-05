@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{ $list['search'] }}
                <div class="my-2">
                @component('components.table',['class'=> 'lf-data-table'])
                    @slot('thead')
                        <tr class="bg-primary text-white">
                            <th class="all">{{ __('Company Name') }}</th>
                            <th class="all">{{ __('Bus Model') }}</th>
                            <th class="all">{{ __('Starting Point') }}</th>
                            <th class="all">{{ __('Total Ticket') }}</th>
                            <th class="all">{{ __('Total Amount') }}</th>
                            <th class="min-phone-l">{{ __('Order By') }}</th>
                            <th class="min-phone-l">{{ __('Contact Number') }}</th>
                            <th class="min-phone-l">{{ __('Spical Requirment') }}</th>
                            <th class="min-phone-l">{{ __('Payment Type') }}</th>

                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$data)
                        <tr>

                            <td>{{$data->bus->company_name}}</td>
                            <td>{{ $data->bus->bus_model }}</td>
                            <td>{{ $data->bus->starting_point }}</td>
                            <td>{{$data->seat_quantity}}</td>
                            <td>{{$data->total_rent}}</td>
                            <td>{{$data->orderBy->profile->full_name}}</td>
                            <td>{{$data->orderBy->profile->phone}}</td>
                            <td>{{$data->spical_requirment}}</td>
                            <td>@if($data->payment_type == 0)Offline Pyament @else Online Payment @endif</td>

                        </tr>
                    @endforeach
                @endcomponent
                </div>
                {{ $list['pagination'] }}
            </div>
        </div>
    </div>
@endsection

@section('style')
    @include('layouts.includes.list-css')
@endsection

@section('script')
    @include('layouts.includes.list-js')
    <script>
        (function ($) {
            $('.lf-filter-toggler').on('click', function () {
                $('.lf-filter-container').slideToggle();
            })
        })(jQuery)
    </script>
@endsection
