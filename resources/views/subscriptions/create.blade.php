@extends('layouts.app')
@section('title', 'Make Payment Subscription')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Create Subscription
                                </h4>
                                <form action="{{ route('subscriptions.store') }}" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <label for="methood" class="form-label">Select School</label>
                                            <select name="school_id" class="form-select" required>
                                                @foreach ($schools as $school)
                                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="methood" class="form-label">Select Method</label>
                                            <select name="payment_method" class="form-select" required>
                                                @foreach (InitS::payType() as $type)
                                                    <option value="{{ $type['type'] }}">{{ $type['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="amount" class="form-label">Enter Amount</label>
                                            <input type="number" name="amount" class="form-control" placeholder="Enter Amount" min="1" required>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="amount" class="form-label">Enter Days</label>
                                            <input type="number" name="days" class="form-control" placeholder="Enter Days" min="1" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-sm">Make Subscription</button>
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
</div>
@endsection
