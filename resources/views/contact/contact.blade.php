@extends('front.master')

@section('metaDescription')
@endsection


@section('title')
    Contact Us | Phone List
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
                        Contact Us
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- END BREADCRUMB -->
    <!-- START CONTACT FORM -->
    <section class="section-contact u-padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pe-md-5">
                    <h1 class="heading--main mb-5">
                        Contact <br />
                        Us
                    </h1>
                    <p class="section-text">
                        Curious about all the opportunities of growing your business
                        using Phone List? Got a technical question? Perhaps you’re
                        interested in partnering with us. Well, we’ve got your back. Let
                        us know how we can help.
                        <br />
                        👋
                    </p>
                </div>

                <div class="col-md-6 ps-md-5">
                    <form class="contact-form" action="">
                        <div class="form-field">
                            <input
                                id="fname"
                                class="input-text js-input"
                                type="text"
                                required
                            />
                            <label class="label" for="fname">First Name*</label>
                        </div>
                        <div class="form-field">
                            <input
                                id="lname"
                                class="input-text js-input"
                                type="text"
                                required
                            />
                            <label class="label" for="lname">Last Name*</label>
                        </div>
                        <div class="form-field">
                            <input
                                id="email"
                                class="input-text js-input"
                                type="email"
                                required
                            />
                            <label class="label" for="email">Email*</label>
                        </div>
                        <div class="form-field">
                  <textarea
                      id="message"
                      class="textarea-text js-input"
                      type="text"
                  ></textarea>
                            <label class="label" for="message"
                            >How can we help you?</label
                            >
                        </div>
                        <div class="form-field align-center">
                            <button class="btn btn-purple" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTACT FORM -->
@endsection
