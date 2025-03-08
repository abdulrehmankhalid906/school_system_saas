@extends('layouts.app')
@section('title', 'Dashboard | Mange School')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
            <div class="row">
                <div class="col-xl-12">
                    <div class="nav-align-top nav-tabs-shadow mb-6">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                                    Profile
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-strength" aria-controls="navs-top-strength" aria-selected="true">
                                    Strength
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-subscription" aria-controls="navs-top-subscription" aria-selected="false" tabindex="-1">
                                    Subscription
                                </button>
                            </li>
                            {{-- <li class="nav-item" role="presentation" id="paymentTab" style="display:none;">
                                <button type="button" id="paymentBtnName" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-totalfee" aria-controls="navs-top-totalfee" aria-selected="false" tabindex="-1">
                                    Payment
                                </button>
                            </li> --}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="navs-top-profile" role="tabpanel">
                                @include('schools.profile_tab')
                            </div>
                            <div class="tab-pane fade" id="navs-top-strength" role="tabpanel">
                                @include('schools.strength_tab')
                            </div>
                            <div class="tab-pane fade" id="navs-top-subscription" role="tabpanel">
                                @include('schools.subscription_tab')
                            </div>
                            {{-- <div class="tab-pane fade" id="navs-top-totalfee" role="tabpanel">
                                @include('')
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
