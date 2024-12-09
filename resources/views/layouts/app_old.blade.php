<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Fintech School System, School Management System" name="description" />
    <meta content="Fintech Developers" name="author"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/extras/logo/favicon.png') }}">

    <!-- App css -->
    <link href="{{ asset('/assets/backend/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/backend/css/app-modern.min.css') }}" rel="stylesheet" id="light-style" />
    <link href="{{ asset('/assets/backend/css/app-modern-dark.min.css') }}" rel="stylesheet" id="dark-style" />

    <!-- third party css -->
    <link href="{{ asset('/assets/backend/css/vendor/fullcalendar.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/select.bootstrap5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/summernote-bs4.css') }}" rel="stylesheet"/>

    {{-- https://pictogrammers.com/library/mdi/ --}}


    <link href="{{ asset('/assets/backend/css/custom.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/content-placeholder.css') }}" rel="stylesheet"/>


    <script type="text/javascript" src="{{ asset('/assets/backend/js/jquery-3.6.0.min.js') }}"></script>

    <style>
        table.dataTable tbody td.focus, table.dataTable tbody th.focus {
            outline: none !important;
        }
    </style>
</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": false}'>

    <!-- Header-->
    @include('partials.header')
    <script type="text/javascript">
        function getLanguageList() {
            $.ajax({
                url: "http://localhost/school__/superadmin/language/dropdown",
                success: function(response) {
                    $('#language-list').html(response);
                }
            });
        }
    </script>
    <div class="container-fluid">
        <div class="wrapper">

            <!-- Left Sidebar -->
            @include('partials.sidebar')

            <!--Page Container-->
            <div class="content-page">
                @yield('content')

                <!--Footer-->
                @include('partials.footer')
            </div>
        </div>
    </div>
    <!-- all the js files -->
    <!-- bundle -->
    <script src="{{ asset('/assets/backend/js/vendor.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/app.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('/assets/backend/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/summernote-bs4.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- Typehead -->
    <script src="{{ asset('/assets/backend/js/vendor/handlebars.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/vendor/typeahead.bundle.min.js') }}"></script>


    <!-- demo app -->
    <script src="{{ asset('/assets/backend/js/pages/demo.typehead.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/pages/demo.datatable-init.js') }}"></script>
    <!-- end demo js-->

    <script src="{{ asset('/assets/backend/js/vendor/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('/assets/backend/js/content-placeholder.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/init.js') }}"></script>

    @stack('footer_scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $('select.select2:not(.normal)').each(function() {
                $(this).select2();
            });

            $(window).resize(function() {
                if ($(window).width() <= 767) {
                    $('.leftside-menu-detached').removeClass('show');
                }
            });
        });

        if ($(window).width() <= 767) {
            $('.leftside-menu-detached').removeClass('show');
        }


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
