<?php

namespace App\Services\Guest;

use App\Http\Requests\Core\LoginRequest;
use App\Http\Requests\Core\NewPasswordRequest;
use App\Http\Requests\Core\PasswordResetRequest;
use App\Jobs\EmailSender;
use App\Mail\Core\ResetPassword;
use App\Repositories\Core\RoleRepository;
use App\Repositories\User\Interfaces\NotificationInterface;
use App\Repositories\User\Interfaces\UserInterface;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User\User;
class AuthService
{
    protected $user;

    public function __construct(UserInterface $repository)
    {
        $this->user = $repository;
    }

    public function login(LoginRequest $request)
    {
        $field = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $request->username, 'password' => $request->password], $request->has('remember_me'))) {
            $user = Auth::user();

            if (!is_null($user->created_by) && !is_bool($user->created_by)) {
                $this->user->update(['created_by' => true], $user->id);
            }

            // check if user is deleted or not.
            if ($user->is_active < USER_STATUS_INACTIVE) {
                Auth::logout();
                return [
                    SERVICE_RESPONSE_STATUS => false,
                    SERVICE_RESPONSE_MESSAGE => __('You account is permanently deleted.'),
                ];
            } elseif ($user->is_accessible_under_maintenance == UNDER_MAINTENANCE_ACCESS_INACTIVE && settings('maintenance_mode') == UNDER_MAINTENANCE_MODE_ACTIVE) {
                Auth::logout();
                return [
                    SERVICE_RESPONSE_STATUS => false,
                    SERVICE_RESPONSE_MESSAGE => __('You are not allowed to log in under maintenance mode.'),
                ];
            }

            return [
                SERVICE_RESPONSE_STATUS => true,
                SERVICE_RESPONSE_MESSAGE => __('Login is successful.'),
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => false,
            SERVICE_RESPONSE_MESSAGE => __('Incorrect :field or password', ['field' => $field])
        ];
    }

    public function socialLogin($userSocial){
      $user = User::where(['email'=>$userSocial->getEmail()])->first();
      if($user){
        Auth::login($user);
      }else{
        $name = app(UserService::class)->split_name($userSocial->getName());
        $user = User::where(['username'=>$userSocial->getEmail()])->first();
        if($user){
          Auth::login($user);
        }else{
          $parameters = ['first_name'=>$name[0], 'last_name'=>$name[1], 'email'=>$userSocial->getEmail(), 'username'=>$userSocial->getEmail(), 'password'=>'123456','phone'=>'01XXXXXXX'];
          if ($user = app(UserService::class)->generate($parameters)) {
            $user = User::where(['email'=>$userSocial->getEmail()])->first();
            if($user){
              Auth::login($user);
            }
          }
        }
      }
      return [
          SERVICE_RESPONSE_STATUS => true,
          SERVICE_RESPONSE_REDIRECT_ROUTE =>REDIRECT_ROUTE_TO_USER_AFTER_LOGIN,
          SERVICE_RESPONSE_MESSAGE => __('Login is successful.'),
      ];
    }

    public function sendPasswordResetMail(PasswordResetRequest $request)
    {
        $conditions = [
            ['email', $request->email],
            ['is_active', '>', USER_STATUS_DELETED]
        ];
        $user = $this->user->getFirstByConditions($conditions);

        if (!$user) {
            return [
                SERVICE_RESPONSE_STATUS => false,
                SERVICE_RESPONSE_MESSAGE => __("Failed! Your account is deleted by system."),
            ];
        }

        Mail::to($user->email)->send(new ResetPassword($user));

        return [
            SERVICE_RESPONSE_STATUS => true,
            SERVICE_RESPONSE_MESSAGE => __("Password reset link is sent to your email address."),
        ];
    }

    public function resetPassword(Request $request, $id)
    {
        if (!$request->hasValidSignature()) {
            abort(401, 'Invaild Request.');
        }

        $passwordResetLink = url()->signedRoute('reset-password.update', ['id' => $id]);

        return [
            'id' => $id,
            'passwordResetLink' => $passwordResetLink
        ];
    }

    public function updatePassword(NewPasswordRequest $request, $id)
    {
        if (!$request->hasValidSignature()) {
            return [
                SERVICE_RESPONSE_STATUS => false,
                SERVICE_RESPONSE_MESSAGE => __("Invaild request"),
            ];
        }

        $update = ['password' => Hash::make($request->new_password)];

        if ($this->user->update($update, $id)) {
            $notification = ['user_id' => $id, 'data' => __("You just reset your account's password successfully.")];
            app(NotificationInterface::class)->create($notification);

            return [
                SERVICE_RESPONSE_STATUS => true,
                SERVICE_RESPONSE_MESSAGE => __("New password is updated. Please login your account."),
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => false,
            SERVICE_RESPONSE_MESSAGE => __("Failed to set new password. Please try again."),
        ];
    }
}
