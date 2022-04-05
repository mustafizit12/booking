@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                @include('core.profile.avatar')
            </div>
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    @include('core.profile.profile_nav')
                    {{ Form::open(['route'=>['profile.avatar.update'],'class'=>'form-horizontal validator', 'files'=> true]) }}
                    @method('put')
                    @basekey

                    {{--avatar--}}
                    <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                        <label for="avatar" class="d-block control-label required">{{ __('Upload new avatar') }}</label>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new img-thumbnail" style="width: 200px; height: 200px;">
                                    <img src="{{ get_avatar(auth()->user()->avatar) }}" alt="">
                                </div>
                                <div class="fileinput-preview fileinput-exists img-thumbnail"
                                     style="max-width: 200px; max-height: 200px;"></div>
                                <div>
                            <span class="btn btn-sm btn-outline-success btn-file" style="width: 100px">
                              <span class="fileinput-new">{{ __("Select") }}</span>
                              <span class="fileinput-exists">{{ __("Change") }}</span>
                              <input type="file" name="{{ fake_field('avatar') }}">
                            </span>
                                    <a href="#" class="btn btn-sm btn-outline-danger fileinput-exists"
                                       data-dismiss="fileinput">{{ __("Remove") }}</a>
                                </div>
                            </div>
                        </div>
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('avatar') }}">{{ $errors->first('avatar') }}</span>
                    </div>

                    {{--submit button--}}
                    {{ Form::submit(__('Upload Avatar'), ['class'=>'btn btn-info btn-sm btn-left btn-sm-block form-submission-button']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/cvalidator.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.validator').cValidate();
        });
    </script>
@endsection
