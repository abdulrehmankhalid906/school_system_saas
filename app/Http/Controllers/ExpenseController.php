<?php

namespace App\Http\Controllers;

use App\Helpers\InitS;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::where('school_id', InitS::getSchoolid())->get();
        return view('expenses.index', [
            'expenses' => $expenses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.new_expenses');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['school_id'] = InitS::getSchoolid();

        Expense::create($data);

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully');
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
        $expense = Expense::where('school_id', InitS::getSchoolid())->find($id);
        return view('expenses.edit_expenses', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expense = Expense::where('school_id', InitS::getSchoolid())->find($id);
        $expense->update($request->all());

        return redirect()->route('expenses.edit', $expense->id)->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::where('school_id', InitS::getSchoolid())->find($id);
        $expense->delete();
    }
}
