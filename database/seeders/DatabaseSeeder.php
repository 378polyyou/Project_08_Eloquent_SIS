<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    \App\Models\Teacher::factory(5)->create()->each(function ($teacher) {
        \App\Models\Course::factory(3)->create(['teacher_id' => $teacher->id]);
    });

    \App\Models\Student::factory(10)->create()->each(function ($student) {
        $courses = \App\Models\Course::inRandomOrder()->limit(2)->pluck('id');
        foreach ($courses as $course_id) {
            \App\Models\Register::factory()->create([
                'student_id' => $student->id,
                'course_id' => $course_id,
            ]);
        }
    });
}

}
