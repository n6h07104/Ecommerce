<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\admin;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\trait\AuthorizationAdmin;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    use AuthorizationAdmin;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $check=Gate::forUser(Auth::guard("admin")->user())->allows('view.user');
        if($check){
            $data=admin::all('id','name','email','gender','priv');
             return view('dashboard.admin.view',compact('data'));
            }else{
                    return abort(403);
                }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $check=Gate::forUser(Auth::guard("admin")->user())->allows('add.user');
        if($check){
            return view('dashboard.admin.Add');
            }else{
                    return abort(403);
                }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        admin::create($request->toArray());
        return redirect()->route('admin.index')->with("ms-admin","success add user");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $data=admin::findOrfail($id);
       return view('dashboard.admin.update',compact('data'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        admin::updateAdmin($request,$id);
        return redirect()->route('admin.index')->with("ms-admin","success update user");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        admin::findOrfail($id)->delete();
        return redirect()->route('admin.index')->with("ms-admin","success delete user");

    }
}
