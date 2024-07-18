<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "vertical" }}'>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>ADMIN PORTAL</title>
    <meta name="description"
        content="A vertical menu that newer shows larger pinned version and switches between mobile view and semi-hidden view." />
    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57"
        href="{{ asset('acron/img/favicon/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('acron/img/favicon/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('acron/img/favicon/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('acron/img/favicon/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60"
        href="{{ asset('acron/img/favicon/apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="{{ asset('acron/img/favicon/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76"
        href="i{{ asset('acron/mg/favicon/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
        href="{{ asset('acron/img/favicon/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('acron/img/favicon/favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('acron/img/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('acron/img/favicon/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('acron/img/favicon/favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('acron/img/favicon/favicon-128.png') }}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('acron/img/favicon/mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ asset('acron/img/favicon/mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ asset('acron/img/favicon/mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('acron/img/favicon/mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ asset('acron/img/favicon/mstile-310x310.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('acron/font/CS-Interface/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="{{ asset('acron/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acron/css/vendor/OverlayScrollbars.min.css') }}" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="{{ asset('acron/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('acron/css/custom.css') }}" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="{{ asset('acron/css/vendor/baguetteBox.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('acron/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('acron/css/vendor/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('acron/css/customAccordian.css') }}">
    <script src="{{ asset('acron/js/base/loader.js') }}"></script>
    @yield('css_after')
    <style>
        th {
            text-align: center !important;
        }

        tr {
            text-align: center !important;
        }

        .dot {
            height: 16px;
            width: 16px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>



</head>

<body>
    @include('layouts.partials.header')
    <div id="root">
        @include('layouts.partials.sidebar')
        @include('layouts.partials.notification')

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>



        @include('common.modal.simple_modal')
    </div>



    <!-- Vendor Scripts Start -->
    <script src="{{ asset('acron/js/vendor/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('acron/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('acron/js/vendor/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('acron/js/vendor/autoComplete.min.js') }}"></script>
    <script src="{{ asset('acron/js/vendor/clamp.min.js') }}"></script>
    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="{{ asset('acron/js/base/helpers.js') }}"></script>
    <script src="{{ asset('acron/js/base/globals.js') }}"></script>
    <script src="{{ asset('acron/js/base/nav.js') }}"></script>
    <script src="{{ asset('acron/js/base/search.js') }}"></script>
    <script src="{{ asset('acron/js/base/settings.js') }}"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->
    <script src="{{ asset('acron/js/pages/interface.icons.js') }}"></script>
    <script src="{{ asset('acron/js/common.js') }}"></script>
    <script src="{{ asset('acron/js/scripts.js') }}"></script>

    <script src="{{ asset('acron/icon/acorn-icons.js') }}"></script>
    <script src="{{ asset('acron/icon/acorn-icons-interface.js') }}"></script>
    <script src="{{ asset('acron/icon/acorn-icons-learning.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{ asset('acron/js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('acron/js/vendor/moment-with-locales.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css"
        integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"
        integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Page Specific Scripts End -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        function myalert(icon = "success", title = "null", timer = "3000") {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: timer,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: icon,
                title: title
            })
        }

        window.addEventListener("keydown", (e) => {
            if (e.code === 'F3' || ((e.ctrlKey || e.metaKey) && e.code === 'KeyF')) {
                e.preventDefault();
                $('#searchPagesModal').modal('show');

            }
        })
    </script>


    @yield('js_after')
</body>

</html>
