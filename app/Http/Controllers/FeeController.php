<?php

namespace App\Http\Controllers;

use App\Models\FeeType;
use App\Models\Klass;
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
}
