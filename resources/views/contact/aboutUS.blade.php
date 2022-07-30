@extends('front.master')

@section('metaDescription')
@endsection


@section('title')
    About Us | Phone List
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
                        About Us
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- END BREADCRUMB -->
    <!-- START ABOUT US HEADING -->
    <section class="section-aboutUs u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="heading--main">About Phone List</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT US HEADING -->

    <!-- START ABOUT US -->
    <section class="section-aboutUs u-padding-lg pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="heading--sub">Who is Phone List?</h2>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet, elit. Repudiandae aliquid,
                        temporibus debitis laudantium!
                    </p>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet, temporibus debitis laudantium!
                        Dolores quia deserunt expedita, odio maxime sunt sapiente quod
                        aliquam!
                    </p>

                    <h2 class="heading--sub pt-5">How did Phone List start?</h2>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet, elit. Repudiandae aliquid,
                        temporibus debitis laudantium!
                    </p>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet, temporibus debitis laudantium!
                        Dolores quia deserunt expedita, odio maxime sunt sapiente quod
                        aliquam!
                    </p>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                        corrupti natus et tempore recusandae corporis nostrum!
                        Consectetur vero excepturi repellendus laudantium placeat
                        nesciunt laboriosam, assumenda adipisci, perspiciatis, est ab!
                        Perferendis.
                    </p>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                        corrupti natus et tempore recusandae corporis nostrum!
                        Consectetur vero excepturi repellendus laudantium placeat
                        nesciunt laboriosam, assumenda adipisci, perspiciatis, est ab!
                        Perferendis.
                    </p>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                        perspiciatis, est ab! Perferendis.
                    </p>
                </div>
                <div class="col-md-6 px-5 mt-md-0 mt-5 pt-md-0 pt-5">
                    <img
                            class="img-fluid h-md-50"
                            src="{{ asset('/') }}/adminAsset/assets/images/about01.svg"
                            alt="About Us Illustration"
                    />
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT US -->

    <!-- START MAP -->
    <section class="section-aboutUs section-map u-padding-lg pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 px-5">
                    <iframe
                            width="100%"
                            height="100%"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.699905567123!2d89.3940830153348!3d24.771476354917976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fc532d765d6431%3A0xed5c968aae4aa39c!2sMajhira%20Bazaar%20Bus%20Stop!5e0!3m2!1sen!2sbd!4v1644484915823!5m2!1sen!2sbd"
                            frameborder="0"
                            scrolling="no"
                            marginheight="0"
                            marginwidth="0"
                    ></iframe>
                </div>
                <div class="col-md-6 mt-md-0 mt-5 pt-md-0 pt-5">
                    <h2 class="heading--sub">How to find us?</h2>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                        corrupti natus et tempore recusandae corporis nostrum!
                        Consectetur vero excepturi repellendus laudantium placeat
                        nesciunt laboriosam, assumenda adipisci, perspiciatis, est ab!
                        Perferendis.
                    </p>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                        corrupti natus et tempore recusandae corporis nostrum!
                        Consectetur vero excepturi repellendus laudantium placeat
                        nesciunt laboriosam, assumenda adipisci, perspiciatis, est ab!
                        Perferendis.
                    </p>
                    <p class="section-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                        perspiciatis, est ab! Perferendis.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- END MAP -->

@endsection
