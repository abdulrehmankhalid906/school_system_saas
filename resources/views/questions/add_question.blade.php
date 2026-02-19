@extends('layouts.app')
@section('title', 'Create Questions')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title mb-4">Create Question</h5>
                    <form method="POST" action="{{ route('questions.store') }}" autocomplete="off">
                        @csrf
                        <div class="row g-3">

                            <!-- Question Title -->
                            <div class="col-md-4">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" value="What is time?" required>
                            </div>

                            <!-- Question Type -->
                            <div class="col-md-4">
                                <label class="form-label" for="type">Type</label>
                                <input type="text" id="type" name="type" class="form-control" value="mcq" required>
                            </div>

                            <!-- Time -->
                            <div class="col-md-4">
                                <label class="form-label" for="time">Time (seconds)</label>
                                <input type="text" id="time" name="time" class="form-control" value="10" required>
                            </div>

                            <hr class="my-4">

                            <!-- Answers -->
                            <div class="col-md-6">
                                <label class="form-label" for="answer1">Answer 1</label>
                                <input type="text" id="answer1" name="answers[]" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="answer2">Answer 2</label>
                                <input type="text" id="answer2" name="answers[]" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="answer3">Answer 3</label>
                                <input type="text" id="answer3" name="answers[]" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="answer4">Answer 4</label>
                                <input type="text" id="answer4" name="answers[]" class="form-control" required>
                            </div>

                            <!-- Correct Answer -->
                            <div class="col-md-6 mt-3">
                                <label class="form-label" for="correct_answer">Correct Answer</label>
                                <select class="form-select" id="correct_answer" name="correct_answer" required>
                                    <option value="" selected disabled>Select correct answer</option>
                                    <option value="0">Answer 1</option>
                                    <option value="1">Answer 2</option>
                                    <option value="2">Answer 3</option>
                                    <option value="3">Answer 4</option>
                                </select>
                            </div>

                            <!-- Submit -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary">Create Question</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
