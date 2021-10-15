<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class QuestionImport implements ToModel,WithChunkReading,WithBatchInserts ,SkipsEmptyRows, WithHeadingRow, SkipsOnFailure, WithValidation
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
    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
