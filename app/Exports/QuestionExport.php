<?php

namespace App\Exports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QuestionExport implements FromCollection, WithHeadings ,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Question::all();
    }

    public function map($question): array
    {
        return [
            $question->question,
            $question->answer_1,
            $question->answer_2,
            $question->answer_3,
            $question->answer_4,
            $question->correct_answer,
            $question->point_question,
        ];
    }

    public function headings(): array
    {
        return [
           'question',
           'answer_1',
           'answer_2',
           'answer_3',
           'answer_4',
           'correct_answer',
           'point_question',
        ];
    }
}
