@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{ $list['search'] }}
                <a href="{{route('rooms.create')}}" style="float:right;" class="my-2 btn btn-info">Create Room</a>
                <div class="my-2">
                @component('components.table',['class'=> 'lf-data-table'])
                    @slot('thead')
                        <tr class="bg-primary text-white">
                            <th class="all">{{ __('Hotel') }}</th>
                            <th class="all">{{ __('Room Name') }}</th>
                            <th class="all">{{ __('Room Adult Rent') }}</th>
                            <th class="text-right all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$data)
                        <tr>

                            <td>{{ $data->hotel->name }}</td>
                            <td>{{ $data->room_name }}</td>
                            <td>{{$data->room_rent_adult}}</td>

                            <td class="lf-action text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('rooms.show',$data->id)}}"><i
                                                class="fa fa-eye"></i> {{ __('Show') }}</a>
                                        <a class="dropdown-item" href="{{ route('rooms.edit',$data->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Edit Info') }}
                                        </a>
                                        <a class="dropdown-item confirmation"
                                           data-alert="{{__('Do you want to delete this data?')}}"
                                           data-form-id="ur-{{ $data->id }}"
                                           data-form-method='delete'
                                           href="{{ route('rooms.destroy',$data->id) }}"><i
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
