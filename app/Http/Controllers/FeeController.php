<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\FeeType;
use App\Models\Student;
use App\Models\ClassFee;
use App\Models\FeePayment;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fees.generate_fee',[
            'feetypes' => FeeType::get(),
            'classes' => Klass::where('school_id',InitS::getSchoolid())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $students = Student::with(['user' => function ($query) {
            $query->where('school_id', InitS::getSchoolid());
        }])->where([
            'klass_id' => $request->klass_id,
            'section_id' => $request->section_id,
        ])->get();


        // $fees = ClassFee::where('klass_id', $request->klass_id)->first();

        // if(!$fees)
        // {

        // }

        foreach($students as $student)
        {
            FeePayment::create([
                // 'balance_due'
                'user_id' => $student->user_id,
                'fee_type_id' => $request->fee_type_id,
                'fee_month' => InitS::getFeeMonth(),
                'due_date' => $request->due_date,
                'amount' => $this->getStudentFee($student->user_id),
                'school_id' => InitS::getSchoolid(),
                'status' => 'due',
            ]);
        }


        return redirect()->back()->with('success', 'The fee has been generated');
    }


    function getStudentFee($user_id)
    {
        $baseFee = Student::select('monthly_fee')->where('user_id', $user_id)->first();
        $otherFees = FeePayment::where('user_id', $user_id)->where('fee_month', InitS::getFeeMonth())->sum('amount');

        return [
            $baseFee,
            $otherFees
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
