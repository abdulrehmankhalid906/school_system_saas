@extends('layouts.app')
@section('title', 'Dashboard | Manage Sections')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('classes.index') }}" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end">
                                <i class="mdi mdi-plus"></i> Go Back
                            </a>

                            <form action="{{ route('sections.manage') }}" method="POST" autocomplete="off">
                                @csrf
                                <input type="hidden" id="class_id" name="class_id" value="{{ $classes->id ?? '' }}">
                                <input type="hidden" id="section_id" name="section_id" value="{{ $getsection->id ?? '' }}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="basiInput" class="form-label">Section Name</label>
                                        <input type="text" placeholder="Create Section" class="form-control" id="section" name="section" value="{{ $getsection->name ?? '' }}" required>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <input type="submit" class="btn btn rounded-pill btn-primary waves-effect waves-light" value="Update">
                                    </div>
                                </div>
                            </form>

                            <table id="example" class="table dt-responsive nowrap w-100 mb-2">
                                <thead>
                                    <tr>
                                        <th>Sections</th>
                                        <th>Created At</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes->sections as $section)
                                        <tr id="row-{{ $section->id }}">
                                            <td>{{ $section->name }}</td>
                                            <td>{{ $section->created_at }}</td>
                                            <td>
                                                <a href="{{ route('manage.sections', ['class_id' => $classes->id, 'section_id' => $section->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $section->id }}, 'sections')">Delete</a>
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
@endsection
