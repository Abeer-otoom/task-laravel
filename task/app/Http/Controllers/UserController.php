<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facade\Support\Auth;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',

        ]);
        
        $allData = $request->all();
        $allData['password'] = bcrypt($allData['password']);

        $user=User::create($allData);

        $resArr=[];
        $resArr['token']=$user->createToken('api-application')->accessToken;
        $resArr['name']=$user->name;

         return response()->json($resArr, 200);
    }
    public function login(Request $request)
    {
        if(Auth::attempt([
            'email' => $email,
             'password' => $password
            ])){
                $user = Auth::user();
                $resArr=[];
                $resArr['token']=$user->createToken('api-application')->accessToken;
                $resArr['name']=$user->name;

                 return response()->json($resArr, 200);


             }else{
                
                return response()->json(['error'=>'Unauthorized Acess'],203);
             }


    }
    public function getId(Request $request)
    {  $users=user::all();
        if($request->has('search')) 
        {
            $users=user::where('id','=',"$request->search")->get();
        }
        return view('user',compact('users'));
        
    }


}

