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
                                    Bulk Fee
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-singlefee" aria-controls="navs-top-singlefee" aria-selected="true">
                                    Single Fee
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-managefee" aria-controls="navs-top-managefee" aria-selected="false" tabindex="-1">
                                    Fee Mange
                                </button>
                            </li>
                            <li class="nav-item" role="presentation" id="paymentTab" style="display:none;">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-totalfee" aria-controls="navs-top-totalfee" aria-selected="false" tabindex="-1">
                                    Payment
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
                                @include('fees.payment_tab')
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

        $(document).ready(function () {
            $(document).on('change', '.fee-type-select', function () {
                var fee_type_id = $(this).val();
                var storeIds = ["2", "3", "4"]; // Array of IDs
                var wrapperId = $(this).attr('id') === 'fee_type_id_bulk' ? '#fee_ammount_wrapper_bulk' : '#fee_ammount_wrapper_single';

                if (storeIds.includes(fee_type_id)) {
                    $(wrapperId).show();
                    $(wrapperId + ' input').prop('required', true);
                } else {
                    $(wrapperId).hide();
                    $(wrapperId + ' input').prop('required', false);
                }
            });


            $('#section_id2').change(function(){
                var sectionId = $(this).val();
                var optionsI = '';

                $.ajax({
                    url: "{{ route('get.students') }}",
                    type: "GET",
                    dataType: 'JSON',
                    data:
                        {
                            sectionId:sectionId
                        },
                    cache: false,
                    success: function(ress)
                    {
                        console.log(ress);
                        if (ress.status === 200)
                        {
                            optionsI += `<option value="" selected>Select One</option>`;
                            for (let index = 0; index < ress.data.length; index++)
                            {
                                optionsI += `<option value="${ress.data[index].user_id}">${ress.data[index].user.name}</option>`;
                            }

                            $('#student_id').html(optionsI);
                        } else {
                            console.log('somethind went wrong');
                        }
                    },
                    error: function()
                    {
                        //
                    },
                });
            });
        });

        function feePayment(id)
        {
            $.ajax({
                url: "{{ url('fee-history') }}/" + id,
                type: "GET",
                data: {
                    id: id,
                    //type: type
                },
                success: function(response) {
                    console.log(response);

                    // Show the Payment tab
                    document.getElementById('paymentTab').style.display = 'block';

                    // Switch to the Payment tab
                    let paymentTab = document.querySelector('[data-bs-target="#navs-top-totalfee"]');
                    let bootstrapTab = new bootstrap.Tab(paymentTab);
                    bootstrapTab.show();
                },
                error: function(error)
                {
                    console.log(error);
                }
            });
        }

        // Listen for tab change events
        document.querySelectorAll('.nav-link').forEach(tab => {
            tab.addEventListener('shown.bs.tab', function(event) {
                // If leaving the Payment tab, hide it
                if (event.relatedTarget && event.relatedTarget.getAttribute('data-bs-target') === '#navs-top-totalfee') {
                    document.getElementById('paymentTab').style.display = 'none';
                }
            });
        });
    </script>
@endpush
