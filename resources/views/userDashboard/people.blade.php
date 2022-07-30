<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="" />
    <meta
            name="keywords"
            content="phone number list, mobile number list, sales leads, mobile leads, data prospect, sales crm, contact database, contact details"
    />

    <title>You | Phone List</title>


    <!-- Bootstrap CSS -->
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
    />

    <!-- Bootstrap Icons -->
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"
    />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
            rel="stylesheet"
    />

    <!-- Animate CSS -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}adminAsset/assets/css/style.css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}adminAsset/assets/images/icons/favicon.ico" />

</head>

<body>
<header>
    <!-- START NAVBAR -->
    <nav
            class="navbar navbar--user navbar-expand-md navbar-light"
            id="user-nav"
    >
        <div class="container-fluid justify-content-end">
            <a class="navbar-brand" href="{{ route('/') }}">
                <img
                        class="img-fluid"
                        src="{{ asset('/') }}adminAsset/assets/images/logo.svg"
                        alt="phone list"
                />
            </a>

            <button
                    class="navbar-toggler me-auto"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="bi bi-list"></i>
            </button>
            <div
                    class="collapse navbar-collapse justify-content-between"
                    id="navbarSupportedContent"
            >
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item pl-4">
                        <a class="nav-link {{  request()->routeIs('loggedInUser') ? 'active' : '' }}" aria-current="page" href="{{ route('loggedInUser') }}">
                            <i class="bi bi-house-door"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item" id="search">
                        <a class="nav-link {{  request()->routeIs('people') ? 'active' : '' }}" href="{{ route('people') }}">
                            <i class="bi bi-search"></i>
                            Data Search
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{  request()->routeIs('upgrade') ? 'active' : '' }}" href="{{ route('upgrade') }}">
                            <i class="bi bi-box-seam"></i>
                            Products
                        </a>
                    </li>
                </ul>
            </div>

            <!-- START SHOW ELEMENT ON CLICKING USER -->
            <div class="user-div hide u-box-shadow-1">
                <h4 class="px-4 pt-5">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h4>
                <div class="user--label mx-4">
                    <span>User</span>
                </div>

                <div class="user--menu">
                    <a class="user--menu-item" href="{{ route('account') }}">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                    <a class="user--menu-item" href="{{ route('upgrade') }}">
                        <i class="bi bi-trophy"></i>
                        <span>Upgrade Plan</span>
                    </a>

                    <a class="user--menu-item mb-3" href="{{ route('userLogout') }}">
                        <i class="bi bi-power"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
            <!-- END SHOW ELEMENT ON CLICKING USER -->
        </div>

        <!-- START RIGHT NAV ITEMS -->
        <div class="d-flex align-items-center nav-right__box">
            <a class="btn btn-purple mx-4" href="{{ route('upgrade') }}"
            >Get unlimited leads
            </a>
            <button type="button" class="btn">
                <a href="#">
                    <i class="bi bi-telephone phone-btn"></i>
                </a>
            </button>

            <!-- Link to Blog site -->
            <a class="btn" href="http://help.phonelist.io/">
                <i class="bi bi-question-circle"></i>
            </a>

            <button type="button" class="btn notification-btn">
                <i class="bi bi-bell"></i>
            </button>
            <button
                    type="button"
                    id="userBtn"
                    class="user user-btn circle-element mx-3"
            >
                <p class="user-name">{{ $firstStringCharacter = substr(Auth::user()->firstName, 0, 1) }}{{ $firstStringCharacter = substr(Auth::user()->lastName, 0, 1) }}</p>
            </button>
        </div>
        <!-- END RIGHT NAV ITEMS -->
    </nav>
    <!-- END NAVBAR -->

    <!-- START SHOW WHEN CLICKED ON NOTIFICATION -->
    <div
            class="u-box-shadow-1 notification__sidebar hide animate__animated animate__fadeInRightBig"
    >
        <div class="notification--header">
            <div class="notification--header-title">
                <h5>NOTIFICATIONS</h5>
            </div>
            <div class="notification--header-icons">
                <div class="btn"><i class="bi bi-arrow-clockwise"></i></div>
                <div class="btn close-btn">
                    <i class="bi bi-x-lg"></i>
                </div>
            </div>
        </div>
        <div class="notification--body"></div>
    </div>
    <!-- END SHOW WHEN CLICKED ON NOTIFICATION -->

</header>

<main id="peopleData">
    <section class="section-user-dashboard">

        <!-- START SIDEBAR -->
        <section class="section-user-dashboard--sidebar">
            <div class="heading--sub py-3 ps-4 u-border-bottom">Filters</div>

            <form id="search" action="{{ route('people.search.combination') }}">

                <!-- INPUT NAME -->
                <div class="input-name u-border-bottom py-3 px-4">
                    <div class="input-title pb-2">
                        <i class="bi bi-person-badge pe-2"></i>
                        Name
                    </div>
                    @if(isset($name))
                        <input
                                type="text"
                                id='nameInput'
                                name="name"
                                onkeypress="handle()"
                                placeholder="Enter name..."
                                autocomplete="off"
                                value="{{ $name }}"
                        />
                    @else
                        <input
                                type="text"
                                id='nameInput'
                                name="name"
                                onkeypress="handle()"
                                placeholder="Enter name..."
                                autocomplete="off"
                        />
                    @endif

                    <button type="submit" class="btn btn-purple rounded-1 w-100">
                        Apply
                    </button>



                </div>



                <!-- INPUT CURRENT ADDRESS -->
                <div class="input-currentAdd u-border-bottom py-3 px-4">
                    <div class="input-title pb-2">
                        <i class="bi bi-pin-map-fill"></i>
                        Current Address
                    </div>

                    @if(isset($location))
                        <input
                                type="text"
                                name="location"
                                id="locationInput"
                                placeholder="Enter current address..."
                                onkeypress="handleLocation()"
                                autocomplete="off"
                                value="{{ $location }}"
                        />
                    @else
                        <input
                                type="text"
                                name="location"
                                id="locationInput"
                                placeholder="Enter current address..."
                                onkeypress="handleLocation()"
                                autocomplete="off"
                        />
                    @endif
                    <button type="submit" class="btn btn-purple rounded-1 w-100">
                        Apply
                    </button>
                </div>

                <!-- INPUT HOMETOWN -->
                <div class="input-hometown u-border-bottom py-3 px-4">
                    <div class="input-title pb-2">
                        <i class="bi bi-house-door-fill"></i>
                        Hometown
                    </div>
                    @if(isset($hometown))
                        <input
                                type="text"
                                name="hometown"
                                id="hometownInput"
                                placeholder="Enter hometown..."
                                onkeypress="handleHometown()"
                                autocomplete="off"
                                value="{{ $hometown }}"
                        />
                    @else
                        <input
                                type="text"
                                name="hometown"
                                id="hometownInput"
                                placeholder="Enter hometown..."
                                onkeypress="handleHometown()"
                                autocomplete="off"
                        />
                    @endif
                    <button type="submit" class="btn btn-purple rounded-1 w-100">
                        Apply
                    </button>
                </div>

                <!-- INPUT COUNTRY -->
                <div class="input-country u-border-bottom py-3 px-4">
                    <div class="input-title pb-2">
                        <i class="bi bi-globe2 pe-2"></i>
                        Country
                    </div>
                    <div class="dropdown" id="searchCountry">
                        @if (isset($countries))
                            <input
                                    class="searchBar col-12"
                                    id="countryInput"
                                    type="text"
                                    name="country"
                                    placeholder="Search by Country..."
                                    data-toggle="dropdown"
                                    data-bs-toggle="dropdown"
                                    autocomplete="off"
                                    value="{{ $countries }}"
                            />
                        @else ()
                            <input
                                    class="searchBar col-12"
                                    id="countryInput"
                                    type="text"
                                    name="country"
                                    placeholder="Search by Country..."
                                    data-toggle="dropdown"
                                    data-bs-toggle="dropdown"
                                    autocomplete="off"
                            />


                        @endif
                        <span class="caret"></span>

                        <ul class="dropdown-menu p-3" aria-labelledby="countryDropdown">
                            @foreach($country as $countryName)
                                <button  class="dropdown-item" id="countryBtn{{ $countryName->id }}"
                                         type="submit" onclick="getCountryName({{ $countryName->id }})"
                                         value="{{ $countryName->countryname }}" >{{ $countryName->countryname }}
                                    ({{ $countryName->countrycode }})
                                </button>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- INPUT BIRTHYEAR -->
                <div class="input-age u-border-bottom py-3 px-4">
                    <div class="input-title pb-2">
                        <i class="bi bi-person-lines-fill pe-2"></i>
                        Birthyear
                    </div>
                    @if (isset($age))
                        <input
                                type="text"
                                id='ageInput'
                                name="age"
                                onkeypress="handle()"
                                placeholder="Enter birthyear..."
                                autocomplete="off"
                                value="{{ $age }}"
                        />
                    @else
                        <input
                                type="text"
                                id='ageInput'
                                name="age"
                                onkeypress="handle()"
                                placeholder="Enter birthyear..."
                                autocomplete="off"
                        />
                    @endif
                    <button type="submit" class="btn btn-purple rounded-1 w-100">
                        Apply
                    </button>
                </div>
                <!--INPUT GENDER-->
                <div class="input-gender u-border-bottom py-3 px-4">
                    <div class="input-title pb-2">
                        <i class="bi bi-gender-ambiguous pe-2"></i>
                        Gender
                    </div>
                    <div class="dropdown" id="searchGender">
                        @if (isset($gender))
                            <input
                                    class="searchBar text-dark fw-normal col-12"
                                    id="genderInput"
                                    type="text"
                                    placeholder="Search by gender..."
                                    data-toggle="dropdown"
                                    data-bs-toggle="dropdown"
                                    autocomplete="off"
                                    name="gender"
                                    value="{{ $gender }}"
                            />
                        @else
                            <input
                                    class="searchBar text-dark fw-normal col-12"
                                    id="genderInput"
                                    type="text"
                                    placeholder="Search by gender..."
                                    data-toggle="dropdown"
                                    data-bs-toggle="dropdown"
                                    autocomplete="off"
                                    name="gender"
                            />
                        @endif

                        <ul
                                class="dropdown-menu bg-white text-dark fw-bold p-3"
                                aria-labelledby="genderDropdown"
                        >
                            <li class="dropdown-item">
                                <button class="maleBtn" type="submit" value="male">
                                    Male
                                </button>
                            </li>
                            <li class="dropdown-item">
                                <button class="femaleBtn" type="submit" value="female">
                                    Female
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- INPUT RELATIONSHIP STATUS -->
                <div class="input-relationship-status py-3 px-4">
                    <div class="input-title pb-2">
                        <i class="bi bi-heart-fill pe-2"></i>
                        Relationship Status
                    </div>
                    <div class="dropdown" id="searchRelationship">
                        @if (isset($relationship_status))
                            <input
                                    class="searchBar text-dark fw-normal col-12"
                                    id="relationshipInput"
                                    type="text"
                                    placeholder="Search by relationship..."
                                    data-toggle="dropdown"
                                    data-bs-toggle="dropdown"
                                    autocomplete="off"
                                    name="relationship_status"
                                    value="{{ $relationship_status }}"
                            />
                        @else
                            <input
                                    class="searchBar text-dark fw-normal col-12"
                                    id="relationshipInput"
                                    type="text"
                                    placeholder="Search by relationship..."
                                    data-toggle="dropdown"
                                    data-bs-toggle="dropdown"
                                    autocomplete="off"
                                    name="relationship_status"
                            />
                        @endif


                        <ul
                                class="dropdown-menu bg-white text-dark fw-bold p-3"
                                aria-labelledby="genderDropdown"
                        >
                            <li class="dropdown-item">
                                <button class="singleBtn" type="submit" value="single">
                                    Single
                                </button>
                            </li>
                            <li class="dropdown-item">
                                <button
                                        class="relationBtn"
                                        type="submit"
                                        value="in a relationship"
                                >
                                    In a relationship
                                </button>
                            </li>
                            <li class="dropdown-item">
                                <button class="engagedBtn" type="submit" value="engaged">
                                    Engaged
                                </button>
                            </li>
                            <li class="dropdown-item">
                                <button class="marriedBtn" type="submit" value="married">
                                    Married
                                </button>
                            </li>
                            <li class="dropdown-item">
                                <button
                                        class="openBtn"
                                        type="submit"
                                        value="in an open relationship"
                                >
                                    In an open relationship
                                </button>
                            </li>
                            <li class="dropdown-item">
                                <button
                                        class="complicatedBtn"
                                        type="submit"
                                        value="it's complicated"
                                >
                                    It's complicated
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

            </form>
        </section>
        <!-- END SIDEBAR -->

        <!-- START MAIN DASHBOARD -->
        <form action="{{ route('customExport') }}" enctype="multipart/form-data" method="get">
            @csrf
            <section class="section-user-dashboard--main">
                <div class="container">
                    <div class="row">
                        <!-- START TABLE -->
                        <div
                                class="section-table table-scrollable my-5 mb-2 ms-4"
                                style="width: 100vw; overflow: auto; max-height: 90vh"
                        >
                            <div class="container">
                                <div class="row">
                                    <table
                                            class="table table-hover table-bordered table-responsive list"
                                            id="peopleTable"
                                    >
                                        <thead>
                                        <tr>
                                            {{--<th class="px-4">
                                                <input id="checkAll" type="button" class="selectAll" value="Select All"/>
                                            </th>--}}
                                            {{--<th class="px-4">
                                                <!-- <a href="#" class="selectAll"> Select All </a> -->
                                                <div class="dropdown open">
                                                    <button
                                                            class="btn btn-purple dropdown-toggle rounded"
                                                            type="button"
                                                            id="triggerId"
                                                            data-bs-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                    >
                                                        Select Data
                                                    </button>
                                                    <div
                                                            class="dropdown-menu"
                                                            aria-labelledby="triggerId"
                                                    >
                                                        <input id="checkAll"
                                                               type="button"
                                                               value="Select this page"
                                                               class="dropdown-item select selectAll"
                                                        />
                                                        <input id="checkAllSearch"
                                                               type="button"
                                                               value="Select all people"
                                                               class="dropdown-item select selectAll"
                                                        />
                                                        --}}{{--<button class="dropdown-item select" href="#">
                                                            Select all people
                                                        </button>--}}{{--

                                                        <span class="dropdown-item select"
                                                        >Select from
                                                      <input class="select-input" type="text" />
                                                      to
                                                      <input class="select-input" type="text" />
                                                    </span>
                                                    </div>
                                                </div>
                                            </th>--}}
                                            @if(isset($name))<input type="text"  name="name" value="{{ $name }}" hidden />@endif
                                            @if(isset($location)) <input type="text" name="location" value="{{ $location }}" hidden />@endif
                                            @if(isset($hometown)) <input type="text" name="hometown" value="{{ $hometown }}" hidden />@endif
                                            @if (isset($countries)) <input type="text"name="country" value="{{ $countries }}" hidden />@endif
                                            @if (isset($age)) <input type="text" id='ageInput' name="age" value="{{ $age }}" hidden />@endif
                                            @if (isset($gender))<input type="text" name="gender" value="{{ $gender }}" hidden />@endif
                                            @if (isset($relationship_status)) <input type="text" name="relationship_status" value="{{ $relationship_status }}" hidden />@endif
                                            <th class="px-4">
                                                <input id="checkAll" type="button" class="selectAll" value="Select All"/>
                                                <!--<input type="button" class="selectAll" value="Download All Filtered Data" />-->
                                                <div class="dropdown open">
                                                    <button
                                                            class="btn btn-purple dropdown-toggle rounded"
                                                            type="button"
                                                            id="triggerId"
                                                            data-bs-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                    >
                                                        Download Filtered Data
                                                    </button>
                                                    <div
                                                            class="dropdown-menu"
                                                            aria-labelledby="triggerId"
                                                    >
                                                        <button type="submit" class="dropdown-item select">
                                                            Download All Filtered Data
                                                        </button>
                                                        <hr>
                                                        <span class="dropdown-item select">Download
                                                      <input name="limit" class="select-input" type="number" />
                                                      Datas
                                                    </span>
                                                        <button class="btn btn-purple mx-auto" type="submit">
                                                            Apply Download
                                                        </button>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Work Place</th>
                                            <th>Country</th>
                                            <th>Quick Actions</th>
                                            <th>Gender</th>
                                            <th>Relationship Status</th>
                                            <th>Last Education Year</th>
                                            <th>Current Address</th>
                                            <th>Home Town</th>
                                        </tr>
                                        </thead>

                                        <tbody id="tbody">
                                        @foreach($allData as $data)
                                            <tr class="table-row">
                                                <td>
                                                    <input type="checkbox" name="chk[]" id="chk" class="form-check-input" value="{{$data->id}}" >
                                                </td>
                                                <td>
                                                    <a href="{{ route('people.user', ['id' => $data->id ]) }}" class="person-name">
                                                        {{ ucwords($data->first_name.' '.$data->last_name) }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if(!empty( $data->age ))
                                                        {{ $data->age }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!empty( $data->work ))
                                                        {{ ucwords($data->work)}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!empty( $data->country ))
                                                        {{ ucwords($data->country) }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="position-relative">
                                                    <button
                                                            type="button"
                                                            class="btn btn-access btn-access--phone"
                                                            {{--id="accessBtn"--}}
                                                            id="{{ $data->id }}"
                                                            onclick="accessPhoneNumber({{ $data->id }})"
                                                    >
                                                        Access Phone Number
                                                    </button>
                                                    <div class="message-box hide-text">
                                                        Verified number costs one credit.
                                                    </div>

                                                    <div class="button-group hide" id="buttonGroup{{ $data->id }}">
                                                        <a
                                                                class="btn btn-access btn-access--phone"
                                                                href=""
                                                        >
                                                            <i class="bi bi-phone"></i>
                                                            <i class="bi bi-caret-down-fill"></i>
                                                        </a>
                                                        <div
                                                                class="message-box message-box--phone hide-text"
                                                                id="messagePhone{{ $data->id }}"
                                                        >
                                                        </div>

                                                        <a
                                                                class="btn btn-access btn-access--email"
                                                                href=""
                                                        >
                                                            <i class="bi bi-envelope"></i>
                                                            <i class="bi bi-caret-down-fill"></i>
                                                        </a>

                                                        <div
                                                                class="message-box message-box--email hide-text"
                                                                id="messageEmail{{ $data->id }}"
                                                        >
                                                            <!-- Email not available -->
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if(!empty($data->gender))
                                                        {{ ucwords($data->gender)}}
                                                    @else
                                                        -
                                                    @endif</td>
                                                <td>
                                                    @if(!empty( $data->relationship_status ))
                                                        {{ ucwords($data->relationship_status) }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!empty( $data->education_last_year ))
                                                        {{ $data->education_last_year}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!empty( $data->location ))
                                                        {{ ucwords($data->location) }},{{  ucwords($data->location_city) }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!empty( $data->hometown ))
                                                        {{ ucwords($data->hometown) }},{{  ucwords($data->hometown_city) }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END TABLE -->
                <!-- Download CSV Button -->
                <div class="container">
                    <div class="row py-4">
                        @if(isset($count))
                            <div class="col-md-4 text-secondary ps-5">
                                Filtered records: {{ $count }}
                            </div>
                        @else
                            <div class="col-md-4 text-secondary ps-5">
                            </div>
                        @endif
                        <div class="col-md-8 ms-auto d-flex justify-content-end">
                            <button
                                    type="submit"
                                    class="btn btn-download border-3"
                                    disabled="disabled"
                            >
                                <i class="bi bi-download"></i>
                                &nbsp;&nbsp; Download Selected Data
                            </button>
                        </div>
                    </div>
                </div>

                <!-- START PAGINATION -->
                <div class="row pb-2">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item">
                                <div class="d-sm-inline-flex justify-content-center">
                                    @if(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['location' => $location])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['hometown' => $hometown])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                       && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['country' => $countries])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                       && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['gender' => $gender])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'country' => $countries])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'location' => $location, 'hometown' => $hometown])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'location' => $location, 'country' => $countries])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'location' => $location, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'location' => $location, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'hometown' => $hometown, 'country' => $countries])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'hometown' => $hometown, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'hometown' => $hometown, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'country' => $countries, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'country' => $countries, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}


                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'location' => $location, 'hometown' => $hometown])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                         && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'location' => $location, 'country' => $countries])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                         && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'location' => $location, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                         && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'location' => $location, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'hometown' => $hometown, 'country' => $countries])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'hometown' => $hometown, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'hometown' => $hometown, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'country' => $countries, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'country' => $countries, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['name' => $name, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['location' => $location, 'hometown' => $hometown, 'country' => $countries])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['location' => $location, 'hometown' => $hometown, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['location' => $location, 'hometown' => $hometown, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['location' => $location, 'country' => $countries, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['location' => $location, 'country' => $countries, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['location' => $location, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends(['hometown' => $hometown, 'country' => $countries, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['hometown' => $hometown, 'country' => $countries, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['hometown' => $hometown, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}


                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                    && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                             'gender' => $gender])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location,
                                            'country' => $countries, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location,
                                            'country' => $countries, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location,
                                            'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown,
                                            'country' => $countries, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'location' => $location,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends(['hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown,
                                            'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'location' => $location, 'hometown' => $hometown,
                                            'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}


                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}


                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) == null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status])->links() !!}


                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                    && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['location' => $location, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['hometown' => $hometown, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                       && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['country' => $countries, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                       && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'country' => $countries, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'location' => $location, 'hometown' => $hometown, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'location' => $location, 'country' => $countries, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'location' => $location, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'location' => $location, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'hometown' => $hometown, 'country' => $countries, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'hometown' => $hometown, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'hometown' => $hometown, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'country' => $countries, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'country' => $countries, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}


                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'location' => $location, 'hometown' => $hometown, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                         && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'location' => $location, 'country' => $countries, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                         && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'location' => $location, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                         && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'location' => $location, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'hometown' => $hometown, 'country' => $countries, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'hometown' => $hometown, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'hometown' => $hometown, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'country' => $countries, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'country' => $countries, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['name' => $name, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['location' => $location, 'hometown' => $hometown, 'country' => $countries, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['location' => $location, 'hometown' => $hometown, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['location' => $location, 'hometown' => $hometown, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['location' => $location, 'country' => $countries, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['location' => $location, 'country' => $countries, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['location' => $location, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends(['hometown' => $hometown, 'country' => $countries, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['hometown' => $hometown, 'country' => $countries, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['hometown' => $hometown, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}


                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                    && isset($countries) != null && isset($gender) == null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                             'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location,
                                            'country' => $countries, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location,
                                            'country' => $countries, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location,
                                            'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown,
                                            'country' => $countries, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'location' => $location,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends(['hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown,
                                            'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) == null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'location' => $location, 'hometown' => $hometown,
                                            'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}


                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) == null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) == null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) == null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) == null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @elseif(isset($name) != null && isset($location) == null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}


                                    @elseif(isset($name) != null && isset($location) != null && isset($hometown) != null
                                        && isset($countries) != null && isset($gender) != null && isset($relationship_status) != null && isset($age) != null)
                                        {!! $allData->appends([ 'name' => $name, 'location' => $location, 'hometown' => $hometown,
                                            'country' => $countries, 'gender' => $gender, 'relationship_status' => $relationship_status, 'age' => $age])->links() !!}

                                    @else
                                        {!! $allData->links() !!}
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- END PAGINATION -->
            </section>
        </form>
        <!-- END MAIN DASHBOARD -->
    </section>
</main>

<!-- Bootstrap JS -->
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
></script>

<!-- jQuery -->




{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
></script>

{{--select data from this page--}}
<script type="text/javascript">
    $(function() {

        $(document).on('click', '#checkAll', function() {

            if ($(this).val() == 'Select All') {
                //$('.button input').prop('checked', true);
                var ele=document.getElementsByName('chk[]');
                for(var i=0; i<ele.length; i++){
                    if(ele[i].type=='checkbox')
                        ele[i].checked=true;
                }
                $(this).val('Deselect All');
                $('.btn-download').prop(
                    'disabled',
                    $('input.form-check-input:checked').length == 0
                );
            } else {
                //$('.button input').prop('checked', false);
                var ele=document.getElementsByName('chk[]');
                for(var i=0; i<ele.length; i++){
                    if(ele[i].type=='checkbox')
                        ele[i].checked=false;
                    $('.btn-download').prop(
                        'disabled',
                        $('input.form-check-input:checked').length == 0
                    );

                }
                $(this).val('Select All');

            }
        });

    });
</script>

{{--select all data from search--}}
<script type="text/javascript">
    $(function() {
        let inputName,  inputLocation, inputHometown, inputCountry, inputAge, inputGender, inputRelationshipStatus;
        let input = [];
        $(document).on('click', '#checkAllSearch', function() {

            inputName = document.getElementById('nameInput').value;
            inputLocation = document.getElementById('locationInput').value;
            inputHometown = document.getElementById('hometownInput').value;
            inputCountry = document.getElementById('countryInput').value;
            inputAge = document.getElementById('ageInput').value;
            inputGender = document.getElementById('genderInput').value;
            inputRelationshipStatus = document.getElementById('relationshipStatusInput').value;

            input = [ inputName,  inputLocation, inputHometown, inputCountry, inputAge, inputGender, inputRelationshipStatus ];

            $.ajax({
                url:"{{ route('all.search.data') }}",
                method:"POST",
                data:{input:input, _token:"{{ csrf_token() }}"},
                dataType:"json",
                success:function(allData)
                {
                    console.log(allData);
                },
                error: function () {
                    console.log(error);
                }
            })
        });

    });
</script>

{{--/* Access Phone Number */--}}

<script type="text/javascript">
    let collection,  buttonGroup, messageBox, buttonId;

    messageBox = document.getElementById('message');

    function accessPhoneNumber(id)
    {
        $.ajax({
            url:"{{ route('peopleDataHistory') }}",
            method:"POST",
            data:{id:id, _token:"{{ csrf_token() }}"},
            dataType:"json",
            success:function(data)
            {
                collection = document.getElementById(id);
                buttonGroup = document.getElementById('buttonGroup'+id);
                buttonId = document.getElementById(id).value;
                collection.classList.add('hide');
                buttonGroup.classList.remove('hide');
                for (var count = 0; count < data.length; count++) {
                    $("#messagePhone" + id).text(data[count].phone);
                    if (data[count].email != null)
                        $("#messageEmail" + id).text(data[count].email);
                    else
                        $("#messageEmail" + id).text("N/A");
                }
            },
            error: function () {
                window.location.href = "settings/upgrade";
            }
        })

    }

</script>




<script type="text/javascript">

    function getCountryName(id)
    {
        let countryInput = document.getElementById('countryInput');
        countryInput.value = document.querySelector('#countryBtn'+id).value;
    }

</script>




<script>
    $(function () {
        $('.form-check-input').click(function () {
            $('.btn-download').prop(
                'disabled',
                $('input.form-check-input:checked').length == 0
            );
        });
    });
</script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('public/js/accessPhone.js') }}" defer></script>

<!-- Custom JS -->
<script src="{{ asset('/') }}adminAsset/assets/js/navbar.js"></script>
<script src="{{ asset('/') }}adminAsset/assets/js/people.js"></script>
<script src="{{ asset('/') }}adminAsset/assets/js/script.js"></script>

<script>
    $(document).ready(function () {
        $('#countryDropdown').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            $('.dropdown-menu li').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

</body>
</html>





