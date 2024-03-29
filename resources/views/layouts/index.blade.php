<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{asset('vendors/base/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{'admin/images/favicon.png'}}" />

    <link rel="stylesheet" href=" {{ asset('assests/css/bootstrap.min.css') }}" />

    {{-- navbar css --}}
    {{-- <link rel="stylesheet" href="{{ asset('assests/css/style.css')}}" /> --}}

    {{-- metas --}}
    <meta name="description" content="   @yield('meta_description') " />
    <meta name="keyword" content=" @yield('meta_keyword') " />
    <meta name="author" content="Reiss Aki" />

    {{-- Core UI --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css"> --}}
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="{{ asset('assests/css/font/css/all.min.css') }}">
@livewireStyles
</head>

<main class="py-4">
    @yield('content')
</main>
</div>




<script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
{{--
<script src="{{ asset('assests/js/jquery-3.6.3.min.js') }}"></script> --}}

<script src="{{ asset('admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/js/template.js') }}"></script>

<script src="{{ asset('admin/js/dashboard.js') }}"></script>
<script src="{{ asset('admin/js/data-table.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}"></script>

@yield('scripts')

@livewireScripts
@stack('script')

</body>
</html>
