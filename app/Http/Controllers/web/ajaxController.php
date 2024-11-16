<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ajaxController extends Controller
{
    public function add_to_cart(Request $request){
        $id_login=Auth::guard("web")->user()->id;
        $num_pro=cart::where(["user_id"=>$id_login,"product_id"=>$request->product_id])->first();

        if($num_pro){
            $num_pro->increment("count");
        }else{
            $cart=new cart();
            $cart->product_id=$request->product_id;
            $cart->user_id=$id_login;
            $cart->count=1;
            $cart->save();
        }
        return "success";

    }
    public function destroy(Request $request){
        $id_login=Auth::guard("web")->user()->id;
        cart::where("user_id",$id_login)->where("product_id",$request->product_id)->delete();
    }

     public function search(Request $request){
        if(empty($request->search)){
            echo "";
        }else{
            $data=product::where("name",'like',"%$request->search%")->pluck("name","id");
            foreach($data as $key=>$data){
              echo "<a href='$key '>$data</a>";
            }
        }
     }
};
