@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                {{ Form::model($systemNotice, ['route'=>['system-notices.update',  $systemNotice->id], 'method' => 'post', 'class'=>'form-horizontal system-notice-form']) }}
                @method('PUT')
                @include('core.system_notice._form',['buttonText'=> __('Update')])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/bs4-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('script')
    <!-- for datatable and date picker -->
    <script src="{{ asset('js/cvalidator.js') }}"></script>
    <script src="{{ asset('plugins/moment.js/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/bs4-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //Init jquery Date Picker
            $('#start_time').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
            });

            $('#end_time').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
            });

            $("#start_time").on("dp.change", function (e) {
                $('#end_time').data("DateTimePicker").minDate(e.date);
            });
            $("#end_time").on("dp.change", function (e) {
                $('#start_time').data("DateTimePicker").maxDate(e.date);
            });

            $('.system-notice-form').cValidate({});
        });
    </script>
@endsection
