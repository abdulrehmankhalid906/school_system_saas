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
                                    <h4 class="mb-0 total_payable_amount">145,000</h4>
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
                                    <h5 class="text-nowrap mb-1">Arrears Amount</h5>
                                </div>
                                <div class="mt-sm-auto">
                                    <h4 class="mb-0 overall_rem_amount">200,000</h4> (<span class="term_rem_amount">1200</span>)
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
            <input type="text" class="fee_payment_id" name="fee_payment_id">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="amount" class="form-label">Enter Amount</label>
                    <input type="text" name="amount" id="input_amount" class="form-control" placeholder="Enter Amount" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="methood" class="form-label">Select Method</label>
                    <select name="method" id="method" class="form-select" required>
                        <option value="" disabled selected>Select a method</option>
                        <option value="cash">Cash</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="card">Card</option>
                        <option value="online">Online</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="transaction_date" class="form-label">Payment Date</label>
                    <input type="date" name="transaction_date" id="transaction_date" class="form-control" placeholder="Enter Field 3" required>
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
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Payment Date</th>
                        </tr>
                    </thead>
                    <tbody class="paymentHistory"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
