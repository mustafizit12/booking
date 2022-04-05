<?php

namespace App\Services\User;

use App\Repositories\User\Interfaces\ProfileInterface;
use App\Repositories\User\Interfaces\UserInterface;
use App\Repositories\User\Interfaces\UserSettingInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function generate($parameters)
    {

        $userParams = Arr::only($parameters, ['username','password']);
        $userParams['password'] = Hash::make($userParams['password']);


        if (Arr::has($parameters, 'role_id')) {
            $userParams['role_id'] = $parameters['role_id'];
        }
        if (Arr::has($parameters, 'email')) {
            $userParams['email'] = $parameters['email'];
        }
        $userParams['created_by'] = Auth::user()->id;
        DB::beginTransaction();

        $user = app(UserInterface::class)->create($userParams);

        if (empty($user)) {
            DB::rollBack();
            return false;
        }
        if($parameters['area_id'] != ''){
          $profileParams = Arr::only($parameters, ['first_name', 'last_name', 'address','area_id', 'phone']);
        }else{
          $profileParams = Arr::only($parameters, ['first_name', 'last_name', 'address', 'phone']);
        }

        $profileParams['user_id'] = $user->id;

        $profile = app(ProfileInterface::class)->create($profileParams);

        if (empty($profile)) {
            DB::rollBack();
            return false;
        }
        //dd($profile);
        DB::commit();
        return $user;
    }

    function generateUsername($email)
    {
        $username = strtok($email, '@');

        $userModel = app(UserInterface::class);
        $conditions = [['username', 'like', $username . '%']];
        $count = $userModel->countByConditions($conditions);
        if($count > 0) $username = $username . ($count + 1);
        return $username;
    }

    public function getActiveList($role_id){
      if($role_id != ''){
        $model = app(UserInterface::class)->getByConditions(['role_id'=>$role_id]);
      }else{
        $model = app(UserInterface::class)->getByConditions([]);
      }
      return $model;
    }
}
