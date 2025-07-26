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
    <title>Login | Cuba - Premium Admin Template By Pixelstrap</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/fontawesome.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <!-- login page start-->
    <div class="container">
        <div class="grid grid-cols-12 m-0">
            <div class="col-span-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div>
                            <a class="logo" href="/"><img class="max-w-full h-[150px] for-light"
                                    style="height: 150px;" src="../assets/images/logo/logo.png" alt="looginpage" /><img
                                    class="max-w-full h-auto for-dark" src="../assets/images/logo/logo_dark.png"
                                    alt="looginpage" /></a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('auth.login.submit') }}">
                                @csrf

                                <h4>Sign in to account</h4>
                                <p>Enter your email & password to login</p>

                                <div class="form-group">
                                    <label class="col-form-label">Email Address / Phone Number</label>
                                    <input class="form-control" type="text" name="login"
                                        value="{{ old('login') }}" required placeholder="test@gmail.com" />
                                    @error('login')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input relative">
                                        <input class="form-control" type="password" name="password" required
                                            placeholder="*********" />
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-0">
                                    <div class="form-check flex gap-1 items-center">
                                        <input class="checkbox-primary form-check-input custom-checkbox" id="remember"
                                            type="checkbox" name="remember" />
                                        <label class="text-muted form-check-label !mb-0" for="remember">Remember
                                            password</label>
                                    </div>
                                    <a class="link" href="{{ route('auth.forgot') }}">Forgot password?</a>

                                    <div class="text-end">
                                        <button class="btn btn-primary btn-block w-full text-white mt-[24px]"
                                            type="submit">
                                            Sign in
                                        </button>
                                    </div>
                                </div>

                                <p class="text-center mt-[24px] !mb-0">
                                    Don't have an account? <a class="ms-2" href="{{ route('auth.register') }}">Create
                                        Account</a>
                                </p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <!-- feather icon js-->
        <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
        <!-- scrollbar js--><!-- Sidebar jquery-->
        <script src="{{ asset('assets/js/config.js') }}"></script>
        <script src="{{ asset('assets/js/modalpage/custom-modal.js') }}"></script>
        <!-- Plugins JS start--><!-- tooltip JS Ends-->
        <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
        <!-- Plugins JS Ends--><!-- Theme js-->
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/js/script1.js') }}"></script>
    </div>
</body>

</html>
