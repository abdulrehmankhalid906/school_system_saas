@extends('layouts.app')
@section('title', 'Dashboard | Manage Time Tables')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 order-3 order-md-2">
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Send Notifiction
                                </h4>

                                <div class="row">
                                    <form class="p-3 d-block" autocomplete="off">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <select id="notification_id" class="form-control" required>
                                                    <option  value="">Select Notification</option>
                                                    @foreach ($notifications as $notification)
                                                        <option value="{{ $notification->id }}">{{ $notification->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <select id="user_ids" class="form-control multiple-select" multiple required>
                                                    <option value="">Select User</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ Str::limit($user->school->name ?? '', 25) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                                <button type="button" class="btn btn-primary send_notifications">Send Notification</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="page-title d-inline-block">
                                    <i class="mdi mdi-account-circle title_icon"></i> Templates
                                </h4>

                                <a href="{{ route('notifications.create') }}" class="btn btn-outline-primary btn-rounded align-middle mt-1 float-end">
                                    <i class="mdi mdi-plus"></i> Create Template
                                </a>

                                <table id="example1" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notifications as $notification)
                                            <tr id="row-{{ $notification->id }}">
                                                <td>{{ $notification->id ?? '' }}</td>
                                                <td>{{ $notification->title ?? '' }}</td>
                                                <td>{{ $notification->message ? Str::limit($notification->message,30) : ' '}}</td>
                                                <td>
                                                    <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRec({{ $notification->id }}, 'notifications')">Delete</a>
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

@push('footer_scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', '.send_notifications', function () {
            var notification_id = $('#notification_id').val();
            var user_ids = $('#user_ids').val();

            if (!notification_id || !user_ids) {
                toastr.error("Please select both Notification and User.");
                return false;
            }

            $.ajax({
                url: "{{ route('send.notifictions') }}",
                type: 'POST',
                dataType: 'Json',
                data: {
                    _token: '{{ csrf_token() }}',
                    notification_id: notification_id,
                    user_ids: user_ids
                },
                success: function(response) {
                    if (response.status === false) {
                        toastr.error(response.message);
                    } else {
                        toastr.success(response.message);
                    }
                }
            });

        });
    });
</script>
@endpush
