<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{

    public function test($id=null)
    {
        dd(php_uname(), gethostname(),gethostbyaddr($_SERVER['REMOTE_ADDR']));
//        if($id){
//            Auth::loginUsingId($id);
//        }
//        else{
//            Auth::logout();
//        }
    }

    public function testPost()
    {

    }

    function numberToString($number)
    {
        $number = sprintf('%.25f', floatval($number));
        return $number;
    }
}

