@extends('user.userMaster')


@section('bodyRight')
    <section class="section-login--right d-flex flex-column">


        <!-- START LOGIN FORM -->
        <div class="login-form">
            <div class="card border-0 u-box-shadow-1 rounded-3">
                <div class="col-12 company-logo">
                    <img src="{{ asset('/') }}adminAsset/assets/images/logo--company-name-dark.svg" alt="logo" />
                </div>
                <div class="card-title d-flex">
                    <a href="{{ route('/phonelistUserLogin') }}" class="login p-4">Log in</a>
                    <a href="{{ route('/phonelistUserRegister') }}" class="signup p-4"
                    >Sign up <i class="bi bi-box-arrow-up-right ms-2"></i>
                    </a>
                </div>
                <div class="card-body p-5 pb-3">
                    <div class="card-title">
                        <div>
                            <a
                                type="button"
                                class="btn btn-google-login u-box-shadow-2"
                                href="{{ route('/auth/google') }}"
                            >
                                <img
                                    src="{{ asset('/') }}adminAsset/assets/images/icons/google.svg"
                                    alt="google logo"
                                    class="me-2"
                                />
                                Log in with google
                            </a>
                            <a
                                type="button"
                                class="btn btn-facebook-login u-box-shadow-2 mt-4"
                                href="{{ url('auth/facebook') }}"
                            >
                                <i class="bi bi-facebook me-2"></i>
                                Log in with facebook
                            </a>
                        </div>
                        <div class="divider mt-4 mb-3">
                            <div class="divider--line me-5"></div>
                            <div>OR</div>
                            <div class="divider--line ms-5"></div>
                        </div>
                    </div>
                    <form action="{{ route('/phonelistUserLoginAuth') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control u-box-shadow-2"
                                id="email"
                                placeholder="Enter Your Email"
                                required
                                name="email"
                            />
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control u-box-shadow-2"
                                id="password"
                                placeholder="Enter Your Password"
                                required
                                name="password"
                            />
                            @if($message = Session::get('message'))
                                <div id="error-text">
                                    <i
                                        class="bi bi-exclamation-circle-fill text-danger pe-2"
                                    ></i>
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                </div>
                        @endif
                        <!-- An element to toggle between password visibility -->
                            <div class="input-group align-items-center my-1">
                                <input type="checkbox" onclick="showPassword()" />
                                <label for="checkbox" class="ps-2" style="line-height: 1">
                                    Show Password
                                </label>
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="btn btn-login rounded-3 u-box-shadow-2 mb-5"
                        >
                            Log In
                        </button>
                        <div class="mb-4 form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="check"
                                name="remember"
                                value="1"
                            />
                            <label class="form-check-label ms-3" for="check"
                            >Keep me signed in</label
                            >
                        </div>
                        <div class="card-footer">
                            <p>
                                Forgot your password?
                                <span id="reset-password">Reset It Here</span>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END LOGIN FORM -->

        <!-- START RESET PASSWORD FORM -->
        <div class="reset-form hide">
            <div class="card border-0 u-box-shadow-1 rounded-3">
                <div class="card-body p-5 pb-3">
                    <div class="card-title">
                        <div>
                            <h1>Reset Your Password</h1>
                            <h2>
                                Please enter your email address below to which we can send
                                you instructions.
                            </h2>
                        </div>
                    </div>
                    <form action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control u-box-shadow-2"
                                id="email"
                                placeholder="Type Your Email"
                                required
                                name="email"
                            />
                        </div>
                        <div class="mb-5">
                            <label for="retypeEmail" class="form-label"
                            >Confirm Email</label
                            >
                            <input
                                type="email"
                                class="form-control u-box-shadow-2"
                                id="retypeEmail"
                                placeholder="Re-type Your Email"
                                required
                            />
                        </div>

                        <button
                            type="submit"
                            class="btn btn-login rounded-3 u-box-shadow-2 mb-5"
                        >
                            Send Instructions
                        </button>

                        <div class="card-footer">
                            <p>
                                Have an account?
                                <span id="login-here">Login Here</span>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END RESET PASSWORD FORM -->

        <!-- START FOOTER -->
        <footer>
            <div class="section-footer">
                <p>2022 All Rights Reserved.</p>
                <p>
                    <a href="privacy_policy.html">Privacy</a>
                    and <a href="terms-of-service.html">Terms</a>.
                </p>
            </div>
        </footer>
        <!-- END FOOTER -->
    </section>
@endsection
