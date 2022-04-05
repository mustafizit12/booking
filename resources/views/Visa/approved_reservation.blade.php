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
                            <th class="all">{{ __('Title') }}</th>
                            <th class="all">{{ __('Visa Country') }}</th>
                            <th class="all">{{ __('Total Amount') }}</th>
                            <th class="min-phone-l">{{ __('Order By') }}</th>
                            <th class="min-phone-l">{{ __('Contact Number') }}</th>
                            <th class="min-phone-l">{{ __('Spical Requirment') }}</th>
                            <th class="min-phone-l">{{ __('Payment Type') }}</th>
                            <th class="text-right all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$data)
                        <tr>

                            <td>{{$data->visa->title}}</td>
                            <td>{{ $data->visa->visa_country }}</td>
                            <td>{{$data->total_amount}}</td>
                            <td>{{$data->orderBy->profile->full_name}}</td>
                              <td>{{$data->orderBy->profile->phone}}</td>
                            <td>{{$data->spical_requirment}}</td>
                            <td>@if($data->payment_type == 0)Offline Pyament @else Online Payment @endif</td>
                            <td class="lf-action text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="">Payment</a>

                                    </div>
                                </div>
                            </td>
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
