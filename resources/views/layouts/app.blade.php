<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Unkown Page') | {{\App\Models\Setting::first()->web_name}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Font awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.css')}}">

    <!-- Flag Icon -->
    <link rel="stylesheet" href="{{asset('plugins/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- material design icons -->
    <link rel="stylesheet" href="{{asset('plugins/mdi/css/materialdesignicons.min.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,700" >
        <!-- RTL: style -->
        <link rel="stylesheet" href="{{asset('css/rtl/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/rtl/media-query-rtl.css')}}">
        <!-- Custom RTL file -->
        <link rel="stylesheet" href="{{asset('css/rtl/customRTL.css')}}">

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @endif

    <!-- Other Styles -->
    @yield('other-styles')

</head>
<body>



    <div id="app">
        <!-- layout -->
        <div class="layout">
            {{-- Sidebar --}}
            @section('sidebar')
                @include('include.sidebar')
            @show
            <!-- End of Sidebar -->

            <!-- Main Container -->
            <div class="main-container">
                {{-- Navbar --}}
                @section('navbar')
                    @include('include.navbar', [
                        'setting' => \App\Models\Setting::first()
                    ])
                @show

                {{-- Header --}}
                @section('header')
                    @include('include.header')
                @show

                {{-- Main Content --}}
                <main class="main-content">
                    @yield('content')
                </main>

                {{-- Footer --}}
                @section('footer')
                    @include('include.footer', [
                        'setting' => \App\Models\Setting::first()
                    ])
                @show
            </div>
            <!-- End of Main Container -->

        </div>
        <!-- end of layout -->

    </div>


    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Other Scripts -->
    @yield('other-scripts')

</body>
</html>
