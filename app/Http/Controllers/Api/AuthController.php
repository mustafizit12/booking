<?php
namespace App\Http\Controllers\Api;

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
  public $successStatus = 200;
  protected $service;

  /**
   * AuthController constructor.
   * @param AuthService $service
   */
  public function __construct(AuthService $service)
  {
      $this->service = $service;
  }

public function register(RegisterRequest $request) {
  $parameters = $request->all();

  if ($user = app(UserService::class)->generate($parameters)) {
      //app(VerificationService::class)->_sendEmailVerificationLink($user);
      $success['token'] =  $user->createToken('AppName')->accessToken;
      $success['status_code'] = $this-> successStatus;
      $success['message'] = 'Registration successful. Please check your email to verify your account.';
      return response()->json([SERVICE_RESPONSE_SUCCESS => $success], $this-> successStatus);
  }
  return response()->json([SERVICE_RESPONSE_ERROR =>'Registration failed. Please try after sometime.'], 401);
}

public function login(LoginRequest $request){
  $response = $this->service->login($request);
  if ($response[SERVICE_RESPONSE_STATUS]) {
    $user = Auth::user();
    $response['token'] =  $user->createToken('AppName')-> accessToken;
    $response['status_code'] = $this-> successStatus;
    return response()->json([SERVICE_RESPONSE_SUCCESS => $response], $this-> successStatus);
  }
  return response()->json([SERVICE_RESPONSE_ERROR =>$response[SERVICE_RESPONSE_MESSAGE]], 401);
}

public function getUser() {
 $user = Auth::user();
 return response()->json(['success' => $user], $this->successStatus);
 }
}
