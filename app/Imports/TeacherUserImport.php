<?php

namespace App\Imports;

use App\Models\User;
use App\Helpers\InitS;
use App\Models\Teacher;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherUserImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        DB::transaction(function () use ($collection) {
            foreach ($collection as $row)
            {
                $user = User::create([
                    'name' => $row['name'],
                    'email' => $row['email'] ?? '',
                    'password' => Hash::make($row['password'] ?? '123456789'),
                    'school_id' => InitS::getSchoolid()
                ]);

                $user->syncRoles('Teacher');

                Teacher::create([
                    'user_id' => $user->id,
                    'salary' => $row['salary'] ?? NULL,
                    'join_date' => now()
                ]);
            }
        });
    }
}
