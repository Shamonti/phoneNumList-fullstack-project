@extends('front.master')

@section('metaDescription')
@endsection


@section('title')
    Product | Phone List
@endsection

@section('main')
    <!-- START BREADCRUMB -->
    <hr class="mt-lg-0 mt-5 text-secondary" />
    <div class="container">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Product
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- END BREADCRUMB -->
    <section class="section-product-heading u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-5 px-5">
                    <h1 class="mb-5">
                        How can Phone List help you throughout your entire process?
                    </h1>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}" class="btn btn-grad">Try It Now</a>
                    @else
                        <a href="{{ route('loggedInUser') }}" class="btn btn-grad">Try It Now</a>
                    @endguest
                </div>
                <div class="col-md-6 px-5 pt-5 mt-md-0 mt-5">
                    <p>
                        Acre is an end-to-end mortgage platform that exists to save you
                        time, so you can grow your business.
                    </p>
                    <p>
                        By having one place for every aspect of the mortgage journey,
                        Acre cuts out the fuss. But don’t just take our word for it,
                        book a demo to see it in action for yourself.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- END PRODUCT HEADING -->

    <!-- START PRODUCT FEATURE01 -->
    <section class="section-feature01 u-padding-lg pt-xs-0">
        <div class="container">
            <div class="row">
                <div class="col-md-5 px-5">
                    <h2 class="feature-title">Find the right companies</h2>
                    <p class="feature-content">
                        Find the best companies in your territory and prioritize based
                        on technology, hiring, funding, and dozens of other triggers.
                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}" class="btn-txt mt-3"> Try It Now → </a>
                    @else
                        <a href="{{ route('loggedInUser') }}" class="btn-txt mt-3"> Try It Now → </a>
                    @endguest
                </div>
                <div class="offset-md-1 col-md-6 mt-md-0 mt-5 pt-md-0 pt-5">
                    <img
                        class="img-fluid"
                        src="{{ asset('/') }}adminAsset/assets/images/feature01.svg"
                        alt="Feature01 Illustration"
                    />
                </div>
            </div>
        </div>
    </section>
    <!-- END PRODUCT FEATURE01 -->

    <!-- START PRODUCT FEATURE02 -->
    <section class="section-feature02 u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img
                        class="img-fluid"
                        src="{{ asset('/') }}adminAsset/assets/images/feature02.svg"
                        alt="Feature02 Illustration"
                    />
                </div>
                <div class="offset-md-1 col-md-5 px-5 mt-md-0 mt-5 pt-md-0 pt-5">
                    <h2 class="feature-title">Find the right people</h2>
                    <p class="feature-content">
                        Find the best contacts at each company and search by name, job
                        title, location, and dozens of other signals.
                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}" class="btn-txt mt-3"> Try It Now → </a>
                    @else
                        <a href="{{ route('loggedInUser') }}" class="btn-txt mt-3"> Try It Now → </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    <!-- END PRODUCT FEATURE02 -->

    <!-- START PRODUCT FEATURE03 -->
    <section class="section-feature03 u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-5 px-5">
                    <h2 class="feature-title">Keep your CRM fresh and clean</h2>
                    <p class="feature-content">
                        <b class="text-dark">Append:</b>
                        Complete your picture of every lead, contact, and account
                        profile. We enrich your records with 65+ data points in the
                        Phone List Database to complete records with the data that is
                        critical for your sales strategy.
                        <br />
                        <br />
                        <b class="text-dark">Clean: </b>
                        Data decay is a rate of 20% per quarter. Let us help you
                        mitigate the headaches that come along with that. You can
                        correct, append, and update your data as time goes on for an
                        everlasting accurate database.
                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}" class="btn-txt mt-3"> Try It Now → </a>
                    @else
                        <a href="{{ route('loggedInUser') }}" class="btn-txt mt-3"> Try It Now → </a>
                    @endguest
                </div>
                <div class="offset-md-1 col-md-6 mt-md-0 mt-5 pt-md-0 pt-5">
                    <img
                        class="img-fluid"
                        src="{{ asset('/') }}adminAsset/assets/images/feature03.svg"
                        alt="Feature03 Illustration"
                    />
                </div>
            </div>
        </div>
    </section>
    <!-- END PRODUCT FEATURE03 -->

    <!-- START PRODUCT FEATURE04 -->
    <section class="section-feature04 u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img
                        class="img-fluid"
                        src="{{ asset('/') }}adminAsset/assets/images/feature04.svg"
                        alt="Feature02 Illustration"
                    />
                </div>
                <div class="offset-md-1 col-md-5 px-5 mt-md-0 mt-5 pt-md-0 pt-5">
                    <h2 class="feature-title">
                        Fix stale contacts and track your champions
                    </h2>
                    <p class="feature-content">
                        Keep your Salesforce clean with the help of Phone List Refresh.
                        Discover real-time updates to data entries every time a contact
                        changes jobs or gets promoted. Reps are continually provided the
                        information they need to connect and can quickly capitalize on
                        new business opportunities.
                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}" class="btn-txt mt-3"> Try It Now → </a>
                    @else
                        <a href="{{ route('loggedInUser') }}" class="btn-txt mt-3"> Try It Now → </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    <!-- END PRODUCT FEATURE04 -->

    <!-- START CALL TO ACTION -->
    <section class="section-cta curved-bg u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6 text-center">
                    <div class="row">
                        <div class="offset-lg-0 col-lg-12 col-md-8 offset-md-2">
                            <h3
                                class="section-title pb-4"
                                data-aos="fade-up"
                                data-aos-duration="1000"
                            >
                                Reach the right person with the right message at the right
                                time.
                            </h3>

                            <p>
                                Get started for free, then add your whole team. You can
                                always talk to sales if you’re interested in advanced plans.
                            </p>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10 col-md-6 col-10 mx-lg-0 mx-auto">
                            @guest
                                <form action="{{ route('/user/email/callback') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group py-4 mx-lg-0 mx-auto">
                                        <input
                                            type="email"
                                            class="form-control form-control--signup"
                                            placeholder="Enter your email"
                                            aria-label="Enter your email..."
                                            aria-describedby="button-signup"
                                        />
                                        <button
                                            class="btn btn-grad rounded-end-pill px-md-4 px-2"
                                            type="submit"
                                            id="button-signup"
                                        >
                                            Sign up for free
                                        </button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('loggedInUser') }}">
                                    @csrf
                                    <div class="input-group py-4 mx-lg-0 mx-auto">
                                        <input
                                                type="email"
                                                class="form-control form-control--signup"
                                                placeholder="Enter your email"
                                                aria-label="Enter your email..."
                                                aria-describedby="button-signup"
                                        />
                                        <button
                                                class="btn btn-grad rounded-end-pill px-md-4 px-2"
                                                type="submit"
                                                id="button-signup"
                                        >
                                            Sign up for free
                                        </button>
                                    </div>
                                </form>
                            @endguest
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10 col-md-6 col-7 mx-auto mx-lg-0">
                            <div class="divider mt-4 mb-3 mx-lg-0 mx-auto">
                                <div class="divider--line me-5"></div>
                                <span>OR</span>
                                <div class="divider--line ms-5"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        @guest
                            <div class="col-lg-10 col-md-6 col-8 mx-auto mx-lg-0">
                                <div class="google-signup mx-lg-0 mx-auto">
                                    <a
                                        type="button"
                                        class="btn btn-google-login u-box-shadow-2"
                                        href="{{ route('/auth/google') }}"
                                    >
                                        <img
                                            src="{{ asset('/') }}adminAsset/assets/images/icons/google.svg"
                                            alt="google logo"
                                            class="me-2 img-fluid"
                                        />
                                        Sign up with google
                                    </a>
                                </div>
                                <div class="facebook-signup mx-lg-0 mx-auto mt-4">
                                    <a
                                        type="button"
                                        class="btn btn-facebook-login u-box-shadow-2"
                                        href="{{ url('auth/facebook') }}"
                                    >
                                        <img
                                            src="{{ asset('/') }}adminAsset/assets/images/icons/facebook.svg"
                                            alt="facebook logo"
                                            class="me-2 img-fluid"
                                        />
                                        Sign up with facebook
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-10 col-md-6 col-8 mx-auto mx-lg-0">
                                <div class="google-signup mx-lg-0 mx-auto">
                                    <a
                                            type="button"
                                            class="btn btn-google-login u-box-shadow-2"
                                            href="{{ route('loggedInUser') }}"
                                    >
                                        <img
                                                src="{{ asset('/') }}adminAsset/assets/images/icons/google.svg"
                                                alt="google logo"
                                                class="me-2 img-fluid"
                                        />
                                        Sign up with google
                                    </a>
                                </div>
                                <div class="facebook-signup mx-lg-0 mx-auto mt-4">
                                    <a
                                            type="button"
                                            class="btn btn-facebook-login u-box-shadow-2"
                                            href="{{ route('loggedInUser') }}"
                                    >
                                        <img
                                                src="{{ asset('/') }}adminAsset/assets/images/icons/facebook.svg"
                                                alt="facebook logo"
                                                class="me-2 img-fluid"
                                        />
                                        Sign up with facebook
                                    </a>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CALL TO ACTION -->

@endsection
