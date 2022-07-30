@extends('user.userMaster')


@section('bodyRight')
    <section class="section-login--right d-flex flex-column">
        <a class="col-12 company-logo" href="/">
            <img
                class="img-fluid"
                src="{{ asset('/') }}adminAsset/assets/images/logo--company-name-dark.svg"
                alt="phone list"
            />
        </a>

        <!-- START RESET PASSWORD FORM -->
        <div class="reset-form">
            <div class="card border-0 u-box-shadow-1 rounded-3">
                <div class="card-body p-5 pb-3">
                    <div class="card-title">
                        <div>
                            <h1>Reset Your Password</h1>
                        </div>
                    </div>
                    <form action="{{ route('reset.password.post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
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
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control u-box-shadow-2"
                                id="password"
                                placeholder="Type Your Password"
                                required
                                name="password"
                            />
                        </div>
                        <div class="mb-5">
                            <label for="retypePassword" class="form-label"
                            >Confirm Password</label
                            >
                            <input
                                type="password"
                                class="form-control u-box-shadow-2"
                                id="retypePassword"
                                placeholder="Type Your Password"
                                required
                                name="password_confirmation"
                            />
                        </div>

                        <button
                            type="submit"
                            class="btn btn-login rounded-3 u-box-shadow-2 mb-5"
                        >
                            Reset Password
                        </button>
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

