@extends('layouts.app')
@section('title', 'Dashboard | Manage Teachers')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Teachers
                                </h4>
                                <a href="{{ route('teachers.create') }}" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end">Create Teacher</a>

                                <button type="button" class="btn btn-outline-success btn-rounded align-middle mt-1 float-end me-2" data-bs-toggle="modal" data-bs-target="#bulkTeacherUpload">
                                    <i class="mdi mdi-file-upload-outline"></i> Bulk Upload
                                </button>

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Teacher Name</th>
                                            <th>Permission Authority</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $teacher)
                                            <tr id="row-{{ $teacher->id }}">
                                                <td>{{ $teacher->user->name }}</td>
                                                <td><b>Attendance:</b> {{ $teacher->is_attendance == true ? 'Yes' : 'No' }} - <b>Marks:</b> {{ $teacher->is_mark == true ? 'Yes' : 'No' }}</td>
                                                <td>
                                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $teacher->id }}, 'teachers')">Delete</a>
                                                    <button class="btn btn-primary btn-sm" onclick="managePermission({{ $teacher->id }})">Manage Permission</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="teacherperModal" tabindex="-1" aria-labelledby="teacherperModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teacherperModalLabel">Manage Teacher Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="teacherperForm" method="POST" action="{{ route('store.teacher.permissions') }}" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-check">
                                <label class="form-check-label" for="can_mark">Can Mark</label>
                                <input class="form-check-input" type="checkbox" name="is_mark" id="can_mark" value="1">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <label class="form-check-label" for="can_attendance">Can Attendance</label>
                                <input class="form-check-input" type="checkbox" name="is_attendance" id="can_attendance" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Save changes">&nbsp;
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bulkTeacherUpload" tabindex="-1" aria-labelledby="bulkteacherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="roleModalLabel">Bulk Upload</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('bulk.import.teacher') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="bulk_upload_file">Upload File <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="file" id="bulk_upload_file" name="bulk_upload_file" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <span class="preview_img">
                            <a href="{{ asset('/assets/previews/teacher_preview.png') }}" target="_blank">Excel File Preview (Please check)</a>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Upload File">&nbsp;
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection

@push('footer_scripts')
<script>
    function managePermission(id) {
        var url = '{{ route("teacher.permissions", ":id") }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: "GET",
            dataType: 'JSON',
            success: function(res) {
                if (res.status === true) {
                    $('#can_mark').prop('checked', res.data.is_mark);
                    $('#can_attendance').prop('checked', res.data.is_attendance);

                    // Update form action for PUT request
                    $('#teacherperModalLabel').text('Update Teacher Permission');
                    $('#teacherperForm').attr('action', "{{ route('store.teacher.permissions') }}");
                    $('#teacherperForm').append('<input type="hidden" name="id" value="' + res.data.id + '">');
                    $('#teacherperModal').modal('show');
                } else {
                    alert('Error fetching teacher data');
                }
            },
            error: function(err) {
                alert('Error fetching teacher data', err);
            }
        });
    }

    $('#teacherperModal').on('hidden.bs.modal', function () {
        $('#teacherperForm')[0].reset();
        $('#teacherperForm').find('input[name="id"]').remove();
        $('#teacherperForm').attr('action', "{{ route('store.teacher.permissions') }}");
        $('#teacherperModalLabel').text('Manage Teacher Permission');
    });
</script>
@endpush
