<div class="row">
    <div class="col-12 col-sm-12 col-md-12 mb-4">
        <h4>Manage Fee  (on this tab add API)</h4>
        <div class="card">
            <div class="card-body">
                <table id="example" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Fee Type</th>
                            <th>Due Date</th>
                            <th>Payment</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fees as $fee)
                            <tr id="row-{{ $fee->id }}">
                                <td>{{ $fee->user->name ?? '' }}</td>
                                <td>{{ $fee->feetype->title ?? '' }}</td>
                                <td>{{ $fee->due_date ?? '' }}</td>
                                <td>{{ Str::upper($fee->status ?? 'na') }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="feePayment({{ $fee->id }})">Pay</button>
                                    <a href="javascript:void(0);" class="btn btn-secondary btn-sm">Pay History</a>
                                    {{-- <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $fee->id }}, 'exams')">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

