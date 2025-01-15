@extends('layouts.app')
@section('title', 'Dashboard | Manage Subjects')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Subjects
                                </h4>
                                <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#subjectModal">
                                    <i class="mdi mdi-plus"></i> Create Subjects
                                </button>
                                <button type="button" class="btn btn-outline-success btn-rounded align-middle mt-1 float-end me-2" data-bs-toggle="modal" data-bs-target="#bulkUpload">
                                    <i class="mdi mdi-file-upload-outline"></i> Bulk Upload
                                </button>

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Subject Code</th>
                                            <th>Created At</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr id="row-{{ $subject->id }}">
                                                <td>{{ $subject->course_name }}</td>
                                                <td>{{ $subject->course_code ?? '-' }}</td>
                                                <td>{{ $subject->created_at }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" onclick="editSubject({{ $subject->id }})"> Edit</button>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $subject->id }}, 'subjects')">Delete</a>
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

    <div class="modal fade" id="subjectModal" tabindex="-1" aria-labelledby="subjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="subjectModalLabel">Create Subject</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="subjectForm" method="POST" action="{{ route('subjects.store') }}" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name">Subject Name</label>
                            <div class="col-md-9">
                                <input type="text" name="course_name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name">Subject Code</label>
                            <div class="col-md-9">
                                <input type="text" name="course_code" class="form-control">
                            </div>
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

    <div class="modal fade" id="bulkUpload" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="roleModalLabel">Bulk Upload</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('imports.subjects') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name">Upload File</label>
                            <div class="col-md-9">
                                <input type="file" name="bulk_upload_file" class="form-control" required>
                            </div>
                        </div>
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
    function editSubject(id)
    {
        $.ajax({
            url: "{{ url('subjects') }}/" + id + "/edit",
            type: "GET",
            dataType: 'JSON',
            success: function(res)
            {
                if(res.status == 200)
                {
                    $('input[name="course_name"]').val(res.data.course_name);
                    $('input[name="course_code"]').val(res.data.course_code);
                    $('#subjectModalLabel').text('Edit Subject');
                    $('#subjectForm').attr('action', "{{ url('subjects') }}/" + res.data.id);
                    $('#subjectForm').append('<input type="hidden" name="_method" value="PUT">');
                    $('#subjectModal').modal('show');
                } else {
                    alert('Error fetching subject data');
                }
            },
            error: function(err) {
                alert('Error fetching subject data', err);
            }
        });
    }

    $('#subjectModal').on('hidden.bs.modal', function () {
        $('#subjectForm')[0].reset();
        $('#subjectForm').attr('action', "{{ route('subjects.store') }}");
        $('#subjectForm').find('input[name="_method"]').remove();
        $('#subjectModalLabel').text('Create Subject');
    });
</script>
@endpush
