<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index(){
        $model = Question::all();
        return view('admin.page.question.index',compact('model'));
    }
    public function add(){
        return view('admin.page.question.add');
    }
    public function postAdd(Request $request){
        $model = new Question();
        $model->fill($request->all());
        $model->save();
        return redirect()->route('question.list');
    }
    public function edit($id){
        $model = Question::find($id);
        return view('admin.page.question.edit',compact('model'));
    }
    public function postEdit(Request $request,$id){
        $model = Question::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect()->route('question.list');
    }
    public function delete($id){
        Question::destroy($id);
        return redirect()->route('question.list');
    }
}
