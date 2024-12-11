@extends('layouts.app')
@section('title', 'Dashboard | Manage Atendence')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> All Classes
                                </h4>

                                <div class="row">
                                    <form class="p-3 d-block" action="" autocomplete="off">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <select id="klass_id" class="form-control select2" required>
                                                    <option value="">Select Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <select id="section_id" class="form-control select2" required>
                                                    <option value="">Select Section</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <input type="date" class="form-control" id="attendence_date" required>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <button class="btn btn-secondary attendence_submit">Show Attendence</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="row mt-2">
                                    <table class="table dt-responsive nowrap w-100">
                                        <tr>
                                            <th colspan="2">Name</th>
                                            <th>Absent</th>
                                            <th>Present</th>
                                            <th>Leave</th>
                                        </tr>
                                        <tr id="showAttendence">
                                            <td colspan="2"></td>
                                            <td>
                                                <input name="attendance_abdul" class="form-check-input" type="radio" value="absent" id="defaultRadio2" checked="">
                                            </td>
                                            <td>
                                                <input name="attendance_abdul" class="form-check-input" type="radio" value="present" id="defaultRadio2" checked="">
                                            </td>
                                            <td>
                                                <input name="attendance_abdul" class="form-check-input" type="radio" value="leave" id="defaultRadio2" checked="">
                                            </td>
                                        </tr>
                                    </table>
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
        $(document).ready(function(){
            $('.attendence_submit').click(function(){
                var class_id = document.getElementById('klass_id').value;
                var section_id = document.getElementById('section_id').value;
                var attendence_date = document.getElementById('attendence_date').value;

                if (!class_id || !section_id || !attendence_date) {
                    alert('Please fill all fields!');
                    return;
                }

                $.ajax({
                    url: "{{ route('get.attendence.student') }}",
                    type: "POST",
                    dataType: 'JSON',
                    data:
                        {
                            _token: '{{ csrf_token() }}',
                            class_id: class_id,
                            section_id: section_id,
                            attendence_date: attendence_date
                        },
                    cache: false,
                    success: function(resp) {
                        console.log(resp);
                        let rows = ''; // Generate table rows
                        resp.forEach((student) => {
                            rows += `
                                <tr>
                                    <td colspan="2">${student.name}</td>
                                    <td><input name="attendance_${student.id}" class="form-check-input" type="radio" value="absent"></td>
                                    <td><input name="attendance_${student.id}" class="form-check-input" type="radio" value="present"></td>
                                    <td><input name="attendance_${student.id}" class="form-check-input" type="radio" value="leave"></td>
                                </tr>`;
                        });
                        $('#showAttendence').html(rows); // Update table body
                    },

                    error: function()
                    {
                        //
                    },
                });
            });
        });
    </script>
@endpush
