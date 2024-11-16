<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Klass;
use App\Models\School;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // SubjectSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class
        ]);

        // User::factory(10)->create()->each(function ($user) {
        //     $school = School::factory()->create([
        //         'user_id' => $user->id
        //     ]);
            
        //     // Create two classes for the school
        //     Klass::factory(2)->create([
        //         'school_id' => $school->id
        //     ])->each(function ($klass) use ($school) {
        //         // Create sections for each class
        //         Section::factory(3)->create([
        //             'klass_id' => $klass->id
        //         ]);
        //     });
        
        //     // Create 5 students for the school, assigned to random classes and sections
        //     Student::factory(5)->create([
        //         'school_id' => $school->id,
        //         'klass_id' => function () use ($school) {
        //             return Klass::where('school_id', $school->id)->inRandomOrder()->first()->id; // Assign to a random class
        //         },
        //         'section_id' => function () use ($school) {
        //             // Get a random section from the selected class
        //             $klassId = Klass::where('school_id', $school->id)->inRandomOrder()->first()->id;
        //             $sectionIds = Section::where('klass_id', $klassId)->pluck('id')->toArray();
        //             return Arr::random($sectionIds); // Randomly assign a section
        //         }
        //     ]);
        // });
             

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
