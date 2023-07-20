<!DOCTYPE html>

<html lang="en">

<head>

    @include('layouts.backend.head')

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <div id="loader"></div>
        @include('layouts.backend.nav')
        @include('layouts.backend.header')

        <div class="content-wrapper">
            <div class="container-full">
                @yield('content')
            </div>
        </div>

        @include('layouts.backend.footer')
    </div>
    @include('layouts.backend.footer-scripts')

    @stack('scripts')
</body>

</html>