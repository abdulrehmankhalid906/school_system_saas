<?php

namespace App\Imports;

use App\Models\User;
use App\Helpers\InitS;
use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StudentUserImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    protected $klass_id;
    protected $section_id;

    public function __construct($klass_id, $section_id)
    {
        $this->klass_id = $klass_id;
        $this->section_id = $section_id;
    }

    public function collection(Collection $collection)
    {
        DB::transaction(function () use ($collection) {

            foreach($collection as $row)
            {
                $dateOfBirth = null;

                // Check if date_of_birth is a number (Excel Serial Date)
                if (!empty($row['date_of_birth'])) {
                    if (is_numeric($row['date_of_birth'])) {
                        // Convert Excel date to Y-m-d format
                        $dateOfBirth = Carbon::instance(Date::excelToDateTimeObject($row['date_of_birth']))->format('Y-m-d');
                    } else {
                        $dateOfBirth = Carbon::parse($row['date_of_birth'])->format('Y-m-d');
                    }
                }

                $user = User::create([
                    'name' => $row['name'] ?? NULL,
                    'email' => $row['email'] ?? $this->createUniqueEmail($row['name'] ?? 'Name'),
                    'password' => bcrypt($row['password'] ?? '12345678'),
                    'school_id' => InitS::getSchoolid(),
                    'phone' => $row['phone'] ?? NULL,
                    'address' => $row['address'] ?? NULL,
                ]);

                $user->syncRoles('Student');

                Student::create([
                    'user_id' => $user->id,
                    'klass_id' => $this->klass_id,
                    'section_id' => $this->section_id,
                    'monthly_fee' => $row['monthly_fee'] ?? 0,
                    'date_of_birth' => $dateOfBirth,
                    'gender' => $row['gender'] ?? '',
                    'enrollment_date' => now(),
                    'session' => InitS::getSession(),
                    'roll_no' => $row['roll_no'] ?? InitS::getRollNo($user->id)
                ]);
            }
        });
    }

    function createUniqueEmail($name)
    {
        $formattedName = str_replace(' ', '-', strtolower($name));
        $formattedName = preg_replace('/[^a-z0-9-]/', '', $formattedName);

        $uniqueIdentifier = uniqid();
        return $formattedName . '-' . $uniqueIdentifier . '@gmail.com';
    }
}
