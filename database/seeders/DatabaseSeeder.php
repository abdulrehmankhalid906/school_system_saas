<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Klass;
use App\Models\School;
use App\Models\Section;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     SubjectSeeder::class,
        //     RoleSeeder::class,
        //     PermissionSeeder::class
        // ]);
        // \App\Models\User::factory(10)->create();
        // \App\Models\School::factory(10)->create();

        User::factory(10)->create()->each(function ($user) {
            $school = School::factory()->create([
                'user_id' => $user->id
            ]);
            
            Klass::factory(2)->create([
                'school_id' => $school->id
            ])->each(function ($klass) {
                Section::factory(2)->create([
                    'klass_id' => $klass->id
                ]);
            });
        });
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
