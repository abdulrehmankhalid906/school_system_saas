@extends('layouts.app')
@section('title', 'Create Time Table')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title">Create Timetable</h5>
                                <form method="POST" action="{{ route('timetables.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" id="title" name="title" class="form-control" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="klass_id">Select Class</label>
                                            <select name="klass_id" id="klass_id" class="form-control select2" required>
                                                <option value="">Select One</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="section_id">Select Section</label>
                                            <select name="section_id" id="section_id" class="form-control select2" required>
                                                <option value="">Select One</option>
                                            </select>
                                        </div>

                                        <!-- Timetable Entry -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Day</th>
                                                        <th>Time From</th>
                                                        <th>Time To</th>
                                                        <th>Subject</th>
                                                        <th>Teacher</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="timetable-rows">
                                                    <tr>
                                                        <td>
                                                            <select name="timetable[0][day]" class="form-control" required>
                                                                <option value="">Select Day</option>
                                                                @foreach (InitS::getdays() as $days)
                                                                    <option value="{{ $days }}">{{ $days }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="time" name="timetable[0][time_from]" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" name="timetable[0][time_to]" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <select name="timetable[0][subject]" class="form-control" required>
                                                                <option value="">Select Subject</option>
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{ $subject->id }}">{{ $subject->course_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="timetable[0][teacher]" class="form-control" required>
                                                                <option value="">Select Teacher</option>
                                                                @foreach ($teachers as $teacher)
                                                                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger remove-row">Remove</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="add-row">Add Row</button>

                                        <div class="text-start">
                                            <button type="submit" class="btn btn-primary me-3 mb-4">Create</button>
                                        </div>
                                    </div>
                                </form>
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
    $(document).ready(function() {
        let i = 1;
        $('#add-row').click(function() {
            let row = `
                <tr>
                    <td>
                        <select name="timetable[${i}][day]" class="form-control" required>
                            <option value="">Select Day</option>
                            @foreach (InitS::getdays() as $days)
                                <option value="{{ $days }}">{{ $days }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="time" name="timetable[${i}][time_from]" class="form-control" required>
                    </td>
                    <td>
                        <input type="time" name="timetable[${i}][time_to]" class="form-control" required>
                    </td>
                    <td>
                        <select name="timetable[${i}][subject]" class="form-control" required>
                            <option value="">Select Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->course_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="timetable[${i}][teacher]" class="form-control" required>
                            <option value="">Select Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </td>
                </tr>
            `;
            $('#timetable-rows').append(row);
            i++;
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    });
</script>
@endpush
