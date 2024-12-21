@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
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
                                            {{-- <span class="badge bg-label-warning">YEAR 2022</span> --}}
                                        </div>
                                        <div class="mt-sm-auto">
                                            {{-- <span class="text-success text-nowrap fw-medium"><i class="bx bx-up-arrow-alt"></i> 68.2%</span> --}}
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
                                            {{-- <span class="badge bg-label-warning">YEAR 2022</span> --}}
                                        </div>
                                        <div class="mt-sm-auto">
                                            {{-- <span class="text-success text-nowrap fw-medium"><i class="bx bx-up-arrow-alt"></i> 68.2%</span> --}}
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
                                            {{-- <span class="badge bg-label-warning">YEAR 2022</span> --}}
                                        </div>
                                        <div class="mt-sm-auto">
                                            {{-- <span class="text-success text-nowrap fw-medium"><i class="bx bx-up-arrow-alt"></i> 68.2%</span> --}}
                                            <h4 class="mb-0">{{ $data['student'] }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-12 col-sm-6 col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title mb-6">
                                            <h5 class="text-nowrap mb-1">Staff</h5>
                                            <span class="badge bg-label-warning">YEAR 2022</span>
                                        </div>
                                        <div class="mt-sm-auto">
                                            <span class="text-success text-nowrap fw-medium"><i class="bx bx-up-arrow-alt"></i> 68.2%</span>
                                            <h4 class="mb-0">$84,686k</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        {{-- {{ $students }} --}}

        @if(!Auth::user()->hasRole('Super Admin'))
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
                            {{-- <div class="col-lg-4 d-flex align-items-center">
                                <div class="card-body px-xl-9">
                                    <div class="text-center mb-6">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary">
                                                <script>
                                                    document.write(new Date().getFullYear() - 1);
                                                </script>
                                            </button>
                                            <button type="button"
                                                class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);">2021</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">2020</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">2019</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div id="growthChart"></div>
                                    <div class="text-center fw-medium my-6">62% Company Growth</div>

                                    <div class="d-flex gap-3 justify-content-between">
                                        <div class="d-flex">
                                            <div class="avatar me-2">
                                                <span class="avatar-initial rounded-2 bg-label-primary"><i
                                                        class="bx bx-dollar bx-lg text-primary"></i></span>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <small>
                                                    <script>
                                                        document.write(new Date().getFullYear() - 1);
                                                    </script>
                                                </small>
                                                <h6 class="mb-0">$32.5k</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="avatar me-2">
                                                <span class="avatar-initial rounded-2 bg-label-info"><i
                                                        class="bx bx-wallet bx-lg text-info"></i></span>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <small>
                                                    <script>
                                                        document.write(new Date().getFullYear() - 2);
                                                    </script>
                                                </small>
                                                <h6 class="mb-0">$41.2k</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
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
