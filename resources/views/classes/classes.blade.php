@extends('layouts.app')
@section('title', 'Dashboard | Manage Classes')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Mange Classes
                                </h4>
                                <button type="button" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end" data-bs-toggle="modal" data-bs-target="#classModal">
                                    <i class="mdi mdi-plus"></i> Create Class
                                </button>
                                {{-- <button type="button" class="btn btn-outline-success btn-rounded align-middle mt-1 float-end me-2" data-bs-toggle="modal" data-bs-target="#bulkUpload">
                                    <i class="mdi mdi-file-upload-outline"></i> Bulk Upload
                                </button> --}}

                                <table id="example" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Sections</th>
                                            <th>Created At</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classes as $class)
                                            <tr id="row-{{ $class->id }}">
                                                <td>{{ $class->name }}</td>
                                                <td>
                                                    @foreach ($class->sections as $section)
                                                        <span>{{ $section->name.','}}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $class->created_at }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary btn-sm dropdown-toggle p-3" type="button" id="dropdownMenuButton{{ $class->id }}" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $class->id }}">
                                                            <li>
                                                                <button class="dropdown-item" onclick="editClass({{ $class->id }})">Edit</button>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('manage.sections', ['class_id' => $class->id]) }}" class="dropdown-item">Manage Sections</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item text-danger" onclick="deleteRec({{ $class->id }}, 'classes', 'class_sections')">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
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

    <div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="classModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="classModalLabel">Create Class</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="classForm" method="POST" action="{{ route('classes.store') }}" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Class Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" required>
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
@endsection

@push('footer_scripts')
<script>
    function editClass(id)
    {
        $.ajax({
            url: "{{ url('classes') }}/" + id + "/edit",
            type: "GET",
            dataType: 'JSON',
            success: function(res)
            {
                console.log(res);
                if(res.status == 200)
                {
                    $('input[name="name"]').val(res.data.name);
                    $('#classModalLabel').text('Edit Class');
                    $('#classForm').attr('action', "{{ url('classes') }}/" + res.data.id);
                    $('#classForm').append('<input type="hidden" name="_method" value="PUT">');
                    $('#classModal').modal('show');
                } else {
                    alert('Error fetching class data');
                }
            },
            error: function(err) {
                alert('Error fetching class data', err);
            }
        });
    }

    $('#classModal').on('hidden.bs.modal', function () {
        $('#classForm')[0].reset();
        $('#classForm').attr('action', "{{ route('classes.store') }}");
        $('#classForm').find('input[name="_method"]').remove();
        $('#classModalLabel').text('Create Class');
    });
</script>
@endpush
