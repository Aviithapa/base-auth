<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Error 404 </title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends--><!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- error-404 start-->
        <div class="error-wrapper">
            <div class="container">
                <svg>
                    <use href="{{ asset('assets/svg/icon-sprite.svg#error-404') }}"></use>
                </svg>
                <div class="grid grid-cols-12">
                    <div class="col-start-4 md:col-start-0 col-span-6 md:col-span-12">
                        <h3>We Could not Find This Page</h3>
                        <p class="sub-content pb-6">
                            You may not be able to find the page you are searching for, or
                            it may have been relocated or renamed.
                        </p>
                    </div>
                </div>
                <div>
                    <a class="btn btn-primary btn-lg text-white rounded-lg hover:text-white"
                        href="{{ route('dashboard') }}">BACK TO
                        HOME PAGE</a>
                </div>
            </div>
        </div>
        <!-- error-404 end      -->
    </div>
    <!-- latest jquery-->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js--><!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <script src="../assets/js/modalpage/custom-modal.js"></script>
    <!-- Plugins JS start--><!-- tooltip JS Ends-->
    <script src="../assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends--><!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/script1.js"></script>
</body>

</html>
