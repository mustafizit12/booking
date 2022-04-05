@basekey
{{--user group field--}}
<div class="form-group row">
    <label for="{{ fake_field('role_id') }}" class="col-md-4 control-label required">{{ __('User Role') }}</label>
    <div class="col-md-8">
        @if(!in_array($user->id, config('commonconfig.fixed_users')) && $user->id != Auth::user()->id)
            <div class="lf-select">
            {{ Form::select(fake_field('role_id'), $roles, old('role_id', $user->role_id),['class' => form_validation($errors, 'role_id'),'id' => fake_field('role_id'),'placeholder' => __('Select Role'),'data-cval-name' => 'The user role field','data-cval-rules' => 'required|in:'.array_to_string($roles->toArray())]) }}
            </div>
            <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('role_id') }}">{{ $errors->first('role_id') }}</span>
        @else
            <p class="form-control">{{ $roles[$user->role_id] }}</p>
        @endif
    </div>
</div>
{{--first name--}}
<div class="form-group row">
    <label for="{{ fake_field('first_name') }}" class="col-md-4 control-label required">{{ __('First Name') }}</label>
    <div class="col-md-8">
        {{ Form::text(fake_field('first_name'), old('first_name', $user->profile->first_name), ['class'=> form_validation($errors, 'first_name'), 'id' => fake_field('first_name'),'data-cval-name' => 'The first name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('first_name') }}">{{ $errors->first('first_name') }}</span>
    </div>
</div>
{{--last name--}}
<div class="form-group row">
    <label for="{{ fake_field('last_name') }}" class="col-md-4 control-label required">{{ __('Last Name') }}</label>
    <div class="col-md-8">
        {{ Form::text(fake_field('last_name'), old('last_name', $user->profile->last_name), ['class'=>form_validation($errors, 'last_name'), 'id' => fake_field('last_name'),'data-cval-name' => 'The last name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('last_name') }}">{{ $errors->first('last_name') }}</span>
    </div>
</div>
{{--email--}}
<div class="form-group row">
    <label for="{{ fake_field('email') }}" class="col-md-4 control-label required">{{ __('Email') }}</label>
    <div class="col-md-8">
        {{ Form::email(fake_field('email'), old('email', $user->email), ['class'=>form_validation($errors, 'email'), 'id' => fake_field('email'),'data-cval-name' => 'The Email field','data-cval-rules' => '']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('email') }}">{{ $errors->first('email') }}</span>
    </div>
</div>
{{--phone--}}
<div class="form-group row">
    <label for="{{ fake_field('phone') }}" class="col-md-4 control-label required">{{ __('Phone') }}</label>
    <div class="col-md-8">
        {{ Form::text(fake_field('phone'), old('phone', $user->profile->phone), ['class'=>form_validation($errors, 'phone'), 'id' => fake_field('phone'),'data-cval-name' => 'The phone field','data-cval-rules' => 'required']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('phone') }}">{{ $errors->first('phone') }}</span>
    </div>
</div>
{{--username--}}
<div class="form-group row">
    <label class="col-md-4 control-label required">{{ __('Username') }}</label>
    <div class="col-md-8">
        <p class="form-control form-control-sm">{{ $user->username }}</p>
    </div>
</div>
{{--address--}}
<div class="form-group row">
    <label for="{{ fake_field('address') }}" class="col-md-4 control-label">{{ __('Address') }}</label>
    <div class="col-md-8">
        {{ Form::textarea(fake_field('address'),  old('address', $user->profile->address), ['class'=>form_validation($errors, 'address'), 'id' => fake_field('address'), 'rows'=>2,'data-cval-name' => 'The address field','data-cval-rules' => 'escapeText']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('address') }}">{{ $errors->first('address') }}</span>
    </div>
</div>
{{--submit button--}}
<div class="form-group row">
    <div class="offset-md-4 col-md-8">
        {{ Form::submit(__('Update Information'),['class'=>'btn btn-info btn-sm btn-left form-submission-button']) }}
        {{ Form::button('<i class="fa fa-undo"></i>',['class'=>'btn btn-sm btn-danger', 'type' => 'reset']) }}
    </div>
</div>
