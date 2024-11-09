<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'Abdul Rehman Khalid', 'parent_name' => 'Khalid Mehmood',
                'cnic' => '37201-232323' , 'dob' => '23 Jan 2020', 'admission_date' => '23-02-2024' 
            ],
            [
                'name' => 'Hamza Ali', 'parent_name' => 'Ali Khan',
                'cnic' => '37941-232323' , 'dob' => '09 Mar 2016', 'admission_date' => '23-02-2016' 
            ]
        ];

        foreach($students as $student)
        {
            Student::create($student);
        }
    }
}
