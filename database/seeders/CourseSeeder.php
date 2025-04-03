<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'courseTitle' => 'Biology',
                'courseDescription' => 'Study of living organisms.'
            ],
            [
                'courseTitle' => 'Chemistry',
                'courseDescription' => 'Fundamentals of chemical reactions.'
            ],
            [
                'courseTitle' => 'Physics',
                'courseDescription' => 'Principles of motion and energy.'
            ],
            [
                'courseTitle' => 'Mathematics',
                'courseDescription' => 'Algebra and geometry for high school.'
            ],
            [
                'courseTitle' => 'History',
                'courseDescription' => 'World and regional historical events.'
            ],
            [
                'courseTitle' => 'Geography',
                'courseDescription' => 'Physical and human geography.'
            ],
            [
                'courseTitle' => 'Civics',
                'courseDescription' => 'Government and citizenship studies.'
            ]
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
