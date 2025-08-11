<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Error 500 </title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body class="light"><!-- tap on top starts-->
    <div class="tap-top"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-chevrons-up">
            <polyline points="17 11 12 6 7 11"></polyline>
            <polyline points="17 18 12 13 7 18"></polyline>
        </svg></div><!-- tap on tap ends--><!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper"><!-- error-500 start-->
        <div class="error-wrapper">
            <div class="container"><svg>
                    <use href="{{ asset('assets/svg/icon-sprite.svg#error-500') }}"></use>
                </svg>
                <div class="grid grid-cols-12">
                    <div class="col-start-4 md:col-start-0 col-span-6 md:col-span-12">
                        <h3>Server Error</h3>
                        <p class="sub-content pb-6">The server couldn't finish processing your request due to an error.
                        </p>
                    </div>
                </div>
                <div><a class="btn btn-primary btn-lg text-white rounded-lg hover:text-white"
                        href="{{ route('dashboard') }}">BACK TO
                        HOME PAGE</a></div>
            </div>
        </div><!-- error-500 end-->
    </div><!-- latest jquery-->
    <script src="../assets/js/jquery.min.js"></script><!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script><!-- scrollbar js--><!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <script src="../assets/js/modalpage/custom-modal.js"></script><!-- Plugins JS start--><!-- tooltip JS Ends-->
    <script src="../assets/js/tooltip-init.js"></script><!-- Plugins JS Ends--><!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/script1.js"></script>
</body>

</html>
