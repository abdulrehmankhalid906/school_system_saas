<!DOCTYPE html>
<html>

<head>
    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Creativeitem" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/extras/logo/favicon.png') }}">
    <!-- all the css files -->
    <!-- App css -->
    <link href="{{ asset('/assets/backend/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/backend/css/app-modern.min.css') }}" rel="stylesheet" id="light-style" />
    <link href="{{ asset('/assets/backend/css/app-modern-dark.min.css') }}" rel="stylesheet" id="dark-style" />
    <!-- App css End-->

    <!-- third party css -->
    <link href="{{ asset('/assets/backend/css/vendor/fullcalendar.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/select.bootstrap5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/vendor/summernote-bs4.css') }}" rel="stylesheet"/>
    <!-- third party css end -->


    <link href="{{ asset('/assets/backend/css/custom.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/backend/css/content-placeholder.css') }}" rel="stylesheet"/>


    <script type="text/javascript" src="{{ asset('/assets/backend/js/jquery-3.6.0.min.js') }}"></script>
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

    <script src="{{ asset('/assets/backend/js/ajax_form_submission.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/custom.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/content-placeholder.j') }}s"></script>
    <script src="{{ asset('/assets/backend/js/init.js') }}"></script>

    <!-- dragula js-->
    <script src="{{ asset('/assets/backend/js/vendor/dragula.min.js') }}"></script>
    <!-- component js -->
    <script src="{{ asset('/assets/backend/js/ui/component.dragula.js') }}"></script>
    <!-- Timepicker -->

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
    </script>
</body>
</html>
