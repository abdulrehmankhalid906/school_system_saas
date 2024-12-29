@extends('layouts.app')
@section('title', 'Generate Fee')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 mb-4">
                    <div class="row g-6">
                        <div class="alert alert-primary" role="alert">It will create the fee challen for the NOV 2024!</div>
                    </div>
                    <form action="{{ route('payments.store') }}" method="POST">
                        @csrf

                        {{-- Hidden Field for Fee Payment ID --}}
                        <input type="hidden" name="fee_payment_id" value="{{ $feePayment->id }}">

                        {{-- Fee Details --}}
                        <div class="mb-3">
                            <label for="amount_due" class="form-label">Total Amount Due</label>
                            <input type="text" id="amount_due" class="form-control" value="{{ $feePayment->balance_due }}" readonly>
                        </div>

                        {{-- Payment Amount --}}
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount to Pay</label>
                            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Enter payment amount" min="1" max="{{ $feePayment->balance_due }}" required>
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Payment Method --}}
                        <div class="mb-3">
                            <label for="method" class="form-label">Payment Method</label>
                            <select name="method" id="method" class="form-select @error('method') is-invalid @enderror" required>
                                <option value="" disabled selected>Select a method</option>
                                <option value="cash">Cash</option>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="card">Card</option>
                                <option value="online">Online</option>
                            </select>
                            @error('method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Transaction Date --}}
                        <div class="mb-3">
                            <label for="transaction_date" class="form-label">Transaction Date</label>
                            <input type="date" name="transaction_date" id="transaction_date" class="form-control @error('transaction_date') is-invalid @enderror" value="{{ now()->toDateString() }}" required>
                            @error('transaction_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-primary">Record Payment</button>
                        <a href="{{ route('fee-payments.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
