<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use App\Models\image;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class webController extends Controller
{
    public function index(){
    //    return $data=product::where("name",'like',"%a%")->get(["name","id","price"]);
        // dd(8);
       $data=product::with("images")->paginate(4);
        return view('web.index',compact("data"));
    }

}
