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
    <!-- START USER DASHBOARD HEADING-->
    <section
            class="section-user-dashboard-heading bg-white mt-5 pt-5 px-md-0 px-5"
    >
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h1 class="heading--main">Let's get started!</h1>
                    <h2 class="heading--sub pb-md-5 pb-4">
                        Hi <span>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</span>, welcome to Phone List.
                    </h2>
                </div>
                <div
                        class="col-md-6 col-10 d-flex align-items-center justify-content-md-end"
                >
                    <row>
                        <h3 class="mb-4 heading--main fs-2 fw-normal">
                            <b>Total Mobile Numbers:</b> {{ $mobile_number }}
                        </h3>
                        <div>
                            <form action="{{ route('exports')  }}" method="get" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-txt border-3">
                                    Visit Downloaded Data CSVs
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </row>
                </div>
            </div>
        </div>
    </section>
    <!-- END USER DASHBOARD HEADING-->

    <!-- START USER HISTORY -->
    <section class="section-history py-5 mb-md-0 mb-5 custom-scrollbar">
        <div class="container">
            <div class="row">
                <!-- START PURCHASE HISTORY -->
                <div class="col-md-6 pe-md-5 px-5 py-md-0 py-5">
                    <h3>Purchase History</h3>
                    <canvas id="purchaseChart" width="150" height="140">
                    </canvas>
                </div>
                <!-- END PURCHASE HISTORY -->

                <!-- START BILLING HISTORY -->
                <div class="col-md-6 ps-5 pe-md-0 px-5 pt-md-0 pt-5">
                    <h3>Billing History</h3>
                    <div class="table-scrollable">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Credit Used</th>
                                <th>Data Purchased</th>
                                <th>Final Credit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userHistory as $history)
                                <tr>
                                    <td>{{ $history->date }}</td>
                                    <td>{{ $history->usedCredit }}</td>
                                    <td>{{ $history->dataPurchase }}</td>
                                    <td>{{ $history->useAbleCredit }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END BILLING HISTORY -->
            </div>
        </div>
    </section>
    <!-- END USER HISTORY -->
</main>

<!-- Bootstrap JS -->
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
></script>

<!-- jQuery -->
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
></script>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Custom JS -->
<script src="{{ asset('/') }}adminAsset/assets/js/navbar.js"></script>
<script src="{{ asset('/') }}adminAsset/assets/js/people.js"></script>
<script src="{{ asset('/') }}adminAsset/assets/js/script.js"></script>

<script>
    //Chart JS PurchaseChart Setup

    var data = <?php echo $data; ?>;
    var credit = <?php echo $credit; ?>;
    const purchaseLabels = <?php echo $day; ?>;

    const purchaseData = {
        labels: purchaseLabels,
        datasets: [
            {
                label: 'Data Purchased',
                backgroundColor: 'rgba(137, 121, 232, 1)',
                borderColor: 'rgba(137, 121, 232, 1)',
                data: data
            },
            {
                label: 'Credit Purchased',
                backgroundColor: 'rgba(75, 192, 192, 1)',
                borderColor: 'rgba(75, 192, 192, 1)',
                data: credit,
            },
        ],
    };

    const purchaseConfig = {
        type: 'line',
        data: purchaseData,
        options: {},
    };

    //Chart JS purchaseChart Configuration
    const purchaseChart = new Chart(
        document.getElementById('purchaseChart'),
        purchaseConfig
    );
</script>


</body>
</html>

