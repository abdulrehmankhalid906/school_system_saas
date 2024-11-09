<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = 
        [
            [
                'course_name'               =>  'English',
                'course_code'               =>  NULL,
                'course_description'        =>  NULL,
            ],
            [
                'course_name'               =>  'Urdu',
                'course_code'               =>  NULL,
                'course_description'        =>  NULL,
            ],
            [
                'course_name'               =>  'Math',
                'course_code'               =>  NULL,
                'course_description'        =>  NULL,
            ],
            [
                'course_name'               =>  'Science',
                'course_code'               =>  NULL,
                'course_description'        =>  NULL,
            ],
            [
                'course_name'               =>  'Chemistry',
                'course_code'               =>  NULL,
                'course_description'        =>  NULL,
            ],
        ];

        foreach($subjects as $subject)
        {
            Subject::create($subject);
        }
    }
}
