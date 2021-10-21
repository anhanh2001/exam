<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use App\Models\ResultQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    //
    public function index(){
        $model = Result::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('user.history',compact('model'));
    }
    public function detail($id){
        $point = Result::find($id);
        $result = $point['point'];
        $choice = ResultQuestion::where('result_id',$id)->get();
        $question = [];
        foreach($choice as $c){
            $model = Question::find($c['question_id']);
            $model['current_answer'] = $c['choice'];
            array_push($question,$model);
        }
        return view('user.result', compact('result', 'question'));
    }
}
