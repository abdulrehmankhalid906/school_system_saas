<div class="row">
    <div class="col-12 col-sm-12 col-md-12 mb-4">
        <h4>Manage Fee</h4>
        <div class="table-responsive">
            <table id="example" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Fee Type</th>
                        <th>Due Date</th>
                        <th>Payment</th>
                        <th>Pay/Rem</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fees as $fee)
                        <tr id="row-{{ $fee->id }}">
                            <td>{{ $fee->id ?? '' }}</td>
                            <td>{{ $fee->user->name ?? '' }}</td>
                            <td>{{ $fee->feetype->title ?? '' }}</td>
                            <td>{{ $fee->due_date ?? '' }}</td>
                            <td>{{ Str::upper($fee->status ?? 'na') }}</td>
                            <td>{{ $fee->balance_due }}/{{ $fee->amount }}</td>
                            <td>
                                {{-- try to add the type to reduce the fucntions --}}
                                <button class="btn btn-primary btn-sm" onclick="feePayment({{ $fee->id }})">Pay</button>
                                <a href="javascript:void(0);" class="btn btn-secondary btn-sm" onclick="feepaymentHistory({{ $fee->id, 'history'}})">Pay History</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

