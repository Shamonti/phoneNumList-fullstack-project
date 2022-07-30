
@extends('front.master')

@section('metaDescription')
@endsection


@section('title')
    Find Mobile Numbers | Phone List
@endsection

@section('main')
    <!-- START BANNER -->
    <section class="section-banner u-padding-lg">
        <div class="container">
            <div class="row my-3">
                <div class="bg-pink"></div>
                <div class="col-lg-6 text-lg-start text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-lg-start justify-content-center align-items-center pb-3">
                                <span class="heading--sub">Get</span>
                                <h1 class="heading--sub mb-0">
                                    <strong>&nbsp;phone number list&nbsp;</strong>
                                </h1>
                                <span class="heading--sub">to</span>
                            </div>
                            <p class="heading--main pb-4" id="bannerText">
                                Crush your sales numbers every quarter
                            </p>
                            <p class="d-flex m-0 p-0">
                                Find and engage your future customers at the right time with
                                the right message using our 100% accurate and active
                            <h2 style="color: #7a7e8b; font-weight: 600; line-height: 1.5;">
                                mobile number list
                            </h2>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 col-md-6 col-12 mx-lg-0 mx-auto">
                            @guest
                                <form action="{{ route('/user/email/callback') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group py-4 mx-lg-0 mx-auto">
                                        <input type="email" name="email" class="form-control form-control--signup" placeholder="Enter your email"
                                               aria-label="Enter your email..." aria-describedby="button-signup" />
                                        <button class="btn btn-grad rounded-end-pill px-md-4 px-2" type="submit" id="button-signup">
                                            Sign up for free
                                        </button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('loggedInUser') }}">
                                    @csrf
                                    <div class="input-group py-4 mx-lg-0 mx-auto">
                                        <input type="email" name="email" class="form-control form-control--signup" placeholder="Enter your email"
                                               aria-label="Enter your email..." aria-describedby="button-signup" />
                                        <button class="btn btn-grad rounded-end-pill px-md-4 px-2" type="submit" id="button-signup">
                                            Sign up for free
                                        </button>
                                    </div>
                                </form>
                            @endguest

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 col-md-6 col-7 mx-auto mx-lg-0">
                            <div class="divider mt-3 mb-3 mx-lg-0 mx-auto">
                                <div class="divider--line me-5"></div>
                                <span>OR</span>
                                <div class="divider--line ms-5"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 col-md-6 col-8 mx-auto mx-lg-0">
                            @guest
                                <div class="google-signup mx-lg-0 mx-auto">
                                    <a type="button" class="btn btn-google-login u-box-shadow-2" href="{{ route('/auth/google') }}">
                                        <img src="{{ asset('/') }}/adminAsset/assets/images/icons/google.svg" alt="google logo" class="me-2" />
                                        Sign up with google
                                    </a>
                                </div>
                                <div class="facebook-signup mx-lg-0 mx-auto mt-4">
                                    <a type="button" class="btn btn-facebook-login u-box-shadow-2" href="{{ url('auth/facebook') }}">
                                        <img src="{{ asset('/') }}/adminAsset/assets/images/icons/facebook.svg" alt="facebook logo" class="me-2" />
                                        Sign up with facebook
                                    </a>
                                </div>
                            @else
                                <div class="google-signup mx-lg-0 mx-auto">
                                    <a type="button" class="btn btn-google-login u-box-shadow-2" href="{{ route('loggedInUser') }}">
                                        <img src="{{ asset('/') }}/adminAsset/assets/images/icons/google.svg" alt="google logo" class="me-2" />
                                        Sign up with google
                                    </a>
                                </div>
                                <div class="facebook-signup mx-lg-0 mx-auto mt-4">
                                    <a type="button" class="btn btn-facebook-login u-box-shadow-2" href="{{ route('loggedInUser') }}">
                                        <img src="{{ asset('/') }}/adminAsset/assets/images/icons/facebook.svg" alt="facebook logo" class="me-2" />
                                        Sign up with facebook
                                    </a>
                                </div>
                            @endguest

                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-lg-flex banner-bg d-none">
                    <img src="{{ asset('/') }}/adminAsset/assets/images/banner.svg" alt="phone number list" class="banner-bg--img" />
                </div>
            </div>
        </div>
    </section>
    <!-- END BANNER -->

    <!-- START SERVICES -->
    <section class="section-services bg-light u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-5 mb-4">
                    <h3 class="section-title text-center text-uppercase" data-aos="fade-up" data-aos-duration="1000">
                        Our Services
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 px-5">
                    <div class="card border-0 h-100">
                        <div class="card-body">
                            <i class="bi bi-clipboard-check"></i>
                            <h4 class="card-title mb-3 px-5">
                                Find updated and active data
                            </h4>
                            <p class="card-text">
                                Get all active database with 100% accurate data. <br />

                                All leads are double verified which keeps you away from
                                wasting precious time.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-5 mt-md-0 mt-5">
                    <div class="card border-0 h-100">
                        <div class="card-body">
                            <i class="bi bi-clock-history"></i>
                            <h4 class="card-title mb-3 px-3">Save months of research</h4>
                            <p class="card-text py-3">
                                Use our filters to find the database that suits you the
                                best. <br />

                                Stop wasting time looking for the right category and find
                                the phone number list that your company needs.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-5 mt-md-0 mt-5">
                    <div class="card border-0 h-100">
                        <div class="card-body">
                            <i class="bi bi-hand-thumbs-up"></i>
                            <h4 class="card-title mb-3 px-5">Get started for FREE</h4>
                            <p class="card-text py-3">
                                100% free starter plan with more than 50K phone numbers for
                                you to get started. <br />
                                Check-out the accuracy of our database now!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICES -->

    <!-- START SERVICE01 DETAILS -->
    <section class="section-service01 u-padding-lg">
        <div class="container">
            <div class="row" style="overflow-x: hidden">
                <div class="col-md-8 pe-5 d-flex flex-column justify-content-center" data-aos="fade-left"
                     data-aos-duration="1000">
                    <h3 class="section-title mb-5">
                        100% accuracy guaranteed
                    </h3>
                    <p class="section-text">
                        Phone List has experts who are collecting data from all over the world. We are collecting information from reliable sources and after a lot of research, we are putting the data onto the website. This contact database will surely increase your sales leads. Again, every detail of a person like a person’s name, address, gender, postal code, etc that you will get is 100% accurate and active. If you get any of our data to be inaccurate or if it bounces back, we will provide credits for that data and that’s a promise we keep.
                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @else
                        <a href="{{ route('loggedInUser') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @endguest

                </div>
                <div class="col-md-4 p-5 mt-5 mt-md-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <img src="{{ asset('/') }}/adminAsset/assets/images/service01.svg" class="img-fluid" alt="service illustration" />
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICE01 DETAILS -->

    <!-- START SERVICE02 DETAILS -->
    <section class="section-service02 bg-light u-padding-lg">
        <div class="container">
            <div class="row" style="overflow-x: hidden">
                <div class="col-md-4 p-5 mt-5 mt-md-0" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                    <img src="{{ asset('/') }}/adminAsset/assets/images/service02.svg" class="img-fluid" alt="service illustration" />
                </div>
                <div class="col-md-8 pe-5 d-flex flex-column justify-content-center" data-aos="fade-right"
                     data-aos-duration="1000">
                    <h3 class="section-title mb-5">
                        Easy to Search, Buy and Download

                    </h3>
                    <p class="section-text">
                        From the Phone List website, you can easily find the expecting contact details you are looking after as our search engine is very accurate. Again all the mobile number lists are very easy to buy, you can purchase any service within a minute. In the end, the contact database is also simple to download. So any unfamiliar and inexperienced person can easily follow the process and get the contact list from Phone List.
                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @else
                        <a href="{{ route('loggedInUser') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @endguest
                </div>

            </div>
        </div>
    </section>
    <!-- END SERVICE02 DETAILS -->

    <!-- START SERVICE03 DETAILS -->
    <section class="section-service03 u-padding-lg">
        <div class="container">
            <div class="row" style="overflow-x: hidden">
                <div class="col-md-8 pe-5 d-flex flex-column justify-content-center" data-aos="fade-left"
                     data-aos-duration="1000">
                    <h3 class="section-title mb-5">
                        Customizable Service
                    </h3>
                    <p class="section-text">
                        Phone List is allowing you to customize any contact details according to your business needs. Hence, you are getting the opportunity to choose whatever mobile number list you want to buy. Here you have the options to maximize or minimize the data and also that will come with your budget price. You can also choose a database based on your personal preference. For example, you can buy any profession's database or any state's database from our website.

                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @else
                        <a href="{{ route('loggedInUser') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @endguest
                </div>
                <div class="col-md-4 p-5 mt-5 mt-md-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <img src="{{ asset('/') }}/adminAsset/assets/images/service03.svg" class="img-fluid" alt="service illustration" />
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICE03 DETAILS -->

    <!-- START COUNTER -->
    <section class="section-counter bg-light u-padding-lg">
        <div class="row">
            <div class="col-md-5">
                <div class="card border-0 bg-transparent">
                    <div class="card-body text-md-start mb-md-0 mb-5">
                        <h4 class="card-title">
                            Trusted by over hundreds of sales users worldwide
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-7 d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="card border-0 bg-transparent">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <span class="counter" data-count="{{ $rowcount }}"> 0 </span>
                                </h4>
                                <p class="card-text">mobile numbers</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <div class="card border-0 bg-transparent">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <span class="counter" data-count="{{ $rowcount2 }}"> 0 </span>
                                </h4>
                                <p class="card-text">addresses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6 offset-lg-0 offset-3">
                        <div class="card border-0 bg-transparent">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <span class="counter" data-count="1000">0</span>
                                </h4>
                                <p class="card-text">paying customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END COUNTER -->

    <!-- START SERVICE04 DETAILS -->
    <section class="section-service04 u-padding-lg">
        <div class="container">
            <div class="row" style="overflow-x: hidden">
                <div class="col-md-4 p-5" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                    <img src="{{ asset('/') }}/adminAsset/assets/images/service04.svg" class="img-fluid" alt="service illustration" />
                </div>
                <div class="col-md-8 ps-5 d-flex flex-column justify-content-center" data-aos="fade-right"
                     data-aos-duration="1000" data-aos-delay="300">
                    <h3 class="section-title mb-5">
                        Affordable Buying Price
                    </h3>
                    <p class="section-text">
                        Phone List understands the value of your money. Therefore, we are giving you the mobile number list at a very low price as we can afford it. All our mobile number list packages are very affordable so anyone can buy this contact database from Phone List. By doing that Phone List is showing the world that we are a business-friendly website. Overall, you are getting high-quality contact details at an amazingly cheap price. This bulk price proves that we are very keen to support others in their financial journey.
                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @else
                        <a href="{{ route('loggedInUser') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICE04 DETAILS -->

    <!-- START SERVICE05 DETAILS -->
    <section class="section-service05 bg-light u-padding-lg">
        <div class="container">
            <div class="row" style="overflow-x: hidden">
                <div class="col-md-8 pe-5 d-flex flex-column justify-content-center" data-aos="fade-left"
                     data-aos-duration="1000">
                    <h3 class="section-title mb-5">
                        International Product
                    </h3>
                    <p class="section-text">
                        Through these contact details, you can go beyond borders. By purchasing this you can get connected with high-profile people. Purchasing these mobile leads will provide you with the latest and active contact number list from all over the world. From here you can get more publicity for your business or company and it will enhance your company image. Because of this contact number product, people from all over the world can see your business. In conclusion, it will help you to build your company as a multinational company.
                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @else
                        <a href="{{ route('loggedInUser') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @endguest
                </div>
                <div class="col-md-4 p-5 mt-5 mt-md-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <img src="{{ asset('/') }}/adminAsset/assets/images/service05.svg" class="img-fluid" alt="service illustration" />
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICE05 DETAILS -->

    <!-- START SERVICE06 DETAILS -->
    <section class="section-service06 u-padding-lg">
        <div class="container">
            <div class="row" style="overflow-x: hidden">
                <div class="col-md-4 p-5 mt-5 mt-md-0" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                    <img src="{{ asset('/') }}/adminAsset/assets/images/service06.svg" class="img-fluid" alt="service illustration" />
                </div>
                <div class="col-md-8 pe-5 d-flex flex-column justify-content-center" data-aos="fade-right"
                     data-aos-duration="1000">
                    <h3 class="section-title mb-5">
                        Usable on any CRM platform
                    </h3>
                    <p class="section-text">
                        Phone List works so exquisitely whenever it comes to collecting contact details. After download, you will receive the data as a CSV file. Fuse the file into your sales CRM. Therefore, you can use the database on any CRM platform. So you can say that CRM sales are very much possible with this data prospect. By doing this you can generate an extensive network for your business. The larger you can create your network the more sales leads you will get.
                    </p>
                    @guest
                        <a href="{{ route('/phonelistUserRegister') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @else
                        <a href="{{ route('loggedInUser') }}"class="btn-txt mt-3">
                            Get Started →
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICE06 DETAILS -->

    <!-- START TESTIMONIAL -->
    <section class="section-testimonial bg-light u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title text-center text-uppercase" data-aos="fade-up" data-aos-duration="1000">
                        Customers love the ease <br />
                        and simplicity
                    </h3>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-md-12">
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-img-top img-fluid rounded-circle" src="{{ asset('/') }}/adminAsset/assets/images/user01.jpg"
                                         alt="User01 Image" />

                                    <div class="card-body">
                                        <blockquote class="card-text">
                                            Extremely reliable, high quality service, and very competitive prices. Excellent! The very best
                                            data firm we’ve ever worked with.
                                        </blockquote>
                                        <blockquote class="card-text">
                                            - Donna R. Fuentes
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-img-top img-fluid rounded-circle" src="{{ asset('/') }}/adminAsset/assets/images/user02.jpg"
                                         alt="User02 Image" />

                                    <div class="card-body">
                                        <blockquote class="card-text">
                                            Good data, which we have successfully used for our campaigns.
                                        </blockquote>
                                        <blockquote class="card-text">
                                            - Matthew L. McNulty
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-img-top img-fluid rounded-circle" src="{{ asset('/') }}/adminAsset/assets/images/user03.jpg"
                                         alt="User03 Image" />

                                    <div class="card-body">
                                        <blockquote class="card-text">
                                            Positive feedbacks and response on the mobile number list data received from Phone List.
                                        </blockquote>
                                        <blockquote class="card-text">
                                            - Kimberly E. Scott
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END TESTIMONIAL -->

    <!-- START CALL TO ACTION -->
    <section class="section-cta u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6 text-center">
                    <div class="row">
                        <div class="offset-lg-0 col-lg-12 col-md-8 offset-md-2">
                            <h3 class="section-title pb-4" data-aos="fade-up" data-aos-duration="1000">
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
                                        <input type="email" name="email" class="form-control form-control--signup" placeholder="Enter your email"
                                               aria-label="Enter your email..." aria-describedby="button-signup" />
                                        <button class="btn btn-grad rounded-end-pill px-md-4 px-2" type="submit" id="button-signup">
                                            Sign up for free
                                        </button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('loggedInUser') }}">
                                    @csrf
                                    <div class="input-group py-4 mx-lg-0 mx-auto">
                                        <input type="email" name="email" class="form-control form-control--signup" placeholder="Enter your email"
                                               aria-label="Enter your email..." aria-describedby="button-signup" />
                                        <button class="btn btn-grad rounded-end-pill px-md-4 px-2" type="submit" id="button-signup">
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
                        <div class="col-lg-10 col-md-6 col-8 mx-auto mx-lg-0">
                            @guest
                                <div class="google-signup mx-lg-0 mx-auto">
                                    <a type="button" class="btn btn-google-login u-box-shadow-2" href="{{ route('/auth/google') }}">
                                        <img src="{{ asset('/') }}/adminAsset/assets/images/icons/google.svg" alt="google logo" class="me-2" />
                                        Sign up with google
                                    </a>
                                </div>
                                <div class="facebook-signup mx-lg-0 mx-auto mt-4">
                                    <a type="button" class="btn btn-facebook-login u-box-shadow-2" href="{{ url('auth/facebook') }}">
                                        <img src="{{ asset('/') }}/adminAsset/assets/images/icons/facebook.svg" alt="facebook logo" class="me-2" />
                                        Sign up with facebook
                                    </a>
                                </div>
                            @else
                                <div class="google-signup mx-lg-0 mx-auto">
                                    <a type="button" class="btn btn-google-login u-box-shadow-2" href="{{ route('loggedInUser') }}">
                                        <img src="{{ asset('/') }}/adminAsset/assets/images/icons/google.svg" alt="google logo" class="me-2" />
                                        Sign up with google
                                    </a>
                                </div>
                                <div class="facebook-signup mx-lg-0 mx-auto mt-4">
                                    <a type="button" class="btn btn-facebook-login u-box-shadow-2" href="{{ route('loggedInUser') }}">
                                        <img src="{{ asset('/') }}/adminAsset/assets/images/icons/facebook.svg" alt="facebook logo" class="me-2" />
                                        Sign up with facebook
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CALL TO ACTION -->


@endsection






