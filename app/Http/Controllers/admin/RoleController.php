<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleHasPermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends Controller
{
    //
    public function index(){
        $model = Role::all();
        $model->load('hasPermission');
        return view('admin.page.role.index',compact('model'));
    }
    public function add(){
        $model = Permission::all();
        return view('admin.page.role.add',compact('model'));
    }
    public function postAdd(Request $request){
        //role mới
        $role = ModelsRole::create(['name' => $request->name,'guard_name'=> 'web']);
        $role->syncPermissions($request->permission);
        return redirect()->route('role.list');   
    }
    public function edit($id){
        $model = Role::find($id);
        $model->load('hasPermission');
        $per = Permission::all();
        return view('admin.page.role.edit',compact('model','per'));
    }
    public function postEdit(Request $request,$id){
        Role::destroy($id);
        $role = ModelsRole::create(['name' => $request->name,'guard_name'=> 'web']);
        $role->syncPermissions($request->permission);
        return redirect()->route('role.list'); 
    }
    public function delete($id){
        Role::destroy($id);
        return redirect()->route('role.list');
    }
}
