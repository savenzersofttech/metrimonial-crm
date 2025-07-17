<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', config('app.name', 'Laravel') | config('app.name', 'Laravel'))</title>
    <!-- Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
    <link href="{{ asset('assets/sb2/css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/sb2/assets/img/favicon.png') }}" />
    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
    <link rel="stylesheet" href="{{ asset('assets/sb2/css/custom.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet">



    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/litepicker@2.0.12/dist/css/litepicker.css" rel="stylesheet">


    <!-- Allow child views to add CSS -->
    @stack('css')
</head>

<body class="nav-fixed">
    @include('layouts.partials.sb2.navbar')
    <div id="layoutSidenav">
        @include('layouts.partials.sb2.sidebar')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('layouts.partials.sb2.footer')
        </div>
    </div>

    <!-- Core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/sb2/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('assets/sb2/assets/demo/chart-area-demo.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/sb2/assets/demo/chart-bar-demo.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/sb2/js/datatables/datatables-simple-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/sb2/js/litepicker.js') }}"></script>
    <script src="{{ asset('assets/sb2/js/custom/form.js') }}"></script>
    <script src="{{ asset('assets/sb2/js/custom/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker@2.0.12/dist/litepicker.js"></script>

    <!-- intl-tel-input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
    feather.replace();
    </script>

    <!-- Toast container -->
    <div style="position: fixed; bottom: 1rem; right: 1rem; z-index: 9999;">
        <!-- ✅ Success Toast -->
        <div class="toast" id="successToster" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-delay="3000">
            <div class="toast-header bg-primary text-white">
                <i data-feather="check-circle"></i>
                <strong id="successTitle" class="ms-2 me-auto">Success</strong>
                <button class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="successBody" class="toast-body">Success message here</div>
        </div>

        <!-- ❌ Danger Toast -->
        <div class="toast" id="dangerToster" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
            <div class="toast-header bg-danger text-white">
                <i data-feather="alert-circle"></i>
                <strong id="dangerTitle" class="ms-2 me-auto">Error</strong>
                <button class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="dangerBody" class="toast-body">Error message here</div>
        </div>
    </div>

    </div>

   <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- Select2 Init -->
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                theme: 'bootstrap',
                placeholder: function () {
                    return $(this).data('placeholder') || 'Select options';
                },
                allowClear: true,
                width: '100%'
            });
        });
    </script>

    <!-- Toast & Session Notifications -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const successToast = new bootstrap.Toast(document.getElementById('successToster'));
            const dangerToast = new bootstrap.Toast(document.getElementById('dangerToster'));

            window.showSuccessToast = function (title, message) {
                document.getElementById('successTitle').textContent = title;
                document.getElementById('successBody').textContent = message;
                successToast.show();
            };

            window.showDangerToast = function (title, message) {
                document.getElementById('dangerTitle').textContent = title;
                document.getElementById('dangerBody').textContent = message;
                dangerToast.show();
            };

            @if(session('success'))
                showSuccessToast("Success!", @json(session('success')));
            @endif

            @if(session('error'))
                showDangerToast("Error!", @json(session('error')));
            @endif

            @if($errors->any())
                let errorMessages = {!! json_encode($errors->all()) !!};
                let errorText = errorMessages.join("\n");
                showDangerToast("Validation Error", errorText);
            @endif
        });
    </script>

    @stack('scripts')
</body>
</html>
