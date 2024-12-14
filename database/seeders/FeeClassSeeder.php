<?php

namespace Database\Seeders;

use App\Models\ClassFee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classfees = [
            [
                'klass_id' => 1,
                'class_fee' => 2500,
                'school_id' => 1
            ],
            [
                'klass_id' => 2,
                'class_fee' => 3000,
                'school_id' => 1
            ]
        ];

        foreach($classfees as $classfee)
        {
            ClassFee::create([
                'klass_id' => $classfee['klass_id'],
                'class_fee' => $classfee['class_fee'],
                'school_id' => $classfee['school_id'],
            ]);
        }
    }
}
