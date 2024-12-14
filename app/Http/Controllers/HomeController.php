<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $roles = ['School', 'Teacher', 'Student'];
        $data = array_combine(
            array_map('strtolower', $roles),
            array_map(fn($role) => User::role($role)->count(), $roles)
        );
        //dd($data);
        return view('home', compact('data'));
    }
}
