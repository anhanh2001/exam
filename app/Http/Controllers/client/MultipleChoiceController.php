<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MultipleChoiceController extends Controller
{
    //
    public function question($id)
    {
        $model = Question::inRandomOrder()->limit($id)->get();
        //lấy date hết hạn làm bài
        if ($id == 10) {
            $timeEnd = Carbon::now()->addMinutes(1)->format('Y-m-d H:i');
        } else {
            $timeEnd = Carbon::now()->addMinutes(11)->format('Y-m-d H:i');
        }
        return view('user.exam', compact('model', 'id', 'timeEnd'));
    }
    public function point(Request $request)
    {
        //check date hiện tại có lớn hơn thời hạn làm bài hay k
        if (Carbon::now()->gt($request->timeEnd) == true) {
            return back('welcome')->withErrors(['msg'=>'Bạn đã vi phạm quy chế thi và không được công nhận kết quả !']);
        } else {
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
}
