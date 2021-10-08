<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class MultipleChoiceController extends Controller
{
    //
    public function question($id){
        $model = Question::inRandomOrder()->limit($id)->get();
        return view('user.exam',compact('model','id'));
    }
    public function point(Request $request){
        $total = 0;
        $diemThi = 0;
        $question = [];
        foreach($request->question as $i => $b){
            $model = Question::find($i);
            $model['current_answer'] = $b;
            array_push($question,$model);
            $total += $model['point_question'];
            if($model['correct_answer']==$b){
                $diemThi += $model['point_question'];
            }
        }
        $result =  ($diemThi/$total)*100/10;
        return view('user.result',compact('result','question'));
    }
}
