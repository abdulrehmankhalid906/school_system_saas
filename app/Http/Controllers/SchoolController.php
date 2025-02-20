<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Helpers\InitS;
use App\Models\School;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Days;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::StudentAndTeacherCounts()->get();
        return view('schools.index',[
            'schools' => $schools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        try {
            $school = School::with('users')->findOrFail($id);

            if ($school->users->isNotEmpty()) {
                $school->delete();
            }

            $school->delete();
            return response()->json(['message' => 'The School and all the associated data have been Removed!']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'failure' => $e->getMessage()
            ], 500);
        }
    }

    public function billingHistory()
    {
        $singleSub = Subscription::where('school_id', InitS::getSchoolid())->first();
        $subscriptionHistory = Subscription::with('school')->where('usage_type', '!=', 'trial')->where('school_id', InitS::getSchoolid())->get();

        $subscription = [];
        $subscription['usage_type'] = $singleSub->usage_type;
        $subscription['status'] = $singleSub->status;
        $subscription['valid_till'] = \Carbon\Carbon::parse($singleSub->end_date)->format('M d, Y'); // Format the date
        $subscription['total_days'] = $this->getTotalDays($singleSub->start_date, $singleSub->end_date);
        $subscription['used_days'] = $this->getUsedDays($singleSub->start_date); // Renamed for clarity
        $subscription['remining_days'] = max(0, $subscription['total_days'] - $subscription['used_days']); // Ensure no negative days
        $subscription['progress_percentage'] = $this->getProgressPercentage($subscription['used_days'], $subscription['total_days']);

        return view('schools.billing_history', [
            'subscriptionHistory' => $subscriptionHistory,
            'subscription' => $subscription
        ]);
    }

    function getTotalDays($startdate, $enddate)
    {
        $diff = strtotime($enddate) - strtotime($startdate);
        return max(1, floor($diff / (60 * 60 * 24))); // Ensure at least 1 day for edge cases
    }

    function getUsedDays($startdate)
    {
        $diff = strtotime(InitS::currentDate()) - strtotime($startdate);
        return max(1, floor($diff / (60 * 60 * 24)) + 1); // Ensure at least 1 day if startdate is today
    }

    function getReminingDays($enddate)
    {
        $diff = strtotime($enddate) - strtotime(InitS::currentDate());
        return max(0, floor($diff / (60 * 60 * 24))); // Ensure no negative days
    }

    function getProgressPercentage($usedDays, $totalDays)
    {
        if ($totalDays <= 0) {
            return 0;
        }
        return min(100, round(($usedDays / $totalDays) * 100));
    }
}
