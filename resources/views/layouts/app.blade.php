<!DOCTYPE html>
<html>

<head>
    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <title>Dashboard | Soan Garden High School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Creativeitem" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/backend/extras/logo/favicon.png') }}">
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
    <!-- Toastr and alert notifications for PHP scripts -->
    <script type="text/javascript">
        function notify(message) {
            $.NotificationApp.send("Heads up!", message, "top-right", "rgba(0,0,0,0.2)", "info");
        }

        function success_notify(message) {
            $.NotificationApp.send("Success !", message, "top-right", "rgba(0,0,0,0.2)", "success");
        }

        function error_notify(message) {
            $.NotificationApp.send("Oh snap !", message, "top-right", "rgba(0,0,0,0.2)", "error");
        }
    </script>


    <script type="text/javascript">
        $.NotificationApp.send("Oh snap!", 'Invalid your email or password', "top-right", "rgba(0,0,0,0.2)", "error");
    </script>

    <script type="text/javascript">
        $.NotificationApp.send("Success !", 'Welcome back', "top-right", "rgba(0,0,0,0.2)", "success");
    </script>

    <script>
        function error_required_field() {
            $.NotificationApp.send("Oh snap!", "Please fill all the required fields", "top-right", "rgba(0,0,0,0.2)",
                "error");
        }
    </script>



    <!-- SHOW TOASTR NOTIFICATION FOR AJAX-->

    <script type="text/javascript">
        var callBackFunction;
        var callBackFunctionForGenericConfirmationModal;

        function largeModal(url, header) {
            jQuery('#large-modal').modal('show', {
                backdrop: 'true'
            });
            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    jQuery('#large-modal .modal-body').html(response);
                    jQuery('#large-modal .modal-title').html(header);
                }
            });
        }

        function previewModal(url, header) {
            jQuery('#preview-modal').modal('show', {
                backdrop: 'true'
            });
            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    jQuery('#preview-modal .modal-body').html(response);
                    jQuery('#preview-modal .modal-title').html(header);
                }
            });
        }

        function rightModal(url, header) {
            // LOADING THE AJAX MODAL
            jQuery('#right-modal').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    jQuery('#right-modal .modal-body').html(response);
                    jQuery('#right-modal .modal-title').html(header);
                }
            });
        }


        function confirmModal(delete_url, param) {
            jQuery('#alert-modal').modal('show', {
                backdrop: 'static'
            });
            if (param) {
                callBackFunction = param;
            }
            document.getElementById('delete_form').setAttribute('action', delete_url);
        }

        function confirmModalRedirect(delete_url) {
            jQuery('#alert-modal-redirect').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('alert-modal-redirect-url').setAttribute('href', delete_url);
        }

        function genericConfirmModal(callBackFunction) {
            jQuery('#genric-confirmation-modal').modal('show', {
                backdrop: 'static'
            });
            callBackFunctionForGenericConfirmationModal = callBackFunction;
        }

        function callTheCallBackFunction() {
            $('#genric-confirmation-modal').modal('hide');
            callBackFunctionForGenericConfirmationModal();
        }

        function blankFunction() {

        }
    </script>



    <!-- Right modal content -->
    <div id="right-modal" class="modal fade" tabindex="0" role="dialog" aria-hidden="true"
        style="overflow-y: hidden !important;">
        <div class="modal-dialog modal-lg modal-right"
            style="width: 100% !important; max-width: 440px !important; min-height: 100% !important;">
            <div class="modal-content modal_height">

                <div class="modal-header border-1">
                    <button type="button" class="btn btn-outline-secondary py-0 px-1" data-bs-dismiss="modal"
                        aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="container-fluid text-center">
                        <img src="http://localhost/school__/assets/backend/images/straight-loader.gif"
                            style="width: 60px; padding: 50% 0px; opacity: .6;">
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript">
        var myModalEl = document.getElementById('right-modal')
        myModalEl.addEventListener('hidden.bs.modal', function(event) {
            $('select.select2:not(.normal)').each(function() {
                $(this).select2();
            });
        });
    </script>


    <!--  Large Modal -->
    <div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-print-none">
                    <h4 class="modal-title" id="myLargeModalLabel"></h4>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Info Alert Modal -->
    <div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-information h1 text-info"></i>
                        <h4 class="mt-2">Heads up!</h4>
                        <p class="mt-3">Are you sure?</p>
                        <form method="POST" class="ajaxDeleteForm" action="" id = "delete_form">
                            <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger my-2" onclick="">Continue</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Info Alert Modal -->
    <div id="alert-modal-redirect" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-information h1 text-info"></i>
                        <h4 class="mt-2">Heads up!</h4>
                        <p class="mt-3">Are you sure?</p>
                        <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Cancel</button>
                        <a href="" id="alert-modal-redirect-url" class="btn btn-danger my-2">Continue</a>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Info Alert Modal THIS MODAL WAS USED BECAUSE OF SOME GENERIC ALERTS-->
    <div id="genric-confirmation-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-information h1 text-info"></i>
                        <h4 class="mt-2">Heads up!</h4>
                        <p class="mt-3">Are you sure?</p>
                        <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger my-2"
                            onclick="callTheCallBackFunction()">Continue</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="preview-modal" tabindex="-1" role="dialog" aria-hidden="true"
        data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content course-preview-modal">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                        onclick="pageReload()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" style="min-height: 300px;">
                    <img style="width: 60px; margin-top: 100px;"
                        src="http://localhost/school__/assets/backend/images/straight-loader.gif">
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function pageReload() {
            //filterCourse();
            filterCourseFullPage();
            //location.reload();
        }
    </script>

    <script>
        jQuery(".ajaxDeleteForm").submit(function(e) {

            var form = $(this);
            ajaxSubmit(e, form, callBackFunction);
        });
    </script>

    <script>
        function showAjaxModal(url, header) {
            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#scrollable-modal .modal-body').html(
                '<div style="text-align:center;margin-top:200px;"><img style="width: 100px; opacity: 0.4; " src="http://localhost/school__/assets/backend/images/straight-loader.gif" /></div>'
                );
            jQuery('#scrollable-modal .modal-title').html('...');
            // LOADING THE AJAX MODAL
            jQuery('#scrollable-modal').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    jQuery('#scrollable-modal .modal-body').html(response);
                    jQuery('#scrollable-modal .modal-title').html(header);
                }
            });
        }
    </script>
    <!-- Scrollable modal -->
    <div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog"
        aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ms-2 me-2">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</body>

</html>
