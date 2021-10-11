<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class MultipleChoiceController extends Controller
{
    //
    public function question($id)
    {
        $model = Question::inRandomOrder()->limit($id)->get();
        return view('user.exam', compact('model', 'id'));
    }
    public function point(Request $request)
    {
        $totalPoint = $request->totalPoint;
        $diemThi = 0;
        $question = [];
        if ($request->question != null) {
            foreach ($request->question as $i => $b) {
                $model = Question::find($i);
                $model['current_answer'] = $b;
                array_push($question, $model);
                if ($model['correct_answer'] == $b) {
                    $diemThi += $model['point_question'];
                }
            }
        }
        // tính điểm thi và lấy ra chữ số thập phân đầu tiên
        $result =  round(($diemThi / $totalPoint) * 100 / 10, 1);
        return view('user.result', compact('result', 'question'));
    }
}
