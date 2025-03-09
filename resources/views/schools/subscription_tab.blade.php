<div class="row g-6">
    <div class="col-lg">
        <div class="card border rounded shadow-none">
            <div class="card-body position-relative pt-4">
                <div class="position-absolute end-0 me-5 top-0 mt-4">
                    <span class="badge bg-label-primary rounded-1">Active</span>
                  </div>
                <h4 class="card-title text-center text-capitalize mb-1">{{ Str::upper($school->active_subscription->type ?? '' )}} ({{ $school->active_subscription->usage_type ?? '' }})</h4>
                <p class="text-center mb-5">Renewal After: {{ $school->active_subscription->end_date ?? '' }}</p>

                <div class="text-center h-px-50">
                    <div class="d-flex justify-content-center">
                        <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">PKR</sup>
                        <h1 class="mb-0 text-primary">{{ $school->active_subscription->amount ?? '' }}</h1>
                        <sub class="h6 text-body pricing-duration mt-auto mb-1 ms-1">{{ $school->active_subscription->duration ?? '' }}</sub>
                    </div>
                </div>

                <ul class="list-group my-5 pt-9">
                    <li class="mb-4 d-flex align-items-center">
                        <span class="badge p-50 w-px-10 h-px-10 rounded-pill bg-primary me-2"><i class="icon-base bx bx-check icon-xs"></i></span><span>Completely seperate and secure system</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center">
                        <span class="badge p-50 w-px-10 h-px-10 rounded-pill bg-primary me-2"><i class="icon-base bx bx-check icon-xs"></i></span><span>Unlimited student and teacher registeration</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center">
                        <span class="badge p-50 w-px-10 h-px-10 rounded-pill bg-primary me-2"><i class="icon-base bx bx-check icon-xs"></i></span><span>No hidden fee</span>
                    </li>
                    <li class="mb-4 d-flex align-items-center">
                        <span class="badge p-50 w-px-10 h-px-10 rounded-pill bg-primary me-2"><i class="icon-base bx bx-check icon-xs"></i></span><span>30 days validity</span>
                    </li>
                    <li class="mb-0 d-flex align-items-center">
                        <span class="badge p-50 w-px-10 h-px-10 rounded-pill bg-primary me-2"><i class="icon-base bx bx-check icon-xs"></i></span><span>Customer support 24/7</span>
                    </li>
                </ul>
                <a href="javascript::void(0);" class="btn btn-primary d-grid w-100">Your Current Plan</a>
            </div>
        </div>
    </div>
</div>
