<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    />

    <!-- Animate CSS -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}adminAsset/css/style.css" />

    <title>Lidata</title>
    <link rel="shortcut icon" href="{{ asset('/') }}adminAsset/assets/images/icons/favicon.ico" />
</head>

<body>
<header>
    <!-- START NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid justify-content-end">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('/') }}adminAsset/assets/images/logo.png" alt="logo" />
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
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div
                class="collapse navbar-collapse justify-content-between"
                id="navbarSupportedContent"
            >
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item pl-4">
                        <a
                            class="nav-link active"
                            aria-current="page"
                            href="index.html"
                        >
                            <i class="bi bi-house-door"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link__search" href="#">
                            <i class="bi bi-search"></i>
                            Search
                        </a>

                        <!-- Show element on hover  -->
                        <div
                            class="search__details d-none"
                            id="search__details-display "
                        >
                            <a href="people.html">
                                <div class="search__details--left d-flex">
                                    <div class="search__details--icon-box">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="search__details--text">
                                        <div
                                            class="fw-bold heading--sub d-flex justify-content-between"
                                        >
                                            People
                                            <i class="bi bi-arrow-right animate-arrow"></i>
                                        </div>
                                        <p>
                                            Search for hyper-targeted lists of people using
                                            filters.
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a href="company.html">
                                <div class="search__details--right d-flex">
                                    <div class="search__details--icon-box">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div class="search__details--text">
                                        <div
                                            class="fw-bold heading--sub d-flex justify-content-between"
                                        >
                                            Companies
                                            <i class="bi bi-arrow-right animate-arrow"></i>
                                        </div>
                                        <p>
                                            Search for targeted lists of companies using filters.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item d-md-none d-lg-none">
                        <a class="nav-link" href="people.html">
                            <i class="bi bi-send"></i>
                            People
                        </a>
                    </li>
                    <li class="nav-item d-md-none d-lg-none">
                        <a class="nav-link" href="company.html">
                            <i class="bi bi-building px-2"></i>
                            Companies
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-send px-2"></i>
                            Engage
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-arrow-repeat px-2"></i>
                            Enrich
                        </a>
                    </li>
                </ul>
            </div>

            <!-- START SHOW ELEMENT ON CLICKING USER -->
            <div class="user-div hide">
                <h4 class="px-4 pt-5">Shamonti Haque</h4>
                <div class="user--label mx-4">
                    <span>Admin</span>
                </div>

                <div class="user--menu">
                    <a class="user--menu-item" href="settings.html">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                    <a class="user--menu-item" href="packages.html">
                        <i class="bi bi-trophy"></i>
                        <span>Upgrade Plan</span>
                    </a>

                    <a class="user--menu-item mb-3" href="login.html">
                        <i class="bi bi-power"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
            <!-- END SHOW ELEMENT ON CLICKING USER -->
        </div>
    </nav>
    <!-- END NAVBAR -->
</header>

<main>
    <div class="container">
        <h3 class="py-4">PEOPLE TABLE</h3>

        <!-- START TABLE -->
        <section class="demo-table section-table section-table--people">
            <table
                class="table table-hover table-bordered table-responsive"
                id="peopleTable"
            >
                <thead class="table-light">
                <tr>
                    <th scope="col" colspan="2">Name</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Facebook URL</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Home Town</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Country</th>
                    <th scope="col">Relationship Status</th>
                    <th scope="col">Education Last Year</th>
                </tr>
                </thead>
                <tbody>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                <tr class="table-row">
                    <td scope="row" class="name" colspan="2">
                        <a href="user01.html"> Shamonti Haque</a>
                    </td>

                    <td>Web Developer</td>
                    <td>+880 1111111111</td>
                    <td>facebook.com/1234</td>
                    <td>shamonti@gmail.com</td>
                    <td>female</td>
                    <td>Dinajpur</td>
                    <td>Sahjahanpur</td>
                    <td>Rajshahi</td>
                    <td>Bangladesh</td>
                    <td>Single</td>
                    <td>2019</td>
                </tr>
                </tbody>
            </table>
        </section>
        <!-- END TABLE -->
    </div>
</main>

<!-- Custom JS -->

<script src="navbar.js"></script>
<script src="script.js"></script>

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
</body>
</html>

