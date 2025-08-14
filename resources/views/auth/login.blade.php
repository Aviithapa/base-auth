@extends('auth.layout.app')

@section('content')
    <div class="container">
        <div class="grid grid-cols-12 m-0">
            <div class="col-span-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div>
                            <a class="logo" href="/"><img class="max-w-full h-[150px] for-light" style="height: 150px;"
                                    src="{{ asset('assets/images/logo/logo.png') }}" alt="looginpage" /><img
                                    class="max-w-full h-auto for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                    alt="looginpage" /></a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('auth.login.submit') }}">
                                @csrf

                                <h4>Sign in to account</h4>
                                <p>Enter your email & password to login</p>

                                <div class="form-group">
                                    <label class="col-form-label">Email Address / Phone Number</label>
                                    <input class="form-control" type="text" name="login" value="{{ old('login') }}"
                                        required placeholder="test@gmail.com" />
                                    @error('login')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input relative">
                                        <input class="form-control" type="password" name="password" required
                                            placeholder="*********" />
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
@endsection
