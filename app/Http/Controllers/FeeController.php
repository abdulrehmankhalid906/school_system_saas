<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\FeeType;
use App\Models\Student;
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
            'fees' => FeePayment::with(['feetype','user'])->where('school_id', InitS::getSchoolid())->get(),
            'feetypes' => FeeType::get(),
            'classes' => Klass::where('school_id',InitS::getSchoolid())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $students = Student::with(['user' => function ($query) {
            $query->where('school_id', InitS::getSchoolid());
        }])->where([
            'klass_id' => $request->klass_id,
            'section_id' => $request->section_id,
        ])->get();

        if (!$this->validateTypeMonth($request->fee_type_id, InitS::getFeeMonth())) {
            return redirect()->back()->with('error', 'The monthly fee for this month cannot be created.');
        }

        foreach ($students as $student) {
            FeePayment::create([
                'user_id' => $student->user_id,
                'fee_type_id' => $request->fee_type_id,
                'fee_month' => InitS::getFeeMonth(),
                'due_date' => $request->due_date,
                'amount' => $this->getStudentFee($student->user_id),
                'school_id' => InitS::getSchoolid(),
                'status' => 'due',
                'balance_due' => $this->getStudentFee($student->user_id),
            ]);
        }

        return redirect()->back()->with('success', 'The fee has been generated');
    }

    function getStudentFee($user_id)
    {
        $fee_amount = Student::select('monthly_fee')->where('user_id', $user_id)->first();
        return $fee_amount->monthly_fee;
    }

    function validateTypeMonth($feeType, $month)
    {
        // Check the database for an existing record with fee_type_id = 1 and the same fee_month
        if ($feeType == 1) {
            $existingFee = FeePayment::where([
                ['fee_type_id', '=', $feeType],
                ['fee_month', '=', $month],
            ])->exists();

            // If a record exists, return false
            if ($existingFee) {
                return false;
            }
        }
        return true;
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

    public function feeHistory($id)
    {
        $fees = FeePayment::with('feehistories')->where('id', $id)->first();   //for time being remove feehistoies because there are no data in table
        $totalbalance = $this->getTotalAmount($id);

        $data = [
            'fees' => $fees,
            'balance' => $totalbalance
        ];

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function feesPayment(Request $request)
    {
        $fees = FeePayment::where('id', $request->id)->first();

    }

    function getTotalAmount($id)
    {
        $user_id = FeePayment::where('id', $id)->where('school_id', InitS::getSchoolid())->value('user_id'); //the value is used to get the single column
        $totalamount = FeePayment::where('user_id', $user_id)->sum('balance_due');
        return $totalamount;
    }
}
