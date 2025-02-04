<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
         */
    public function definition(): array
    {
        return [
            'course_code' => 'C' . $this->faker->unique()->numberBetween(100, 999),
            'name' => $this->faker->word() . " Course",
            'credits' => $this->faker->numberBetween(1, 5),
            'teacher_id' => Teacher::factory(),
        ];
    }
}
