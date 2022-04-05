@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{ $list['search'] }}
                <div class="my-5">
                @component('components.table',['class' => 'lf-data-table'])
                    @slot('thead')
                        <tr class="bg-primary text-white">
                            <th class="min-phone-l">{{ __('Notice') }}</th>
                            <th class="min-phone-l">{{ __('Date') }}</th>
                            <th class="min-phone-l">{{ __('Status') }}</th>
                            <th class="all no-sort text-right">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$notice)
                        <tr>
                            <td {{ $notice->read_at ? '' : 'class=text-bold' }}>{{$notice->data}}</td>
                            <td {{ $notice->read_at ? '' : 'class=text-bold' }}>{{$notice->created_at}}</td>
                            <td {{ $notice->read_at ? '' : 'class=text-bold' }}>{{ $notice->read_at ? __('Read') : __('Unread') }}</td>
                            <td class="lf-action text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        @if($notice->read_at)
                                            <a class="dropdown-item"
                                               href="{{ route('notices.mark-as-unread',$notice->id) }}"><i
                                                    class="fa fa-dot-circle-o text-danger"></i> {{ __('Mark as unread') }}
                                            </a>
                                        @else
                                            <a class="dropdown-item"
                                               href="{{ route('notices.mark-as-read',$notice->id) }}"><i
                                                    class="fa fa-dot-circle-o text-success"></i> {{ __('Mark as read') }}
                                            </a>
                                        @endif
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
@endsection
