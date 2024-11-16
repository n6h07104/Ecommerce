<?php

namespace App\Http\Controllers\dashboard\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    public function logout(){
        Auth::guard("admin")->logout();
        return redirect()->route('admin/login');
    }
}
