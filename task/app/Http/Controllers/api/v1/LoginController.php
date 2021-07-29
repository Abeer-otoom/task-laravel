<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function dash(){
        return view('/dashboard');
    }
    public function userDash()
    {
        return view('user');
    }

    public function loginApi(Request $request){

        $login = $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:8',
    ]);



       if(!Auth::attempt($login )){

           return response(['message'=>'Invalid Login']);
           
       }
       $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return view('dashboard');

    }
}
