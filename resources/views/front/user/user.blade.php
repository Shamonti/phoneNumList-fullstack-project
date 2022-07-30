@extends('front.master')

@section('metaDescription')
    {{ $data->first_name.' '.$data->last_name }}'s Contact Details with mobile number and address from Phone List
@endsection


@section('title')
    {{ $data->first_name.' '.$data->last_name }}'s Contact Details | Phone List
@endsection

@section('main')
    <!-- START BREADCRUMB -->
    <hr class="mt-lg-0 mt-5 text-secondary" />
    <div class="container">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category', ['id' => 'A']) }}">People</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data->first_name.' '.$data->last_name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- END BREADCRUMB -->
    <!-- START SEARCH BARS -->
    <section class="section-searchbar pt-md-5 pb-md-4 py-2 mt-md-0 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-6 ms-md-auto">
                    <div class="row">
                        <form id="searchPeopleByName" action="{{ route('userSearch') }}">
                            @csrf
                            <div class="col-12">
                                <input type="text" name="searchPeople" id="searchPeopleName"
                                       class="searchBar bg-white border-5 text-dark fw-normal col-md-9 col-8"
                                       placeholder="Search by Name..." autocomplete="off"/>
                                <button type="submit" class="btn btn-purple">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
                <a hidden>{{ $dataId = 'Afghanistan' }}</a>
                <div class="col-md-3 col-6">
                    <div class="dropdown" id="searchCountry">
                        <input
                                class="searchBar w-100 bg-white text-dark fw-normal"
                                id="countryDropdown"
                                type="text"
                                placeholder="Search Person by Country..."
                                data-toggle="dropdown"
                                data-bs-toggle="dropdown"
                                autocomplete="off"
                        />
                        <span class="caret"></span>

                        <ul
                                class="dropdown-menu w-100 bg-white text-dark fw-bold p-3"
                                aria-labelledby="countryDropdown"
                        >
                            @foreach($country as $countries)
                                <a class="dropdown-item" href="{{ route('country', ['id' => $countries->countryname]) }}">{{ $countries->countryname }} ({{ $countries->countrycode }}) </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SEARCH BARS -->

    <!-- START PERSON SHORT DETAILS -->
    <section class="section-person-details user-div mt-4 px-0 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card u-box-shadow-1">
                        <div class="card-body">
                            <h1 class="card-title">{{ $data->full_name }}</h1>
                            <p class="card-text">{{ $data->location.' '.$data->country }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PERSON SHORT DETAILS -->

    <div class="container">
        <div class="row">
            <div class="col-lg-8 my-5">

                <!-- START PERSON Contact Details -->
                <section class="section-contact user-details-div">
                    <div class="card user-details-div__card u-box-shadow-1">
                        <h2 class="card-title">{{ $data->full_name }}'s Contact Details</h2>
                        <div class="card-body">
                            @guest
                                <div class="contact-details__box row mt-5">
                                    <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                        <div class="circle-element">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                    </div>

                                    <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                        <div class="contact-details--text col-lg-5 col-md-5 col-sm-6 mb-2">
                                            <span>Email (Verified)</span>
                                            <a href="#"> s**@seoexparte.com </a>
                                        </div>

                                        <a href="{{ route('/phonelistUserLogin' ) }}" type="button"
                                           class="contact-details--btn btn btn-grad col-lg-4 col-md-3 col-sm-5 col-8">
                                            Get Email Address
                                        </a>
                                        <div class="col-lg-3"></div>
                                    </div>
                                </div>

                                <div class="contact-details__box row mt-5">
                                    <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                        <div class="circle-element">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                    </div>

                                    <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                        <div class="contact-details--text col-lg-5 col-md-5 col-sm-6 mb-2">
                                            <span>Mobile Number</span>
                                            <a href="#"> (XXX) XXX-XXXX</a>
                                        </div>

                                        <a href="{{ route('/phonelistUserLogin' ) }}" type="button"
                                           class="contact-details--btn btn btn-grad col-lg-4 col-md-3 col-sm-5 col-8">
                                            Get Mobile Number
                                        </a>
                                        <div class="col-lg-3"></div>
                                    </div>
                                </div>
                            @else
                                <div class="contact-details__box row mt-5">
                                    <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                        <div class="circle-element">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                    </div>

                                    <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                        <div class="contact-details--text col-lg-5 col-md-5 col-sm-6 mb-2">
                                            <span>Email (Verified)</span>
                                            <a href="#"> s**@seoexparte.com </a>
                                        </div>

                                        <a href="{{ route('peopleSearchById', $data->id ) }}" type="button"
                                           class="contact-details--btn btn btn-grad col-lg-4 col-md-3 col-sm-5 col-8">
                                            Get Email Address
                                        </a>
                                        <div class="col-lg-3"></div>
                                    </div>
                                </div>

                                <div class="contact-details__box row mt-5">
                                    <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                        <div class="circle-element">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                    </div>

                                    <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                        <div class="contact-details--text col-lg-5 col-md-5 col-sm-6 mb-2">
                                            <span>Mobile Number</span>
                                            <a href="#"> (XXX) XXX-XXXX</a>
                                        </div>

                                        <a href="{{ route('peopleSearchById', $data->id ) }}" type="button"
                                           class="contact-details--btn btn btn-grad col-lg-4 col-md-3 col-sm-5 col-8">
                                            Get Mobile Number
                                        </a>
                                        <div class="col-lg-3"></div>
                                    </div>
                                </div>
                            @endguest


                            <div class="contact-details__box row mt-5">
                                <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                    <div class="circle-element">
                                        <i class="bi bi-facebook"></i>
                                    </div>
                                </div>

                                <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                    <div class="contact-details--text col-lg-5 col-md-7 col-sm-6 mb-2">
                                        <span>Facebook Profile</span>
                                        <a href="https://www.facebook.com/{{ $data->uid}}">
                                            https://www.facebook.com/{{ $data->uid}}
                                        </a>
                                    </div>

                                    <div class="col-lg-3"></div>
                                </div>
                            </div>

                            <div class="contact-details__box row mt-5">
                                <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                    <div class="circle-element">
                                        <i class="bi bi-person-lines-fill"></i>
                                    </div>
                                </div>

                                <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                    <div class="contact-details--text col-lg-5 col-md-7 col-sm-6 mb-2">
                                        <span>Age</span>
                                        <p style="color: #5d6a7e">
                                            @if(!empty($data->age))
                                                {{ $data->age}} years
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-lg-3"></div>
                                </div>
                            </div>

                            <div class="contact-details__box row mt-5">
                                <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                    <div class="circle-element">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </div>
                                </div>

                                <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                    <div class="contact-details--text col-lg-5 col-md-7 col-sm-6 mb-2">
                                        <span>Gender</span>
                                        <a href="#">
                                            @if(!empty($data->gender))
                                                {{ $data->gender}}
                                            @else
                                                N/A
                                            @endif
                                        </a>
                                    </div>

                                    <div class="col-lg-3"></div>
                                </div>
                            </div>

                            <div class="contact-details__box row mt-5">
                                <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                    <div class="circle-element">
                                        <i class="bi bi-heart-fill"></i>
                                    </div>
                                </div>

                                <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                    <div class="contact-details--text col-lg-5 col-md-7 col-sm-6 mb-2">
                                        <span>Relationship Status</span>
                                        <p style="color: #5d6a7e">
                                            @if(!empty( $data->relationship_status ))
                                                {{ $data->relationship_status }}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-lg-3"></div>
                                </div>
                            </div>

                            <div class="contact-details__box row mt-5">
                                <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                    <div class="circle-element">
                                        <i class="bi bi-tools"></i>
                                    </div>
                                </div>

                                <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                    <div class="contact-details--text col-lg-5 col-md-7 col-sm-6 mb-2">
                                        <span>Work Place</span>
                                        <p style="color: #5d6a7e">
                                            @if(!empty( $data->work ))
                                                {{ $data->work}}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-lg-3"></div>
                                </div>
                            </div>

                            <div class="contact-details__box row mt-5">
                                <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                    <div class="circle-element">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>
                                </div>

                                <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                    <div class="contact-details--text col-lg-5 col-md-7 col-sm-6 mb-2">
                                        <span>Last Education Year</span>
                                        <p style="color: #5d6a7e">
                                            @if(!empty( $data->education_last_year ))
                                                {{ $data->education_last_year}}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-lg-3"></div>
                                </div>
                            </div>

                            <div class="contact-details__box row mt-5">
                                <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                    <div class="circle-element">
                                        <i class="bi bi-pin-map-fill"></i>
                                    </div>
                                </div>

                                <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                    <div class="contact-details--text col-lg-5 col-md-7 col-sm-6 mb-2">
                                        <span>Current Address</span>
                                        <p style="color: #5d6a7e">
                                            @if(!empty( $data->location ))
                                                {{ $data->location.', '.$data->country }}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-lg-3"></div>
                                </div>
                            </div>

                            <div class="contact-details__box row mt-5">
                                <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                    <div class="circle-element">
                                        <i class="bi bi-house-door"></i>
                                    </div>
                                </div>

                                <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                    <div class="contact-details--text col-lg-5 col-md-7 col-sm-6 mb-2">
                                        <span>Home Town</span>
                                        <p style="color: #5d6a7e">
                                            @if(!empty( $data->hometown ))
                                                {{ $data->hometown }}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-lg-3 col-md-3"></div>
                                </div>
                            </div>

                            <div class="contact-details__box row mt-5">
                                <div class="contact-details--icon col-lg-1 col-md-1 col-sm-2 col-2">
                                    <div class="circle-element">
                                        <i class="bi bi-globe2"></i>
                                    </div>
                                </div>

                                <div class="contact-details--content row col-md-10 col-sm-6 col-9 ps-md-5 ps-4">
                                    <div class="contact-details--text col-lg-5 col-md-7 col-sm-6 mb-2">
                                        <span>Country</span>
                                        <a href="{{ route('country', ['id' => $data->country]) }}">
                                            @if(!empty( $data->country ))
                                                {{ $data->country }}
                                            @else
                                                N/A
                                            @endif
                                        </a>
                                    </div>

                                    <div class="col-lg-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END PERSON Contact Details -->

                <!-- START PERSON Frequently Asked Questions -->
                <section class="section-faq user-details-div mt-5 mb-lg-4">
                    <div class="card user-details-div__card u-box-shadow-1">
                        <h3 class="card-title">
                            Frequently Asked Questions about {{ $data->full_name }}
                        </h3>

                        <div class="card-body">
                            <div class="faq" id="faq">
                                <!-- FAQ 01 -->
                                <div class="faq-item my-4">
                                    <h2 class="faq-header" id="headingOne">
                                        <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                            <i class="bi bi-caret-down-square-fill"></i>
                                            <span> Where does {{ $data->full_name }} work? </span>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="faq-collapse collapse" aria-labelledby="headingOne"
                                         data-bs-parent="#faq">
                                        <div class="faq-body">
                                            {{ $data->full_name }} works for @if(!empty($data->work))
                                                {{ $data->work}}
                                            @else
                                                N/A
                                            @endif.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 02 -->
                                <div class="faq-item my-4">
                                    <h2 class="faq-header" id="headingTwo">
                                        <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="true" aria-controls="collapseTwo">
                                            <i class="bi bi-caret-down-square-fill"></i>

                                            <span>What is {{ $data->full_name }}'s birth date?
                                            </span>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="faq-collapse collapse" aria-labelledby="headingTwo"
                                         data-bs-parent="#faq">
                                        <div class="faq-body">
                                            {{ $data->full_name }}'s birth date is @if(!empty($data->age))
                                                {{ $data->age}}
                                            @else
                                                N/A
                                            @endif
                                            .
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 03 -->
                                <div class="faq-item my-4">
                                    <h2 class="faq-header" id="headingThree">
                                        <button class="faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="true" aria-controls="collapseThree">
                                            <i class="bi bi-caret-down-square-fill"></i>
                                            <span>
                                            What is {{ $data->full_name }}'s current address?
                                            </span>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="faq-collapse collapse" aria-labelledby="headingThree"
                                         data-bs-parent="#faq">
                                        <div class="faq-body">
                                            {{ $data->full_name }}'s current address is
                                            @if(!empty( $data->location ))
                                                {{ $data->location.', '.$data->country }}
                                            @else
                                                N/A
                                            @endif.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END PERSON Current Company Details -->
            </div>

            <div class="col-lg-4">
                <!-- START PERSON SIMILAR CONTACTS -->
                <section
                        class="section-similar-contacts user-details-div ms-lg-4 mt-lg-5 mt-0 mb-lg-0 mb-5"
                >
                    <div class="card user-details-div__card u-box-shadow-1">
                        <h3 class="card-title">Similar Contacts</h3>
                        <div class="card-body p-0">

                            @foreach($userData->take(6) as $userFetchData)
                                <div class="similar-contacts-details__box pt-4">
                                    <a class="similar-contacts-details--name" href="{{ route('user', ['id' => $userFetchData->id]) }}"
                                    >{{ $userFetchData->full_name}}</a
                                    >
                                    <p class="similar-contacts-details--job">
                                        @if(!empty( $userFetchData->work ))
                                            {{ $userFetchData->work }}
                                        @else
                                            N/A
                                        @endif

                                    </p>
                                    <div class="similar-contacts-details--contact">
                                        <a
                                                class="similar-contacts-details--contact-phone"
                                                href=""window.history.pushstate not working reload
                                        >
                                            <i class="bi bi-telephone-fill"></i>Phone
                                        </a>
                                        <a
                                                class="similar-contacts-details--contact-email ms-5"
                                                href=""
                                        >
                                            <i class="bi bi-envelope-fill"></i>Email
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- END PERSON CSIMILAR CONTACTS -->
            </div>
        </div>
    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>

    <script type="text/javascript">
        let route = "{{ url('/autocomplete-search') }}";
        $('#searchPeopleName').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>

@endsection


{{--<script>
    function handleName(e){
        if(e.key === "Enter"){
            //alert("Enter was just pressed.");
        }

        return false;
    }
</script>--}}

<script>
    var stateObj = { foo: "" };
    history.pushState(stateObj, "page without extension", "people/{{ $data->first_name.'.'.$data->last_name }}");
    window.onpopstate = function(event) {
        if(event && event.state) {
            location.reload();
        }
    }
</script>
