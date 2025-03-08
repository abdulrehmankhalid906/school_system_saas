
<div class="row justify-content-center mt-5">
    <div class="col-lg-3 col-md">
        <div class="card text-center single-pricing-pack py-5 px-2" style="border: 1px solid #00B074;">
            <h2 class="mb-2">{{ Str::upper($school->active_subscription->type ?? '' )}}</h2>
            <div class="card-body p-0">
                <ul class="list-unstyled text-md pricing-feature-list">
                    <li>Usage: {{ $school->active_subscription->usage_type ?? '' }}</li>
                    <li>Duration: {{ $school->active_subscription->duration ?? '' }}</li>
                    <li>Paymeny Method: {{ $school->active_subscription->payment_method ?? '' }}</li>
                    <li>Valid Till: {{ $school->active_subscription->end_date ?? '' }}</li>
                </ul>
                <div class="border-0 pricing-header">
                    <div class="h1 text-center mb-0 color-secondary"><span class="price font-weight-bolder"><small>PKR {{ $school->active_subscription->amount ?? '' }}</small></span></div>
                </div>
                <a class="btn btn-primary" href="javascript::void(0);">Active Package</a>
            </div>
        </div>
    </div>
</div>
