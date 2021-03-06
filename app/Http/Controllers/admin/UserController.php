<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        $model = User::all();
        return view('admin.page.user.index', compact('model'));
    }
    public function add()
    {
        return view('admin.page.user.add');
    }
    public function postAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'role' => 'required',
        ]);
        $model = new User();
        $model->fill($request->all());
        $model['password'] = Hash::make($request->password);
        $model->save();
        $model->assignRole($request->role);
        return redirect()->route('user.list');
    }
    public function edit($id)
    {
        $model = User::find($id);
        $model['role'] = $model->getRoleNames()->first();
        return view('admin.page.user.edit', compact('model'));
    }
    public function postEdit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,'.$id],
            'password' => ['required'],
            'role' => 'required',
        ]);
        $model = User::find($id);
        $model->fill($request->all());
        $model['password'] = Hash::make($request->password);
        $model->save();
        return redirect()->route('user.list');
    }
    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('user.list');
    }
}
