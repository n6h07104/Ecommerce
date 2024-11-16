<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasFactory;
    protected $fillable=["name","email","password","gender","priv","permission"];

    protected $casts = [
        'password' => 'hashed',
    ];
    protected $hidden =[
        "updated_at",
        "created_at",
    ];

    public function setPermissionAttribute($permission){
        $this->attributes ["permission"] = implode("+",$permission);
    }

    public function getPermissionAttribute($permission){
        return explode("+",$permission);
    }

    public static function updateAdmin($request,$id){
        $data=$request->except('_token','_method');
        $permission=implode("+",$request->permission);
        $data["permission"]=$permission;
        admin::where('id',$id)->update($data);
    }
}
