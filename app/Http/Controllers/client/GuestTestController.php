<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestTestController extends Controller
{
    //
    public function index()
    {
        $timeStart = Carbon::create('2021-10-30 17:08:00');
        if (Carbon::now()->gt($timeStart) == false) {
            $model = Question::inRandomOrder()->limit(12)->get();
            return view('user.link', compact('model', 'timeStart'));
        } else {
            $timeStart = 'none';
            $model = Question::inRandomOrder()->limit(12)->get();
            return view('user.link', compact('model', 'timeStart'));
        }
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
        return view('user.result', compact('question', 'result'));
    }
}
