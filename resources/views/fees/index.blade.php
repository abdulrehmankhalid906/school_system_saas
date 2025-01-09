@extends('layouts.app')
@section('title', 'Generate Fee')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
            <div class="row">
                <div class="col-xl-12">
                    <div class="nav-align-top nav-tabs-shadow mb-6">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-bulkfee" aria-controls="navs-top-bulkfee" aria-selected="true">
                                    Generate Bulk Fee
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-singlefee" aria-controls="navs-top-singlefee" aria-selected="true">
                                    Generate Single Fee
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-managefee" aria-controls="navs-top-managefee" aria-selected="false" tabindex="-1">
                                    Class Fee Settings
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-totalfee" aria-controls="navs-top-totalfee" aria-selected="false" tabindex="-1">
                                    Totals
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="navs-top-bulkfee" role="tabpanel">
                                @include('fees.create_bulk_fee_tab')
                            </div>
                            <div class="tab-pane fade" id="navs-top-singlefee" role="tabpanel">
                                @include('fees.create_single_fee_tab')
                            </div>
                            <div class="tab-pane fade" id="navs-top-managefee" role="tabpanel">
                                @include('fees.manage_fee_tab')
                            </div>
                            <div class="tab-pane fade" id="navs-top-totalfee" role="tabpanel">
                                @include('fees.fee_payment')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer_scripts')
    <script>
        function feePayment(id)
        {
            $.ajax({
                url: "{{ url('fee-history') }}/" + id,
                type: "GET",
                data: {
                    id: id,
                    //type: type
                },
                success: function(response)
                {
                    console.log(response);
                },
                error: function(error)
                {
                    console.log(error);
                }
            });
        }
    </script>
@endpush
