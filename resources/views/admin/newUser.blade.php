@extends('admin.master')


@section('title')
    Dashboard
@endsection

@section('body')
    <section class="section-dashboard--main section-dashboard--addUser custom-scrollbar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-8 pop-up-message--box me-0">
                    <div class="card ">
                        @if(isset($message))
                            <div class="card-body">
                                🎉
                                <span>{{ $message }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- START USER FORM -->
            <div class="row mt-5">
                <div class="col-md-6 mx-auto mt-5">
                    <div class="signup-form addUser-form">
                        <div class="card border-0 rounded-3">
                            <div class="card-body p-5 pb-3">
                                <form action="{{ route('add.new.user.by.admin') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control u-box-shadow-2" id="email" name="email" placeholder="Enter Your Email"
                                               required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control u-box-shadow-2" id="password" name="password"
                                               placeholder="Enter Your Password" required>
                                        <!-- An element to toggle between password visibility -->
                                        <div class="input-group align-items-center my-1">
                                            <input type="checkbox" onclick="showPassword()">
                                            <label for="checkbox" class="ps-2" style="line-height: 1">
                                                Show Password
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control u-box-shadow-2" id="fname" name="firstName"
                                               placeholder="Enter Your First Name" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control u-box-shadow-2" id="lname" name="lastName"
                                               placeholder="Enter Your Last Name" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="number" class="form-label">Phone Number</label>
                                        <input type="number" class="form-control u-box-shadow-2" id="number" name="phone"
                                               placeholder="Enter Your Phone Number" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="country" class="form-label">Country</label>

                                        <select id="country" name="country" class="form-control form-control--option" required>
                                            <option disabled selected>Select Country</option>
                                            @foreach($country as $countries)
                                                <option value="{{ $countries->countryname }}" >{{ $countries->countryname }} ({{ $countries->countrycode }})</option>
                                            @endforeach
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-purple rounded-3 u-box-shadow-2 mt-5 mb-4 px-5 mx-auto bg-primary">
                                        ADD USER
                                    </button>
                                    <div class="card-footer">
                                        <p>
                                            Forgot a user's password?
                                            <span id="reset-password">Reset It Here</span>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END USER FORM -->

            <!-- START RESET PASSWORD FORM -->
            <div class="reset-form hide mt-5">
                <div class="card border-0 rounded-3">
                    <div class="card-body p-5 pb-3">
                        <div class="card-title text-center">
                            <div>
                                <h1>Reset Password</h1>
                            </div>
                        </div>
                        <form action="{{ route('reset.user.password') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="mb-5">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control u-box-shadow-2" placeholder="Type Email" required />
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control u-box-shadow-2" id="password-reset"
                                       placeholder="Enter Password" required>
                                <!-- An element to toggle between password visibility -->
                                <div class="input-group align-items-center my-1">
                                    <input type="checkbox" onclick="showResetPassword()">
                                    <label for="checkbox" class="ps-2" style="line-height: 1">
                                        Show Password
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-purple rounded-3 u-box-shadow-2 mt-5 mb-4 px-5 mx-auto bg-primary">
                                Reset Password
                            </button>

                            <div class="card-footer">
                                <p>
                                    Add a new user?
                                    <span id="addUser-here">Add User Here</span>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END RESET PASSWORD FORM -->
        </div>
    </section>
    <!-- END MAIN BODY -->
@endsection





