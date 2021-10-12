<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'question' => $this->faker->text(),
            'answer_1' => $this->faker->text(),
            'answer_2' => $this->faker->text(),
            'answer_3' => $this->faker->text(),
            'answer_4' => $this->faker->text(),
            'correct_answer' => $this->faker->numberBetween(1,4),
            'point_question' => 2,
        ];
    }
}
