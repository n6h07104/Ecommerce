<?php
namespace App\trait;

use App\Models\admin;
use Illuminate\Support\Facades\Auth;

trait AuthorizationAdmin{

public function HasAbilty($permission){
    $id_login=Auth::guard("admin")->user()->id;

    $role_user=admin::findOrfail($id_login)->pluck("permission")[0];


    foreach($role_user as $role_user){

          return $role_user==$permission?true:false;

     };



}



}
