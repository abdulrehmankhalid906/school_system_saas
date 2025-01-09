<style>
    .card{
        border: 0.5px solid black;
    }
</style>

<div class="row">
    <div class="col-6">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="justify-content-between align-items-center flex-sm-row flex-column gap-10">
                            <div class="flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title mb-6">
                                    <h5 class="text-nowrap mb-1">Total Amount</h5>
                                </div>
                                <div class="mt-sm-auto">
                                    <h4 class="mb-0">145,000</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="justify-content-between align-items-center flex-sm-row flex-column gap-10">
                            <div class="flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title mb-6">
                                    <h5 class="text-nowrap mb-1">Remining Amount</h5>
                                </div>
                                <div class="mt-sm-auto">
                                    <h4 class="mb-0">200,000</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="fee_payment_id" value="{{ $feePayment->fee_payment_id ?? '' }}">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="amount" class="form-label">Enter Amount</label>
                    <input type="text" name="amount" id="input_amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Enter Amount" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="methood" class="form-label">Select Method</label>
                    <select name="method" id="method" class="form-select @error('method') is-invalid @enderror" required>
                        <option value="" disabled selected>Select a method</option>
                        <option value="cash">Cash</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="card">Card</option>
                        <option value="online">Online</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="transaction_date" class="form-label">Payment Date</label>
                    <input type="date" name="transaction_date" id="transaction_date" class="form-control @error('field_3') is-invalid @enderror" placeholder="Enter Field 3" required>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">Pay</button>
                </div>
            </div>
        </form>
    </div>


    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 mb-4">
            <h4>Payment History</h4>
            <div class="table-responsive">
                <table id="example" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Fee Type</th>
                            <th>Due Date</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
