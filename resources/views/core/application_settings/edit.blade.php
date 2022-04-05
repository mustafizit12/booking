@extends('layouts.master')
@section('title', $title)
@section('content')
    <?php $title_name = ucwords(Str::replaceLast('_', ' ', $type)); ?>

    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-md-12">
                <div class="card-tools float-right">
                    <a href="{{ route('application-settings.index',['type'=>$type]) }}"
                       class="btn btn-info btn-sm back-button">{{__('View :settingName Setting',['settingName' =>$title_name])}}</a>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm-4 col-md-3">
                <ul class="nav nav-pills flex-column">
                    @foreach($settings['settingSections'] as $settingSection)
                        <li class="nav-item">
                            <a class="nav-link {{is_current_route('application-settings.edit', 'active bg-info', ['type'=>$settingSection])}}"
                               href="{{route('application-settings.edit',['type'=>$settingSection])}}">{{ ucwords(Str::replaceLast('_',' ',$settingSection)) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-8 col-md-9">
                {{ Form::open(['route'=>['application-settings.update','type'=> $type], 'method'=>'PUT','files'=>true]) }}
                @component('components.table', ['type' => 'bordered', 'class'=> 'lf-setting-table'])
                    {{ $settings['html'] }}
                    <tr>
                        <td colspan="2" class="text-right">
                            {{ Form::submit(__('Update :settingName Setting',['settingName' =>$title_name]),['class'=>'btn btn-info btn-sm']) }}
                        </td>
                    </tr>
                @endcomponent
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
@endsection
