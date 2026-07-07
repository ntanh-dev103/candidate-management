<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Candidate Management System</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    {{-- UI Plugins --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">

    @stack('styles')

</head>

<body class="bg-light">

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">

        <a class="navbar-brand fw-bold"
           href="{{ route('dashboard') }}">

            Candidate Management

        </a>

        <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div
            class="collapse navbar-collapse"
            id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">

                    <a
                        href="{{ route('dashboard') }}"
                        class="nav-link">

                        <i class="bi bi-speedometer2"></i>

                        Dashboard

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        href="{{ route('candidates.index') }}"
                        class="nav-link">

                        <i class="bi bi-people"></i>

                        Candidates

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        href="{{ route('candidates.create') }}"
                        class="nav-link">

                        <i class="bi bi-person-plus"></i>

                        Add Candidate

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- ================= CONTENT ================= -->

<div class="container-fluid mt-4">

    @yield('content')

</div>

<!-- ================= FOOTER ================= -->

<footer class="bg-dark text-white mt-5">

    <div class="container text-center py-3">

        Candidate Management System © {{ date('Y') }}

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!window.TomSelect) {
            return;
        }

        document.querySelectorAll('.js-tom-select').forEach(function (element) {
            if (!element.tomselect) {
                new TomSelect(element, {
                    create: false,
                    allowEmptyOption: true,
                    maxOptions: null,
                });
            }
        });
    });
</script>
@stack('scripts')
</body>

</html>
