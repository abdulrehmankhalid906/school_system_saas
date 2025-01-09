<div class="row">
    <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 mb-4">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="fee_payment_id" value="{{ $feePayment->id ?? '' }}">

                    <div class="mb-3">
                        <label for="amount_due" class="form-label">Total Amount Due</label>
                        <input type="text" id="amount_due" class="form-control" value="{{ $feePayment->balance_due ?? '' }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount to Pay</label>
                        <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Enter payment amount" min="1" max="{{ $feePayment->balance_due ?? '' }}" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

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

                    <div class="mb-3">
                        <label for="transaction_date" class="form-label">Transaction Date</label>
                        <input type="date" name="transaction_date" id="transaction_date" class="form-control @error('transaction_date') is-invalid @enderror" value="{{ now()->toDateString() }}" required>
                        @error('transaction_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Record Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>
