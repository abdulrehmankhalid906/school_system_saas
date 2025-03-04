@extends('layouts.app')
@section('title', 'Dashboard | Mark Student Attendance')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Attendance Sheet
                                </h4>

                                <div class="row g-6">
                                    <form class="p-3 d-block" autocomplete="off">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label" for="klass_id">Class <span class="text-danger">*</span></label>
                                                <select id="klass_id" class="form-control select2" required>
                                                    <option value="">Select Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label" for="section_id">Section <span class="text-danger">*</span></label>
                                                <select id="section_id" class="form-control select2" required>
                                                    <option value="">Select Section</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label" for="transaction_date">Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control attendence_date" id="transaction_date" required>
                                            </div>

                                            <div class="col-md-3 d-flex align-items-end gap-2 mt-2">
                                                <button type="button" class="btn btn-primary attendence_submit">Filter</button>
                                                &nbsp;
                                                <button type="button" class="btn btn-secondary attendence_show">Attendance</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Absent</th>
                                                <th>Present</th>
                                                <th>Leave</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showAttendence">
                                            <tr>
                                                <td colspan="4" class="text-center">No Data Found</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-success btn-sm mark-all" data-status="present">
                                            <i class="mdi mdi-check-circle"></i>All Present
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm mark-all" data-status="absent">
                                            <i class="mdi mdi-close-circle"></i>All Absent
                                        </button>
                                        {{-- <button type="button" class="btn btn-warning btn-sm mark-all" data-status="leave">
                                            <i class="mdi mdi-alert-circle"></i>All Leave
                                        </button> --}}
                                        <button type="button" class="btn btn-primary btn-sm submit-attendance">
                                            <i class="mdi mdi-send"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            <div>
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
    //Checking Validation + Getting Students
    $(document).ready(function () {
        $('.attendence_submit').on('click', function () {
            let classId = $('#klass_id').val();
            let sectionId = $('#section_id').val();
            let date = $('.attendence_date').val();

            if (!classId || !sectionId || !date) {
                alert('Please fill all fields!');
                return;
            }

            console.table([classId,sectionId,date]);

            $.ajax({
                url: "{{ route('get.attendence.student') }}",
                type: "GET",
                data: {
                    class_id: classId,
                    section_id: sectionId,
                    attendence_date: date
                },
                beforeSend: function () {
                    $('#showAttendence').html('<tr><td colspan="4" class="text-center">Loading...</td></tr>');
                },
                success: function (response) {
                    let rows = '';
                    if (response.data.length) {
                        response.data.forEach(student => {
                            rows += `
                                <tr>
                                    <td>${student.user.name}</td>
                                    <td><input type="radio" class="form-check-input" name="attendance_${student.user.id}" value="absent"></td>
                                    <td><input type="radio" class="form-check-input" name="attendance_${student.user.id}" value="present"></td>
                                    <td><input type="radio" class="form-check-input" name="attendance_${student.user.id}" value="leave"></td>
                                </tr>`;
                        });
                    } else {
                        rows = '<tr><td colspan="4" class="text-center">No Data Found</td></tr>';
                    }
                    $('#showAttendence').html(rows);
                },
                error: function () {
                    alert('Failed to fetch attendance. Please try again.');
                }
            });
        });
    });

    //Toggle button for all present or absent...
    $(document).on('click', '.mark-all', function () {
        const status = $(this).data('status');
        const radioNameSelector = `[name^="attendance_"]`;

        // Update the checked status for each radio group
        $(radioNameSelector).each(function () {
            const radioButton = $(this);
            if (radioButton.val() === status) {
                radioButton.prop('checked', true);
            }
        });
    });

    //Attendence Submition
    $(document).on('click', '.submit-attendance', function () {
        let attendanceData = [];

        $('#showAttendence tr').each(function () {
            const userId = $(this).find('input[type="radio"]').attr('name')?.split('_')[1]; // Extract user ID
            const selectedStatus = $(this).find('input[type="radio"]:checked').val(); // Get selected value

            if (userId && selectedStatus) {
                attendanceData.push({
                    user_id: userId,
                    status: selectedStatus
                });
            }
        });

        // Check if attendance data is valid
        if (attendanceData.length === 0) {
            alert('No attendance selected for submission!');
            return;
        }

        $.ajax({
            url: "{{ route('submit.attendence') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                attendance: attendanceData,
                class_id: $('#klass_id').val(),
                section_id: $('#section_id').val(),
                date: $('.attendence_date').val(),
            },
            success: function (response) {
                alert('Attendance submitted successfully!');
                location.reload();
            },
            error: function () {
                alert('An error occurred while submitting attendance. Please try again.');
            }
        });
    });


    $('.attendence_show').click(function(){
        let classId = $('#klass_id').val();
        let sectionId = $('#section_id').val();
        let date = $('.attendence_date').val();

        if (!classId || !sectionId || !date) {
            alert('Please fill all fields!');
            return;
        }

        $.ajax({
            url: "{{ route('show.attendence') }}",
            type: "GET",
            data: {
                class_id: classId,
                section_id: sectionId,
                attendence_date: date
            },
            beforeSend: function () {
                $('#showAttendence').html('<tr><td colspan="4" class="text-center">Loading...</td></tr>');
            },
            success: function (response) {
                console.log(response);
                let rows = '';
                if (response.data.length) {
                    response.data.forEach(student => {
                        rows += `
                            <tr>
                                <td>${student.user.name}</td>
                                <td><input type="radio" class="form-check-input" ${student.status === 'absent' ? 'checked' : 'disabled'}></td>
                                <td><input type="radio" class="form-check-input" ${student.status === 'present' ? 'checked' : 'disabled'}></td>
                                <td><input type="radio" class="form-check-input" ${student.status === 'leave' ? 'checked' : 'disabled'}></td>
                            </tr>`;
                    });
                } else {
                    rows = '<tr><td colspan="4" class="text-center">No Data Found</td></tr>';
                }
                $('#showAttendence').html(rows);
            },
            error: function () {
                alert('Failed to fetch attendance. Please try again.');
            }
        });
    });
</script>
@endpush
