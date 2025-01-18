<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Helpers\InitS;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = $this->filterDate();
        $roles = ['Teacher', 'Student'];
        $data = array_combine(
            array_map('strtolower', $roles),
            array_map(fn($role) => User::where('school_id', InitS::getSchoolid())->role($role)->count(), $roles)
        );
        return view('home',[
            'data' => $data,
            'students' => $students ?? [],
            'schools' => School::count()
        ]);
    }

    function filterDate()
    {
        $currentYear = now()->year;

        $studentsPerMonth = Student::with('user')
            ->selectRaw('MONTH(enrollment_date) AS month, COUNT(*) AS total_students')
            ->whereYear('enrollment_date', $currentYear)
            ->whereHas('user', function($query) {
                $query->where('school_id', InitS::getSchoolid());
            })
            ->groupByRaw('MONTH(enrollment_date)')
            ->orderByRaw('MONTH(enrollment_date)')
            ->get();

        $studentsPerMonth = $studentsPerMonth->map(function ($item) {
            return [
                'month' => Carbon::create()->month($item->month)->format('F'),
                'total_students' => $item->total_students,
            ];
        });

        return $studentsPerMonth;
    }
}
