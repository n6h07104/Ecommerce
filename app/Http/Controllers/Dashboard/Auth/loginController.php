<?php

namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
        return view("dashboard.login");
    }

    public function loginCheck(Request $request){
        $data=$request->except('_token');
      if(Auth::guard('admin')->attempt($data)){
        return redirect()->route("admin.index");
      }else{
        return redirect()->route("admin/login");
      }

    }
}
