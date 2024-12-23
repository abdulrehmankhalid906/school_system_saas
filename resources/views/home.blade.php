@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if(Auth::user()->hasRole('School'))
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="justify-content-between align-items-center flex-sm-row flex-column gap-10">
                                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                            <div class="card-title mb-6">
                                                <h5 class="text-nowrap mb-1">Schools</h5>
                                            </div>
                                            <div class="mt-sm-auto">
                                                <h4 class="mb-0">{{ $data['school'] }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="justify-content-between align-items-center flex-sm-row flex-column gap-10">
                                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                            <div class="card-title mb-6">
                                                <h5 class="text-nowrap mb-1">Teachers</h5>
                                            </div>
                                            <div class="mt-sm-auto">
                                                <h4 class="mb-0">{{ $data['teacher'] }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="justify-content-between align-items-center flex-sm-row flex-column gap-10">
                                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                            <div class="card-title mb-6">
                                                <h5 class="text-nowrap mb-1">Student</h5>
                                            </div>
                                            <div class="mt-sm-auto">
                                                <h4 class="mb-0">{{ $data['student'] }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xxl-12 order-2 order-md-3 order-xxl-2 mb-6">
                    <div class="card">
                        <div class="row row-bordered g-0">
                            <div class="col-lg-12">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div class="card-title mb-0">
                                        <h5 class="m-0 me-2">Total Admissions</h5>
                                    </div>
                                </div>
                                <canvas id="admissionChart" class="px-3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(Auth::user()->hasRole('Super Admin'))
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="justify-content-between align-items-center flex-sm-row flex-column gap-10">
                                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                            <div class="card-title mb-6">
                                                <h5 class="text-nowrap mb-1">Schools</h5>
                                            </div>
                                            <div class="mt-sm-auto">
                                                <h4 class="mb-0">{{ $data['school'] }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('footer_scripts')
<script src="{{ asset('assets/js/chart.js') }}"></script>
<script>
    const students = @json($students);

    const ctx = document.getElementById('admissionChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: students.map(s => s.month),
            datasets: [{
                label: 'Total Admissions',
                data: students.map(s => s.total_students),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
