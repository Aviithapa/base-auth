<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive Tailwind admin template with unlimited possibilities." />
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon" />
    <title>Forgot Password | Cuba - Premium Admin Template By Pixelstrap</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet" />
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/fontawesome.css" />
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css" />
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css" />
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css" />
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css" />
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- App css-->
    <link rel="stylesheet" href="../assets/css/tailwind.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
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
    <div class="page-wrapper">
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="login-card login-dark">
                        <div>
                            <div>
                                <a class="logo" href="index.html"><img class="max-w-full h-[100px] for-light"
                                        src="../assets/images/logo/logo.png" style="150px" alt="looginpage" /><img
                                        class="max-w-full h-auto for-dark" src="../assets/images/logo/logo_dark.png"
                                        alt="looginpage" /></a>
                            </div>
                            <div class="login-main">
                                <form method="POST" action="{{ route('auth.otp.verify') }}" class="theme-form">
                                    @csrf
                                    <h4>OTP Verify</h4>
                                    <p>Enter your OTP to verify your account</p>

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    @if ($errors->has('otp'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('otp') }}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="col-form-label pt-0">Enter OTP</label>
                                        <div class="grid grid-cols-1 card-gap">
                                            <div class="col-auto">
                                                <input class="form-control text-center opt-text" type="text"
                                                    name="otp" maxlength="5" value="{{ old('otp') }}"
                                                    required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
                                    </div>

                                    <div class="mt-4 mb-4 text-center">
                                        <span class="reset-password-link">
                                            Didn't receive OTP?
                                            <a id="resend-link" class="btn-link font-danger underline"
                                                href="{{ route('auth.otp.resend') }}">Resend</a>
                                            <span id="countdown" style="color:gray;"></span>
                                        </span>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let cooldown = 120; // 2 minutes in seconds
        let resendLink = document.getElementById('resend-link');
        let countdown = document.getElementById('countdown');

        function startCountdown() {
            resendLink.style.pointerEvents = 'none';
            resendLink.style.color = 'gray';
            countdown.textContent = ` (${cooldown}s)`;

            let timer = setInterval(() => {
                cooldown--;
                countdown.textContent = ` (${cooldown}s)`;
                if (cooldown <= 0) {
                    clearInterval(timer);
                    countdown.textContent = '';
                    resendLink.style.pointerEvents = 'auto';
                    resendLink.style.color = 'red';
                }
            }, 1000);
        }

        // If you want countdown to start immediately after page load (e.g., from session)
        startCountdown();
    </script>

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
