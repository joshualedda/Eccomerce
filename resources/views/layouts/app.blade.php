<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    {{-- Resources --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eccomerce</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('style/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/styles.css') }}" />
    <link rel="icon" href="{{ asset('style/images/logo.png') }}" type="image/x-icon">

    <!-- Test -->
    <link rel="stylesheet" href="{{ asset('style/css/main.css') }}" />
    {{-- End Resources --}}


    {{-- Own Style --}}
    {{-- For the meantime (might delete later) --}}
    {{-- <link rel="stylesheet" href="{{ asset('assests/css/style.css') }}" /> --}}

    {{-- metas --}}
    <meta name="description" content="   @yield('meta_description') " />
    <meta name="keyword" content=" @yield('meta_keyword') " />
    <meta name="author" content="Reiss Aki" />

@livewireStyles
</head>

<body class="bg-light">
    <div id="app">
        @include('inc.frontend.navbar')

        {{--  --}}
        <main class="">
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

