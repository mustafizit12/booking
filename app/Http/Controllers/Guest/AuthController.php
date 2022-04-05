<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core\LoginRequest;
use App\Http\Requests\Core\NewPasswordRequest;
use App\Http\Requests\Core\PasswordResetRequest;
use App\Http\Requests\Core\RegisterRequest;
use App\Services\Core\VerificationService;
use App\Services\Guest\AuthService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class AuthController extends Controller
{
    protected $service;

    /**
     * AuthController constructor.
     * @param AuthService $service
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }


    public function loginForm()
    {
        return view('core.no_header_pages.login');
    }

    public function user_login_form()
    {
        return view('fontend.login');
    }
    public function user_login_post(LoginRequest $request)
    {
        $response = $this->service->login($request);

        if ($response[SERVICE_RESPONSE_STATUS]) {
            return redirect()->route('home')->with(SERVICE_RESPONSE_SUCCESS, $response[SERVICE_RESPONSE_MESSAGE]);
        }

        return redirect()->back()->with(SERVICE_RESPONSE_ERROR, $response[SERVICE_RESPONSE_MESSAGE]);
    }
    public function user_logout()
    {
      Auth::logout();
      session()->flush();
      return redirect()->route('home');
    }
    /*
     * login user
     */

    public function login(LoginRequest $request)
    {
        $response = $this->service->login($request);

        if ($response[SERVICE_RESPONSE_STATUS]) {
            return redirect()->route(REDIRECT_ROUTE_TO_USER_AFTER_LOGIN)->with(SERVICE_RESPONSE_SUCCESS, $response[SERVICE_RESPONSE_MESSAGE]);
        }

        return redirect()->back()->with(SERVICE_RESPONSE_ERROR, $response[SERVICE_RESPONSE_MESSAGE]);
    }

    public function socialLogin($social){
      return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social){
      $userSocial = Socialite::driver($social)->user();
      $response = $this->service->socialLogin($userSocial);
      return redirect()->route($response[SERVICE_RESPONSE_REDIRECT_ROUTE]);
    }

    /**
     * @developer: M.G. Rabbi
     * @date: 2018-08-13 5:12 PM
     * @description:
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }

    public function register()
    {
        return view('core.no_header_pages.register');
    }

    public function storeUser(RegisterRequest $request)
    {

        $parameters = $request->all();

        if ($user = app(UserService::class)->generate($parameters)) {
            //app(VerificationService::class)->_sendEmailVerificationLink($user);
            return redirect()->route('home')->with(SERVICE_RESPONSE_SUCCESS, __('Registration successful. Please check your email to verify your account.'));
        }

        return redirect()->back()->with(SERVICE_RESPONSE_ERROR, __('Registration failed. Please try after sometime.'));
    }


    /**
     * @developer: M.G. Rabbi
     * @date: 2018-08-13 5:13 PM
     * @description:
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forgetPassword()
    {
        return view('core.no_header_pages.forget_password');
    }

    /**
     * @developer: M.G. Rabbi
     * @date: 2018-08-13 5:13 PM
     * @description:
     * @param PasswordResetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendPasswordResetMail(PasswordResetRequest $request)
    {
        $response = $this->service->sendPasswordResetMail($request);
        $status = $response[SERVICE_RESPONSE_STATUS] ? SERVICE_RESPONSE_SUCCESS : SERVICE_RESPONSE_ERROR;

        return redirect()->route('forget-password.index')->with($status, $response[SERVICE_RESPONSE_MESSAGE]);
    }

    /**
     * @developer: M.G. Rabbi
     * @date: 2018-08-13 5:13 PM
     * @description:
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetPassword(Request $request, $id)
    {
        $data = $this->service->resetPassword($request, $id);

        return view('core.no_header_pages.reset_password', $data);
    }

    /**
     * @developer: M.G. Rabbi
     * @date: 2018-08-13 5:13 PM
     * @description:
     * @param NewPasswordRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(NewPasswordRequest $request, $id)
    {
        $response = $this->service->updatePassword($request, $id);
        $status = $response[SERVICE_RESPONSE_STATUS] ? SERVICE_RESPONSE_SUCCESS : SERVICE_RESPONSE_ERROR;

        return redirect()->route('login')->with($status, $response[SERVICE_RESPONSE_MESSAGE]);
    }
}
