<?php

namespace App\trait;

use App\Models\image;
use App\Models\product;

trait updateProduct{

  public function updatePro($request,$id){
    if(empty($request->file)){
      product::where("id",$id)->update($request->except("_token","_method","file"));
      return redirect()->route("product.index")->with("ms-admin","success update product");
    }else{
      product::where("id",$id)->update($request->except("_token","_method","file"));
      image::deleteImage($id);
      image::where("product_id",$id)->delete();
      image::createImage($id,$request->only('file'));
    }

  }
}
