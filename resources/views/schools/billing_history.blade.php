@extends('layouts.app')
@section('title', 'Dashboard | Subscription History')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row row-gap-6">
                                    <div class="col-md-6 mb-1">
                                        <div class="mb-6">
                                            <h4 class="mb-1">Your Current Plan </h4>&nbsp;<span class="badge rounded-pill bg-primary">{{ Str::upper($subscription['usage_type'] ?? '') }}</span>
                                        </div>
                                        <div class="mb-6">
                                            <h6 class="mb-1">Active until {{  $subscription['valid_till'] ?? '' }}</h6>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="alert alert-primary mb-6" role="alert" style="border:1px solid #696cff;">
                                            <h5 class="alert-heading mb-1 d-flex align-items-center gap-2">
                                                <span class="alert-icon rounded-circle"><i class="icon-base bx bx-check icon-md"></i></span>
                                                <span>Active Subscription!</span>
                                            </h5>
                                        </div>

                                        <div class="plan-statistics">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1">Days</h6>
                                                <h6 class="mb-1">{{ $subscription['used_days'] }} of Days {{ $subscription['total_days'] }}</h6>
                                            </div>
                                            <div class="progress rounded mb-1">
                                                <div class="progress-bar rounded" role="progressbar" style="width: {{ $subscription['progress_percentage'] }}%;" aria-valuenow="{{ $subscription['progress_percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small>{{ $subscription['remining_days'] == 1 ? $subscription['remining_days'].' day' : $subscription['remining_days'].' days' }} remaining until your plan requires update</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <h5 class="card-header">Billing History</h5>
                            <div class="card-body">
                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Package</th>
                                            <th>Package Type</th>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Validity / Days</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscriptionHistory as $subHistory)
                                            <tr id="id-{{ $subHistory->id }}">
                                                <td>{{ Str::upper($subHistory->type ?? '') }}</td>
                                                <td>{{ Str::upper($subHistory->usage_type ?? '') }}</td>
                                                <td>{{ Str::upper($subHistory->payment_method ?? '') }}</td>
                                                <td>{!! $subHistory->amount != null ? "<span class='badge bg-success'>Paid</span>" : '' !!}
                                                <td>{{ $subHistory->end_date ?? '' }} / {{ $subHistory->duration ?? '' }}</td>
                                            </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
