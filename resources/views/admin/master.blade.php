<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.includes.css')
    <title>@yield('title')</title>

</head>

<body>

<section class="section-dashboard">
    <!-- START SIDEBAR -->
    @include('admin.includes.navbar')
    <!-- END SIDEBAR -->

    <!-- START MAIN BODY -->
    @yield('body')
    <!-- END MAIN BODY -->
</section>

@include('admin.includes.script')

</body>

</html>
