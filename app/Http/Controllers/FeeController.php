<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\ClassFee;
use App\Models\FeeType;
use App\Models\Student;
use App\Models\FeePayment;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        return view('fees.generate_fee',[
            'feetypes' => FeeType::get(),
            'classes' => Klass::get()
        ]);
    }

    public function generateFee(Request $request)
    {
        //dd($request->all());
        $students = Student::with(['user' => function ($query) {
            $query->where('school_id', InitS::getSchoolid());
        }])->where([
            'klass_id' => $request->klass_id,
            'section_id' => $request->section_id,
        ])->get();


        $fees = ClassFee::where('klass_id', $request->klass_id)->first();

        if(!$fees)
        {
            $fees = 2500;
        }

        foreach($students as $student)
        {
            FeePayment::create([
                'user_id' => $student->user_id,
                'fee_type_id' => $request->fee_type_id,
                'fee_month' => InitS::getFeeMonth(),
                'due_date' => $request->due_date,
                'amount' => $fees->class_fee ?? $fees,
                'school_id' => InitS::getSchoolid(),
                'status' => 'due',
            ]);
        }


        return redirect()->back()->with('success', 'The fee has been generated');
    }
}
