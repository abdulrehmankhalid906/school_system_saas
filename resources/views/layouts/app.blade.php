<!doctype html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free" data-style="light">

<head>
    <meta name="viewport"content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon/favicon.ico') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}"/>

    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/buttons.dataTables.min.css') }}" />

    <script src="{{ asset('/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('/assets/js/config.js') }}"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('partials.sidebar')


            <div class="layout-page">

                @include('partials.header')

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    @yield('content')

                    <!--Footer-->
                    @include('partials.footer')

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="{{ asset('/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <!-- DataTables JavaScript -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
    @stack('footer_scripts')

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                dom: 'Bfrtip', // Enables Buttons and other features
                buttons: [
                    // 'copy',
                    'csv',
                    'excel',
                    'pdf',
                    'print'
                ]
            });
        });
        //Add & Remove Sections
        $(document).on('click', '.add_section', function(event) {
            event.preventDefault();

            const html = `
                <div class="form-group row mb-3">
                    <div class="col-md-6">
                        <input type="text" name="section[]" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger btn-sm remove_section">-</button>
                    </div>
                </div>
            `;

            $('#append_able').append(html);
        });

        $(document).on('click', '.remove_section', function(event) {
            event.preventDefault();

            $(this).closest('.form-group').remove();
        });

        //get depended section of the targeted classes
        $('#klass_id').change(function(){
            var class_id = $(this).val();
            var options = '';

            $.ajax({
                url: "{{ route('get.Section') }}",
                type: "GET",
                dataType: 'JSON',
                data:
                    {
                        class_id:class_id
                    },
                cache: false,
                success: function(resp)
                {
                    for(let index = 0; index < resp.length; index++)
                    {
                        options += `<option value="${resp[index].id}">${resp[index].name}</option>`;
                    }

                    $('#section_id').html(options);
                },

                error: function()
                {
                    //
                },
            });
        });

        function deleteRec(id,route) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/${route}/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );
                            const table = $('#basic-datatable').DataTable();
                            const row = $(`#row-${id}`);
                            table.row(row).remove().draw();
                        },
                        error: function(error) {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the record.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>
