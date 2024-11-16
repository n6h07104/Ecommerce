<?php

namespace App\Http\Controllers\web;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//

class loginController extends Controller
{
    public function login(){
        return view('web.login');
    }

    public function register(){
        return view('web.register');
    }
    public function data(Request $request){
       $data=User::create($request->toArray());
       Auth::login($data);
       return redirect()->route('webindex');
    }

    public function loginCheck(Request $request){
        if(Auth::guard("web")->attempt($request->except("_token"))){
            return redirect()->route("webindex");
        }else{
            return redirect()->route('weblogin');
        }
    }
}
