@extends('front.master')

@section('metaDescription')
@endsection


@section('title')

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
                        Careers
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- END BREADCRUMB -->
    <!-- START CAREERS HEADING -->
    <section class="section-careers-heading u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Join Phone List</h1>
                    <p class="section-text w-75 mx-auto my-5">
                        We are a global, digital-first team focused on our people and
                        what they require to do the best work of their careers.
                    </p>
                    <button type="button" class="btn btn-grad mx-auto">
                        See All Jobs
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- END CAREERS HEADING -->

    <!-- START VALUES -->
    <section class="section-careers-values u-padding-lg">
        <div class="container">
            <div class="row mb-5 pb-5">
                <div class="col-md-12 text-center">
                    <h2 class="careers-heading--main">Our values</h3>
                </div>
                <div class="col-md-12 text-center mx-auto">
                    <p class="careers-heading--sub ">How you succeed matters to Phone List. Here is how we work:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 px-5">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-wrench-adjustable"></i>
                            <h4 class="card-title">Ownership</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro obcaecati ratione,
                                repellat enim blanditiis magnam corrupti numquam!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-5 mt-md-0 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-bounding-box-circles"></i>
                            <h4 class="card-title">Integrity</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro obcaecati ratione,
                                repellat enim blanditiis magnam corrupti numquam!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-5 mt-md-0 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-magic"></i>
                            <h4 class="card-title">Curiosity</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro obcaecati ratione,
                                repellat enim blanditiis magnam corrupti numquam!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-gem"></i>
                            <h4 class="card-title">Excellence</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro obcaecati ratione,
                                repellat enim blanditiis magnam corrupti numquam!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-diagram-3"></i>
                            <h4 class="card-title">Teamwork</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro obcaecati ratione,
                                repellat enim blanditiis magnam corrupti numquam!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-5 mt-5">
                    <div class="card">
                        <div class="card-body mt-5 d-flex flex-column justify-content-center">
                            <h4 class="card-title mt-3">We’re all in this together
                                Working at Phone List</h4>
                            <button type="button" class="btn btn-grad mx-auto mt-4"> See all jobs</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END VALUES -->

    <!-- START MEET OUR TEAM -->
    <section class="section-careers-meet-team u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="careers-heading--main">Meet our team</h3>
                </div>
                <div class="col-md-12 text-center mx-auto">
                    <p class="careers-heading--sub text-white">We are building a company of talented people and an inclusive
                        culture.</p>
                </div>
            </div>
            <div class="row my-5 py-5">
                <div class="col-md-4 col-8 mx-auto">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="assets/images/user01.jpg" alt="founder">
                        <div class="card-body">
                            <h4 class="card-title">Dana Walton</h4>
                            <p class="card-text">Founder and CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-8 mx-auto">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="assets/images/user02.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Bryan Campos</h4>
                            <p class="card-text">Product Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-8 mx-auto">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="assets/images/user03.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Kathy Barrier</h4>
                            <p class="card-text">Engineering Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END MEET OUR TEAM -->

    <!-- START JOIN TEAM -->
    <section class="section-careers-join-team u-padding-lg">
        <div class="container">
            <div class="row mb-5 pb-5">
                <div class="col-md-12 text-center mx-auto">
                    <p class="careers-heading--sub ">Join our team</p>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-4 col-md-2">
                    <h2>
                        Engineering
                    </h2>
                </div>
                <div class="col-md-5 border-bottom pb-5">
                    <a href="#">
                        <h3>
                            Backend Software Engineer
                        </h3>
                        <p>
                            Remote, Bangladesh • Engineering
                        </p>
                    </a>
                    <a href="#">
                        <h3 class="mt-5">
                            Frontend Software Engineer
                        </h3>
                        <p>
                            Remote, Bangladesh • Engineering
                        </p>
                    </a>
                    <a href="#">
                        <h3 class="mt-5">
                            Senior Backend Engineer
                        </h3>
                        <p>
                            Remote, Bangladesh • Engineering
                        </p>
                    </a>
                </div>
            </div>
            <div class="row pt-5">
                <div class="offset-md-4 col-md-2">
                    <h2>
                        Revenue
                    </h2>
                </div>
                <div class="col-md-5 pb-5">
                    <a href="#">
                        <h3>
                            Business Systems Analyst (Remote)
                        </h3>
                        <p>
                            Remote, Bangladesh • Engineering
                        </p>
                    </a>
                    <a href="#">
                        <h3 class="mt-5">
                            Sales Operations Manager
                        </h3>
                        <p>
                            Remote, Bangladesh • Engineering
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END JOIN TEAM -->

    <!-- START CTA -->
    <section class="section-careers-cta u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>
                        Don't see the perfect fit?
                    </h2>
                    <p>
                        Think you could be an excellent part of our team, but don’t see an
                        <br>
                        exact fit? Please send us your resume!
                    </p>
                    <a href="mailto:careers@phonelist.io">careers@phonelist.io</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END CTA -->

@endsection

