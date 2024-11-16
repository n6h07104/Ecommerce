<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cart extends Model
{
    use HasFactory;

    protected $fillable=["product_id","user_id","count"];

    public function products(){
        return $this->hasMany(product::class,"id","product_id");
    }
}
