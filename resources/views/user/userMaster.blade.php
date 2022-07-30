<!DOCTYPE html>
<html lang="en">
    <head>
        @include('user.userIncludes.css')
    </head>

    <body>
        <header></header>
        <main class="d-flex">
            <!-- START LOGIN LEFT SIDE -->
            @include('user.userIncludes.leftDesign')
            <!-- END LOGIN LEFT SIDE -->

            <!-- START LOGIN RIGHT SIDE -->
            @yield('bodyRight')
            <!-- END LOGIN RIGHT SIDE -->
        </main>

        @include('user.userIncludes.script')
    </body>
</html>
