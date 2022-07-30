<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="" />
    <meta name="keywords"
          content="phone number list, mobile number list, sales leads, mobile leads, data prospect, sales crm, contact database, contact details" />

    <title>Historical Credit Usage | Phone List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!--Calendar CSS-->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
          rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}adminAsset/assets/css/style.css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}adminAsset/assets/images/icons/favicon.ico" />
</head>

<body>
<header>
    <!-- START NAVBAR -->
    <nav class="navbar navbar--user navbar-expand-md navbar-light" id="user-nav">
        <div class="container-fluid justify-content-end">
            <a class="navbar-brand" href="{{ route('/') }}">
                <img class="img-fluid" src="{{ asset('/') }}adminAsset/assets/images/logo.svg" alt="phone list" />
            </a>

            <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item pl-4">
                        <a class="nav-link {{  request()->routeIs('loggedInUser') ? 'active' : '' }}"
                           aria-current="page" href="{{ route('loggedInUser') }}">
                            <i class="bi bi-house-door"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item" id="search">
                        <a class="nav-link {{  request()->routeIs('people') ? 'active' : '' }}"
                           href="{{ route('people') }}">
                            <i class="bi bi-search"></i>
                            Data Search
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{  request()->routeIs('upgrade') ? 'active' : '' }}"
                           href="{{ route('upgrade') }}">
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
            <a class="btn btn-purple mx-4" href="{{ route('upgrade') }}">Get unlimited leads
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
            <button type="button" id="userBtn" class="user user-btn circle-element mx-3">

                <p class="user-name">
                    {{ $firstStringCharacter = substr(Auth::user()->firstName, 0, 1) }}{{ $firstStringCharacter = substr(Auth::user()->lastName, 0, 1) }}
                </p>
            </button>
        </div>
        <!-- END RIGHT NAV ITEMS -->
    </nav>
    <!-- END NAVBAR -->

    <!-- START SHOW WHEN CLICKED ON NOTIFICATION -->
    <div class="u-box-shadow-1 notification__sidebar hide animate__animated animate__fadeInRightBig">
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

<main>
    <section class="section-settings d-flex">
        <!-- START SIDEBAR -->
        <section class="d-flex flex-column flex-shrink-0 p-4 section-sidebar">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <span class="text-uppercase">Personal Profile</span>
                    <a
                            href="{{ route('account') }}"
                            class="nav-link {{  request()->routeIs('account') ? 'active' : '' }}"
                            aria-current="page"
                    >
                        <h2 class="fs-4 m-0">You</h2>
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <span class="text-uppercase">Admin Settings</span>
                    <a href="{{ route('managePlan') }}" class="nav-link {{  request()->routeIs('managePlan') ? 'active' : '' }} {{  request()->routeIs('billing') ? 'active' : '' }}" >
                        <h2 class="fs-4 m-0">Manage Plan</h2>
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <span class="text-uppercase">System Activity</span>
                    <a href="{{ route('exports') }}" class="nav-link {{  request()->routeIs('exports') ? 'active' : '' }} {{  request()->routeIs('csv-export-settings') ? 'active' : '' }}">
                        <h2 class="fs-4 m-0">Exports</h2>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('current') }}" class="nav-link {{  request()->routeIs('current') ? 'active' : '' }} {{  request()->routeIs('history') ? 'active' : '' }}">
                        <h2 class="fs-4 m-0">Credit Usage </h2>
                    </a>
                </li>
            </ul>
        </section>
        <!-- END SIDEBAR -->

        <!-- START MAIN -->
        <section class="section-main">
            <!-- START SECOND NAVBAR -->
            <section class="second-navbar">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="{{ route('current') }}"
                           class="nav-link {{  request()->routeIs('current') ? 'active' : '' }}">Current Credit
                            Usage</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('history') }}"
                           class="nav-link {{  request()->routeIs('history') ? 'active' : '' }}">Credit Usage
                            History</a>
                    </li>
                </ul>
            </section>
            <!-- END SECOND NAVBAR -->

            <!-- START CREDIT HISTORY -->
            <section class="section-credit-history">
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="d-flex input-daterange mx-4">
                                <div class="form-group col-md-4 me-5">
                                    <label for="input_from">From</label>
                                    <input type="text" id="from_date" class="form-control" name="from_date" readonly onchange="creditHistory()"  />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="input_from">To</label>
                                    <input type="text" id="to_date" class="form-control" name="to_date" readonly onchange="creditHistory()"  />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card u-box-shadow-2 m-4 border rounded-3">
                                <div class="card-title d-flex justify-content-between align-items-center">
                                    <h3 class="p-4 text-capitalize">
                                        Historical Credit Usage
                                        <span id="historicalCreditUsageFrom"> ({{ $userPurchasePlan[1] }} {{ $userPurchasePlan[3] }}
                                            {{ $userPurchasePlan[2] }}
                                        </span>
                                        -
                                        <span id="historicalCreditUsageTo">{{ $userPurchasePlan[4] }}
                                            {{ $userPurchasePlan[5] }} {{ $userPurchasePlan[6] }})
                                        </span>
                                    </h3>
                                </div>
                                <div class="card-body py-5 mt-4 mb-5 d-flex flex-column align-items-center">
                                    <span class="display-1" id="usedCredit">{{ $userPurchasePlan[7] }}</span>
                                    <span class="text-secondary fw-bold">Credits</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END CREDIT HISTORY -->
        </section>
        <!-- END MAIN -->
    </section>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--Calendar JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('/')}}adminAsset/assets/js/navbar.js"></script>
<script src="{{asset('/')}}adminAsset/assets/js/script.js"></script>


<script>
    var date = new Date();

    $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    var _token = $('input[name="_token"]').val();

    fetch_data();

    function fetch_data(from_date = '', to_date = '')
    {
        $.ajax({
            url:"{{ route('historyDate') }}",
            method:"POST",
            data:{from_date:from_date, to_date:to_date, _token:"{{ csrf_token() }}"},
            dataType:"json",
            success:function(data)
            {
                let usedCreditVar = 0;


                for(let count = 0; count < data.length; count++)
                {
                    usedCreditVar = parseInt(usedCreditVar) + parseInt(data[count].usedCredit);
                }
                $("#usedCredit").text(usedCreditVar);

            }
        })
    }


    function creditHistory() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' &&  to_date != '')
        {
            fetch_data(from_date, to_date);
            const from_date_new = new Date(from_date).toString().slice(4, 15);
            const to_date_new = new Date(to_date).toString().slice(4, 15);
            $('#historicalCreditUsageFrom').text('('+from_date_new);
            $('#historicalCreditUsageTo').text(to_date_new+")");
            console.log(from_date);

        }
        else
        {
            alert('Both Date is required');
        }
    }


</script>

</body>

</html>