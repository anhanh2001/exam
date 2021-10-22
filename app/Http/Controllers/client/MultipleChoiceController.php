<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Result;
use App\Models\ResultQuestion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultipleChoiceController extends Controller
{
    //
    public function question($id)
    {
        $model = Question::inRandomOrder()->limit($id)->get();
        //lấy date hết hạn làm bài
        if ($id == 10) {
            $timeEnd = Carbon::now()->addMinutes(6)->format('Y-m-d H:i');
            $time = 5;//biến time dùng cho bộ đếm js khi làm bài
        } else {
            $timeEnd = Carbon::now()->addMinutes(11)->format('Y-m-d H:i');
            $time = 10;
        }
        return view('user.exam', compact('model','timeEnd','time'));
    }
    public function question_random(){
        $model = Question::all()->count();
        return view('user.random-question',compact('model'));
    }
    public function question_random_post(Request $request){
        $model = Question::inRandomOrder()->limit($request->number)->get();
        $time = $model->count();
        $request->validate([
            'number' => ['required','numeric','min:1','max:'.$time],
        ]);
        $time = ceil($time/10)*5;// cứ 10 câu hỏi quy ra 5p vì thế lấy tổng chia cho 10 và làm tròn lên
        $timeEnd = Carbon::now()->addMinutes((ceil($time/10)*5)+1)->format('Y-m-d H:i');
        return view('user.exam', compact('model','timeEnd','time'));
    }
    public function point(Request $request)
    {
        //check date hiện tại có lớn hơn thời hạn làm bài hay k
        if (Carbon::now()->gt($request->timeEnd) == true) {
            return redirect()->route('dashboard')->withErrors(['msg'=>'Bạn đã vi phạm quy chế thi và không được công nhận kết quả !']);
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
            //lưu lại kết quả thi
            $saveResult = new Result();
            $saveResult['user_id'] = Auth::user()->id;
            $saveResult['point'] = $result;
            $saveResult->save();
            if ($request->question != null) {
                foreach ($request->question as $i => $b) {
                    $saveResultQuestion = new ResultQuestion();
                    $saveResultQuestion['result_id'] = $saveResult['id'];
                    $saveResultQuestion['question_id'] = $i;
                    $saveResultQuestion['choice'] = $b;
                    $saveResultQuestion->save();
                }
            }
            return view('user.result', compact('result', 'question'));
        }
    }
}
