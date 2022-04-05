<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core\PasswordUpdateRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserSettingRequest;
use App\Http\Requests\User\UserAvatarRequest;
use App\Repositories\User\Interfaces\ProfileInterface;
use App\Repositories\User\Interfaces\UserSettingInterface;
use App\Services\User\ProfileService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->profile();
        $data['title'] = __('Profile');

        return view('core.profile.index', $data);
    }

    public function edit()
    {
        $data = $this->service->profile();
        $data['title'] = __('Edit Profile');

        return view('core.profile.edit', $data);
    }

    public function update(UserRequest $request, ProfileInterface $profile)
    {
        $parameters = $request->only(['first_name', 'last_name', 'address']);
        if ($profile->update($parameters, Auth::id(), 'user_id')) {
            return redirect()->route('profile.edit')->with(SERVICE_RESPONSE_SUCCESS, __('Profile has been updated successfully.'));
        }

        return redirect()->back()->with(SERVICE_RESPONSE_ERROR, __('Failed to update profile.'));
    }

    public function changePassword()
    {
        $data = $this->service->profile();
        $data['title'] = __('Change Password');

        return view('core.profile.change_password', $data);
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $response = $this->service->updatePassword($request);
        $status = $response[SERVICE_RESPONSE_STATUS] ? SERVICE_RESPONSE_SUCCESS : SERVICE_RESPONSE_ERROR;

        return redirect()->back()->with($status, $response[SERVICE_RESPONSE_MESSAGE]);
    }

    public function setting()
    {
        $data = $this->service->profile();
        $data['title'] = __('Setting');

        return view('core.profile.setting', $data);
    }

    public function settingEdit()
    {
        $data = $this->service->profile();
        $data['title'] = __('Edit Setting');

        return view('core.profile.setting_edit_form', $data);
    }

    public function settingUpdate(UserSettingRequest $request, UserSettingInterface $userSetting)
    {
        $parameters = [
            'language' => $request->get('language', config('app.locale')),
            'timezone' => $request->get('timezone', config('app.timezone')),
        ];

        if ($userSetting->update($parameters, Auth::id(), 'user_id')) {
            return redirect()->route('profile.setting.edit')->with(SERVICE_RESPONSE_SUCCESS, __('User setting has been updated successfully.'));
        }

        return redirect()->back()->withInput()->with(SERVICE_RESPONSE_SUCCESS, __('User setting has been updated successfully.'));
    }

    public function avatarEdit()
    {
        $data = $this->service->profile();
        $data['title'] = __('Change Avatar');

        return view('core.profile.avatar_edit_form', $data);
    }

    public function avatarUpdate(UserAvatarRequest $request)
    {
        $response = $this->service->avatarUpload($request);
        $status = $response[SERVICE_RESPONSE_STATUS] ? SERVICE_RESPONSE_SUCCESS : SERVICE_RESPONSE_ERROR;

        return redirect()->back()->with($status, $response[SERVICE_RESPONSE_MESSAGE]);
    }
}
