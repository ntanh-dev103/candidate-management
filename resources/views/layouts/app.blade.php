<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>@yield('title', 'Candidate Management System')</title>

    {{-- =========================================================
        BOOTSTRAP CSS
    ========================================================== --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- =========================================================
        BOOTSTRAP ICONS
    ========================================================== --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    {{-- =========================================================
        TOM SELECT CSS
    ========================================================== --}}
    <link
        href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.bootstrap5.min.css"
        rel="stylesheet"
    >

    {{-- =========================================================
        FLATPICKR CSS
    ========================================================== --}}
    <link
        href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
        rel="stylesheet"
    >

    {{-- =========================================================
        TAGIFY CSS
    ========================================================== --}}
    <link
        href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css"
        rel="stylesheet"
    >

    {{-- =========================================================
        CROPPER JS CSS
    ========================================================== --}}
    <link
        href="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css"
        rel="stylesheet"
    >

    {{-- =========================================================
        FILEPOND CSS
    ========================================================== --}}
    <link
        href="https://unpkg.com/filepond@^4/dist/filepond.css"
        rel="stylesheet"
    >

    {{-- CSS từ các Blade con --}}
    @stack('styles')
</head>

<body class="bg-light">

    {{-- =========================================================
        NAVBAR
    ========================================================== --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <a
                class="navbar-brand fw-bold"
                href="{{ route('dashboard') }}"
            >
                Candidate Management
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="collapse navbar-collapse"
                id="navbarNav"
            >
                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a
                            href="{{ route('dashboard') }}"
                            class="nav-link"
                        >
                            <i class="bi bi-speedometer2"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('candidates.index') }}"
                            class="nav-link"
                        >
                            <i class="bi bi-people"></i>
                            Candidates
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('candidates.create') }}"
                            class="nav-link"
                        >
                            <i class="bi bi-person-plus"></i>
                            Add Candidate
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>


    {{-- =========================================================
        MAIN CONTENT
    ========================================================== --}}
    <main class="container-fluid mt-4">

        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>
            </div>
        @endif


        {{-- Error message --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>
            </div>
        @endif


        {{-- Nội dung từ Blade con --}}
        @yield('content')

    </main>


    {{-- =========================================================
        FOOTER
    ========================================================== --}}
    <footer class="bg-dark text-white mt-5">
        <div class="container text-center py-3">
            Candidate Management System © {{ date('Y') }}
        </div>
    </footer>


    {{-- =========================================================
        JAVASCRIPT LIBRARIES
    ========================================================== --}}

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Tom Select --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>

    {{-- Flatpickr --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Tagify --}}
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

    {{-- Cropper JS --}}
    <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.js"></script>

    {{-- FilePond Plugins --}}
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>

    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>

    {{-- FilePond --}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.min.js"></script>


    {{-- =========================================================
        GLOBAL TOM SELECT

        Chỉ chạy với:
        .js-tom-select

        Skills KHÔNG có class này nên sẽ được xử lý riêng
        trong form.blade.php.
    ========================================================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            if (!window.TomSelect) {
                console.error('TomSelect is not loaded.');
                return;
            }

            document
                .querySelectorAll('.js-tom-select')
                .forEach(function (element) {

                    // Tránh khởi tạo 2 lần
                    if (!element.tomselect) {

                        new TomSelect(element, {
                            create: false,
                            allowEmptyOption: true,
                            maxOptions: null
                        });

                    }

                });

        });
    </script>


    {{-- =========================================================
        SCRIPT TỪ VIEW CON

        form.blade.php sử dụng:
        @push('scripts')
    ========================================================== --}}
    @stack('scripts')

</body>

</html>
