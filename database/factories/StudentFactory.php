<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'student_id' => 'STU' . $this->faker->unique()->numberBetween(1000, 9999),
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
    ];
}

}
