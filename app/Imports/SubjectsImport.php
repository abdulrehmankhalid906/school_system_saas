<?php

namespace App\Imports;

use App\Helpers\InitS;
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\ToModel;

class SubjectsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Subject([
            'course_name' => $row[0],
            'course_code' => $row[1],
            'school_id' => InitS::getSchoolid()
        ]);
    }
}
