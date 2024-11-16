<?php

namespace App\Http\Controllers\Dashboard;

use Throwable;
use App\Models\image;
use App\Models\product;
use App\trait\updateProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\productRequest;
use Illuminate\Database\Console\Migrations\RollbackCommand;

class productController extends Controller
{
    use updateProduct;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check=Gate::forUser(Auth::guard("admin")->user())->allows('view.product');
        if($check){
            $data=product::with("images")->get();
            return view('dashboard.product.view',compact('data'));
        }else{
            return abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.product.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(productRequest $request)
    {

        DB::beginTransaction();
       try{
        $product=product::create($request->except('file'));
        $product_id=$product->id;
        image::createImage($product_id,$request->only('file'));
        DB::commit();
        return redirect()->route("product.index")->with("ms-admin","success add product");
       }catch(Throwable $e){
        DB::rollBack();
        return redirect()->back()->with("ms-admin","you have error");
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=product::where("id",$id)->get()[0];
        return view("dashboard.product.update",["product"=>$product]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $this->updatePro($request,$id);
        return redirect()->route("product.index")->with("ms-admin","success update product");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      DB::beginTransaction();
      try{
        image::deleteImage($id);
        product::findOrfail($id)->delete();
        DB::commit();
        return redirect()->route("product.index")->with("ms-admin","success delete product");
      }catch(Throwable $e){ 
        DB::rollBack();
        return redirect()->route("product.index")->with("ms-admin",$e);
  }

    }
}
