<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\FeeType;
use App\Models\Student;
use App\Models\FeeHistory;
use App\Models\FeePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fees.index',[
            'fees' => FeePayment::with(['feetype','user'])->where('school_id', InitS::getSchoolid())->get(),
            'feetypestab1' => FeeType::whereIn('id', [1,2])->get(),
            'feetypestab2' => FeeType::whereIn('id', [3,4])->get(),
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
                'amount' => $request->fee_type_id == 2 ? $request->fee_ammount : $this->getStudentFee($student->user_id),
                'school_id' => InitS::getSchoolid(),
                'status' => 'due',
                'balance_due' => $request->fee_type_id == 2 ? $request->fee_ammount : $this->getStudentFee($student->user_id),
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
        $fees = FeePayment::with(['user','feehistories'])->where('id', $id)->first();
        $reminingbalance = $this->getReminingAmount($id);

        $data = [
            'fees' => $fees,
            'rembalance' => $reminingbalance
        ];

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }


    public function singleFeeStore(Request $request)
    {
        FeePayment::create([
            'user_id' => $request->student_id,
            'fee_type_id' => $request->fee_type_id,
            'fee_month' => InitS::getFeeMonth(),
            'due_date' => $request->due_date,
            'amount' => $request->fee_ammount,
            'school_id' => InitS::getSchoolid(),
            'status' => 'due',
            'balance_due' => $request->fee_ammount
        ]);

        return redirect()->back()->with('success', 'The fee has been generated');
    }

    public function feesPayment(Request $request)
    {
        DB::beginTransaction();

        try {
            $feePayment = FeePayment::find($request->fee_payment_id);

            if (!$feePayment || $request->amount > $feePayment->balance_due) {
                return redirect()->back()->with('error', 'Invalid payment amount or record not found.');
            }

            $history = FeeHistory::create([
                'fee_payment_id' => $request->fee_payment_id,
                'amount' => $request->amount,
                'method' => $request->method,
                'transaction_date' => $request->transaction_date,
            ]);

            // Calculate the new balance due
            $calculationAmount = $feePayment->balance_due - $history->amount;

            if ($calculationAmount < 0) {
                throw new \Exception('Payment exceeds the due balance.');
            }

            $status = $calculationAmount == 0 ? 'paid' : $feePayment->status;

            $feePayment->update([
                'balance_due' => $calculationAmount,
                'status' => $status
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Your payment has been processed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    function checkPaymentStatus()
    {
        //
    }

    function getReminingAmount($id)
    {
        $user_id = FeePayment::where('id', $id)->where('school_id', InitS::getSchoolid())->value('user_id'); //the value is used to get the single column
        $remamount = FeePayment::where('user_id', $user_id)->sum('balance_due');
        return $remamount;
    }
}
