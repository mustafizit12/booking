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
class PublicApiController extends Controller
{
  
  /**
   * AuthController constructor.
   * @param AuthService $service
   */

}
