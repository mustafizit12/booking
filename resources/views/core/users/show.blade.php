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
                    <h5 class="float-left">{{ view_html(__('Basic Details of :user', ['user' => '<strong>' . $user->profile->full_name . '</strong>'])) }}</h5>
                    <div class="float-right">
                        <a href="{{ route('users.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    @component('components.table', ['type' => 'striped borderless'])
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <td>{{ $user->profile->full_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('User Role') }}</th>
                            <td>{{ $user->role->name }}</td>
                        </tr>
                        @if($user->email != null)
                        <tr>
                            <th>{{ __('Email') }}</th>
                            <td>{{ $user->email }} <span
                                    class="badge badge-{{ config('commonconfig.email_status.' . $user->is_email_verified . '.color_class') }}">{{ email_status($user->is_email_verified) }}</span>
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <th>{{ __('Phone') }}</th>
                            <td>{{ $user->profile->phone }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Username') }}</th>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Address') }}</th>
                            <td>{{ $user->profile->address }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Area') }}</th>
                            <td>{{ !empty($user->profile->area_id)?$user->profile->area->name:'' }}</td>
                        </tr>
                        <!-- <tr>
                            <th>{{ __('Account Status') }}</th>
                            <td>
                                <span
                                    class="badge badge-{{ config('commonconfig.account_status.' . $user->is_active . '.color_class') }}">{{ account_status($user->is_active) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Financial Status') }}</th>
                            <td>
                                <span
                                    class="badge badge-{{ config('commonconfig.financial_status.' . $user->is_financial_active . '.color_class') }}">{{ financial_status($user->is_financial_active) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Maintenance Access Status') }}</th>
                            <td>
                                <span
                                    class="badge badge-{{ config('commonconfig.maintenance_accessible_status.' . $user->is_accessible_under_maintenance . '.color_class') }}">{{ maintenance_accessible_status($user->is_accessible_under_maintenance) }}</span>
                            </td>
                        </tr> -->
                    @endcomponent
                </div>
                <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Information') }}</a>
                            <a href="{{ route('users.edit.status', $user->id) }}"
                               class="btn btn-sm btn-warning btn-sm-block">{{ __('Edit Status') }}</a>
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
