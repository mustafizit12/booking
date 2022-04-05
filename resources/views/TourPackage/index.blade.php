@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{ $list['search'] }}
                <a href="{{route('tourPackages.create')}}" style="float:right;" class="my-2 btn btn-info">Create Tour Package</a>
                <div class="my-2">
                @component('components.table',['class'=> 'lf-data-table'])
                    @slot('thead')
                        <tr class="bg-primary text-white">
                            <th class="all">{{ __('Package Name') }}</th>
                            <th class="all">{{ __('Valid Till') }}</th>
                            <th class="all">{{ __('Details') }}</th>
                            <th class="min-phone-l">{{ __('Package Cost') }}</th>
                            <th class="min-phone-l">{{ __('Discount') }}</th>
                            <th class="text-right all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$data)
                        <tr>

                            <td>{{ $data->package_name }}</td>
                            <td>{{ $data->valid_till }}</td>
                            <td>{{$data->details}}</td>
                            <td>{{$data->package_cost}}</td>
                            <td>{{$data->discount}}</td>
                            <td class="lf-action text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('tourPackages.show',$data->id)}}"><i
                                                class="fa fa-eye"></i> {{ __('Show') }}</a>
                                        <a class="dropdown-item" href="{{ route('tourPackages.edit',$data->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Edit Info') }}
                                        </a>
                                        <a class="dropdown-item confirmation"
                                           data-alert="{{__('Do you want to delete this data?')}}"
                                           data-form-id="ur-{{ $data->id }}"
                                           data-form-method='delete'
                                           href="{{ route('tourPackages.destroy',$data->id) }}"><i
                                                    class="fa fa-trash-o"></i> {{ __('Delete') }}</a>
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
