@extends('layouts.app')
@section('title', 'Create Expense')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title">Create Expense</h5>
                                <form method="POST" action="{{ route('expenses.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" id="title" name="title" class="form-control" required>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label" for="title">Amount</label>
                                            <input type="number" id="total_amount" name="total_amount" class="form-control" required>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label" for="title">Date</label>
                                            <input type="date" id="transaction_date" name="date" class="form-control" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="10" required></textarea>
                                        </div>

                                        <div class="text-start">
                                            <button type="submit" class="btn btn-primary me-3 mb-4">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
