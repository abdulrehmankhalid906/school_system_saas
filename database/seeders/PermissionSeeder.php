<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Manage Roles',
            'Manage Permissions',
            'Manage Users',
            'Manage Schools',
            'Manage Parents',
            'Manage Teachers',
            'Manage Profile',
            'Manage Students',
            'Manage Site',
            'Manage Attendance',
            'Manage Fees',
            'Manage Exams',
            'Manage Subjects',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
