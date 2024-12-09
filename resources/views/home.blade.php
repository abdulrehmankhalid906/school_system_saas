@extends('layouts.app')
@section('title', 'Dashboard | Soan Garden High School')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title mb-6">
                                            <h5 class="text-nowrap mb-1">Students</h5>
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
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title mb-6">
                                            <h5 class="text-nowrap mb-1">Teacher</h5>
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
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title mb-6">
                                            <h5 class="text-nowrap mb-1">Parents</h5>
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
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 mb-4">
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
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-6">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-lg-8">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="card-title mb-0">
                                    <h5 class="m-0 me-2">Total Revenue</h5>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="totalRevenue"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="totalRevenue">
                                        <a class="dropdown-item" href="javascript:void(0);">Select
                                            All</a>
                                        <a class="dropdown-item"
                                            href="javascript:void(0);">Refresh</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                    </div>
                                </div>
                            </div>
                            <div id="totalRevenueChart" class="px-3"></div>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center">
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
                                            <li><a class="dropdown-item"
                                                    href="javascript:void(0);">2021</a></li>
                                            <li><a class="dropdown-item"
                                                    href="javascript:void(0);">2020</a></li>
                                            <li><a class="dropdown-item"
                                                    href="javascript:void(0);">2019</a></li>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
