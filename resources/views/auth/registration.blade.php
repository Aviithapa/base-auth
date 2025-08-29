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
    <title>Sign-up | Cuba - Premium Admin Template By Pixelstrap</title>
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
    <!-- login page start-->
    <div class="container">
        <div class="grid grid-cols-12 m-0">
            <div class="col-span-12">
                <div class="login-card login-dark">
                    <div>
                        <div>
                            <a class="logo" href="index.html"><img class="max-w-full h-[100px] for-light"
                                    src="../assets/images/logo/logo.png" style="height: 100px;" alt="looginpage" /><img
                                    class="max-w-full h-auto for-dark" src="../assets/images/logo/logo_dark.png"
                                    alt="looginpage" /></a>
                        </div>
                        <div class="login-main create-account">
                            <form method="POST" action="{{ route('auth.register.submit') }}" class="theme-form">
                                @csrf
                                <h4>Create your account</h4>
                                <p>Enter your personal details to create account</p>

                                <div class="form-group mb-6 flex gap-4 justify-center">
                                    <div id="role-expert"
                                        class="role-card cursor-pointer border p-5 text-center rounded-lg shadow hover:bg-blue-100 flex-1 flex flex-col justify-center items-center">
                                        <h3 class="text-lg font-semibold mb-2">Expert</h3>
                                        <p class="text-sm text-gray-600">Sign up to provide training</p>
                                    </div>

                                    <div id="role-applicant"
                                        class="role-card cursor-pointer border p-5 text-center rounded-lg shadow hover:bg-blue-100 flex-1 flex flex-col justify-center items-center">
                                        <h3 class="text-lg font-semibold mb-2">Applicant</h3>
                                        <p class="text-sm text-gray-600">Sign up to learn and register for training.</p>
                                    </div>

                                    <!-- Hidden input for backend -->
                                    <input type="hidden" name="role" id="roleInput" value="">
                                </div>


                                <div class="form-group">
                                    <label class="col-form-label pt-0">Your Name</label>
                                    <div class="grid grid-cols-12 gap-2">
                                        <div class="col-span-12 sm:col-span-12">
                                            <input name="name" class="form-control" type="text"
                                                placeholder="Full name" value="{{ old('name') }}" />
                                            @error('name')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input name="email" class="form-control" type="email"
                                        placeholder="test@gmail.com" value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Phone </label>
                                    <input name="phone" class="form-control" type="phone" placeholder="9867XXXXXX"
                                        value="{{ old('phone') }}" />
                                    @error('phone')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input relative">
                                        <input name="password" class="form-control" type="password"
                                            placeholder="*********" />
                                    </div>
                                    @error('password')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input name="terms" id="terms" type="checkbox"
                                            {{ old('terms') ? 'checked' : '' }} />

                                        <label class="text-muted" for="terms">
                                            I agree to the terms & conditions and <a class="ms-2"
                                                href="#">Privacy
                                                Policy</a>
                                        </label>
                                        @error('terms')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary btn-block w-full mt-2" type="submit">
                                        Create Account
                                    </button>
                                </div>

                                <p class="mt-4 mb-0">
                                    Already have an account?<a class="ms-2" href="/auth/login">Sign in</a>
                                </p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
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
        <script>
            const roleCards = document.querySelectorAll('.role-card');
            const roleInput = document.getElementById('roleInput');

            // Function to select a card
            function selectCard(card) {
                roleCards.forEach(c => c.classList.remove('bg-primary', 'text-white'));
                card.classList.add('bg-primary', 'text-white');
                roleInput.value = card.querySelector('h3').textContent.trim();
            }

            // Set default selection to Applicant
            const defaultCard = document.getElementById('role-applicant');
            selectCard(defaultCard);

            // Add click event to all cards
            roleCards.forEach(card => {
                card.addEventListener('click', () => selectCard(card));
            });
        </script>

    </div>
</body>

</html>
