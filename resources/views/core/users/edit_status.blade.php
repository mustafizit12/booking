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
                <div class="bg-primary text-white clearfix py-3 px-3">
                    <h5 class="float-left">{{ view_html(__('Status Details of :user', ['user' => '<strong>' . $user->profile->full_name . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('users.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>
                <div class="my-5">
                    @if($user->id == Auth::user()->id)
                        <div class="text-center"><h4>{{__('You cannot change your own status.')}}</h4></div>
                    @elseif(in_array($user->id, config('commonconfig.fixed_users')))
                        <div class="text-center"><h4>{{__("You cannot change primary user's status.")}}</h4></div>
                    @else
                        {{ Form::model($user,['route'=>['users.update.status',$user->id],'class'=>'form-horizontal user-form','method'=>'put']) }}
                        @include('core.users._edit_status_form')
                        {{ Form::close() }}
                    @endif
                </div>

                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('users.show', $user->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="btn btn-sm btn-warning btn-sm-block">{{ __('Edit Information') }}</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('users.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Users') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.user-form').cValidate({});
        });
    </script>
@endsection
