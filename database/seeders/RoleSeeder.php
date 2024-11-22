<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Super Admin',
            'School',
            'Teacher',
            'Parent',
            'Student'
            // 'User'
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
