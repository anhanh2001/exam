<?php

namespace App\Imports;

use App\Models\Question;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class QuestionImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures, Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        
        return new Question([
            'question' => $row['question'],
            'answer_1' => $row['answer_1'],
            'answer_2' => $row['answer_2'],
            'answer_3' => $row['answer_3'],
            'answer_4' => $row['answer_4'],
            'correct_answer' => $row['correct_answer'],
            'point_question' => $row['point_question'],
        ]);
    }
    public function rules(): array
    {
        return [
            'question' => ['required', 'unique:questions,question'],
            'answer_1' => 'required',
            'answer_2' => 'required',
            'answer_3' => 'required',
            'answer_4' => 'required',
            'correct_answer' => ['required', 'numeric', 'min:1'],
            'point_question' => ['required', 'numeric', 'min:1'],
        ];
    }
}
