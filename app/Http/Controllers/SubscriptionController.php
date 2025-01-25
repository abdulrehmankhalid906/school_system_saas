<?php

namespace App\Http\Controllers;

use App\Helpers\InitS;
use App\Models\School;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('subscriptions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::with('users')->get();

        return view('subscriptions.create',[
            'schools' => $schools
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $subscription = Subscription::create([
                'school_id' => $request->school_id,
                'start_date' => InitS::currentDate(),
                'type' => 'premium',
                'usage_type' => 'nonTrial',
                'payment_method' => $request->payment_method,
                'amount' => $request->amount,
                'status' => 'paid',
                'end_date' => now()->addDays((int)$request->days),
                'duration' => $request->days . 'Days',
            ]);

            School::where('id', $subscription->school_id)->update([
                'payment_status' => 'active',
            ]);

            DB::commit();

            return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to create subscription: ' . $e->getMessage());
        }
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
