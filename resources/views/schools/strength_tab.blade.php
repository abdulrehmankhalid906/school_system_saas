<div class="row">
    <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="card" style="border: 1px solid black;">
                    <div class="card-body">
                        <div class="justify-content-between align-items-center flex-sm-row flex-column gap-10">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title mb-6">
                                    <h5 class="text-nowrap mb-1">Total Students</h5>
                                </div>
                                <div class="mt-sm-auto">
                                    <h4 class="mb-0">{{ $school->students ?? 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="card" style="border: 1px solid black;">
                    <div class="card-body">
                        <div class="justify-content-between align-items-center flex-sm-row flex-column gap-10">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title mb-6">
                                    <h5 class="text-nowrap mb-1">Total Students</h5>
                                </div>
                                <div class="mt-sm-auto">
                                    <h4 class="mb-0">{{ $school->teachers ?? 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
