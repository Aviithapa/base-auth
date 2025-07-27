<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon" />
    <title>
        Nepal Pharmacy Council | Training
    </title>
    @stack('styles')
    @include('portal.layout.style')
</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends--><!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends--><!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('portal.layout.header')
        <!-- Page Header Ends                              --><!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @if (Auth::user()->hasRole('admin'))
                @include('portal.sidebar.admin')
            @elseif (Auth::user()->hasRole('user'))
                @include('portal.sidebar.user')
            @else
                @include('portal.sidebar.default')
            @endif

            <div class="page-body">

                <!-- Page Sidebar Ends-->
                @yield('content')

            </div>

            <!-- footer start-->
            @include('portal.layout.footer')

        </div>

    </div>
    <!-- latest jquery-->
    @stack('scripts')
    @include('portal.layout.script')

</body>

</html>
