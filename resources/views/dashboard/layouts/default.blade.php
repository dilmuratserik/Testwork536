<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('dashboard.layouts.meta')

    @include('dashboard.layouts.styles')

</head>
<body>

    @include('dashboard.layouts.header')

    <div class="container-fluid">
        <div class="row">

            @include('dashboard.layouts.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                @yield('breadcrumbs')

                @yield('content')

            </main>

        </div>
    </div>

    @include('dashboard.layouts.scripts')

    @stack('scripts')

</body>
</html>

