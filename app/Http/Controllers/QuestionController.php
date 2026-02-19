<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view('questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questions.add_question');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create the question
        $question = new Question();
        $question->title = $request->title;
        $question->type = $request->type;
        $question->time = $request->time;
        $question->save();

        // Save answers
        foreach ($request->answers as $index => $answerText) {
            $question->answers()->create([
                'answer' => $answerText,
                'is_correct' => ($index == $request->correct_answer) ? 1 : 0,
            ]);
        }

        return redirect()->route('questions.index')->with('success', 'Question created successfully!');
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
