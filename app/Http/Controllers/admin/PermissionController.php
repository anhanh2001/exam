<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionController extends Controller
{
    //
    public function index(){
        $model = Permission::all();
        return view('admin.page.permission.index',compact('model'));
    }
    public function add(){
        return view('admin.page.permission.add');
    }
    public function postAdd(Request $request){
        $request->validate([
            'name' => ['required','unique:permissions,name'],
        ]);
        ModelsPermission::create(['name' => $request->name,'guard_name'=> 'web']);
        return redirect()->route('permission.list');
    }
    public function edit($id){
        $model = Permission::find($id);
        return view('admin.page.permission.edit',compact('model'));
    }
    public function postEdit(Request $request,$id){
        $request->validate([
            'name' => ['required','unique:permissions,name,'.$id],
        ]);
        $model = Permission::find($id);
        $model['name'] = $request->name;
        $model->save();
        return redirect()->route('permission.list');
    }
    public function delete($id){
        Permission::destroy($id);
        return redirect()->route('permission.list');
    }
}
