<?php
$connect = mysqli_connect("localhost", "root", "", "phonelist");
$query = "SELECT * FROM phone_lists";
$result = mysqli_query($connect, $query);
$rowcount = mysqli_num_rows( $result );
?>
@extends('admin.master')


@section('title')
    Dashboard
@endsection

@section('active')
    active
@endsection
@section('body')
    <section class="section-dashboard--main section-dashboard--userDetails custom-scrollbar">
        <div class="container">

            <div class="row">
                <div class="col-md-4 offset-8 pop-up-message--box me-0">
                    <div class="card ">
                        @if($message = Session::get('message'))
                            <div class="card-body">
                                🎉
                                <span>{{ $message }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <!-- START PEOPLE SEARCHBAR -->
                <div class="offset-md-9 col-md-3 d-flex justify-content-end">
                    <input type="text" name="search" id="searchPeople" class="searchBar w-100" onkeyup="searchPeople()"
                           placeholder="Search People..." />
                </div>
                <!-- END PEOPLE SEARCHBAR -->
            </div>

            <!-- START TABLE -->
            <div class="row pt-2 pb-4">
                <div class="col-md-12 table-scrollable" style="max-height: 86vh;">
                    <table class="table table-hover table-bordered table-responsive" id="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Current Plan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $data)
                            <tr class="table-row">
                                <td scope="row" class="name">
                                    {{ $data->firstName.' '.$data->lastName }}
                                </td>
                                <td>{{ $data->phone }}</td>
                                <td>
                                    {{ $data->email }}
                                </td>
                                <td>{{ $data->country }}</td>
                                <td>{{ $data->purchasePlan }}</td>
                                <td>
                                    <a href="{{ route('delete.user.data', ['id' => $data->id]) }}" onclick="return confirm('Are you sure?')" class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-delete bg-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END TABLE -->

            <!-- START PAGINATION -->
            <div class="row pt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <div class="d-sm-inline-flex justify-content-center">
                                {!! $allData->links() !!}
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- END PAGINATION -->
        </div>
    </section>

@endsection






{{--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">

    <!-- BOOTSTRAP ICONS     -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}adminAsset/assets/css/style.css" />
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('/') }}adminAsset/assets/images/icons/favicon.ico" />
</head>

<body>


<section class="section-dashboard">
    <!-- START SIDEBAR -->
    <section class="section-dashboard--sidebar">
        <!-- START MENU -->
        <nav class="menubar">
            <ul class="menu d-flex flex-column">
                <li class="">
                    <a href="{{ route('/') }}" class="navbar-brand">
                        <img src="{{ asset('/') }}adminAsset/assets/images/logo--company-name.svg" alt="logo" />
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-collection menu-item--icon "></i>
                        <span class="menu-item--text ">
                            Dashboard
                          </span>
                    </a>
                </li>
                <li class="menu-item active">
                    <a href="{{ route('view.all') }}">
                        <i class="bi bi-clipboard-data menu-item--icon "></i>
                        <span class="menu-item--text ">
                            View All Data
                          </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">
                        <i class="bi bi-person-badge menu-item--icon "></i>
                        <span class="menu-item--text ">
                            User Details
                          </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">
                        <i class="bi bi-box-arrow-in-down menu-item--icon "></i>
                        <span class="menu-item--text ">
                            User Data Import
                          </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="">
                        <i class="bi bi-bar-chart menu-item--icon"></i>
                        <span class="menu-item--text">
                            Order History
                          </span>
                    </a>
                </li>
                </a>
                <li class="menu-item">
                    <a href="">
                        <i class="bi bi-currency-bitcoin menu-item--icon"></i>
                        <span class="menu-item--text">
                            Credit History
                          </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">
                        <i class="bi bi-arrow-left-right menu-item--icon"></i>
                        <span class="menu-item--text">
                            Credit Transfer
                          </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">
                        <i class="bi bi-wallet2 menu-item--icon"></i>
                        <span class="menu-item--text">
                            Payment Settings
                          </span>
                    </a>
                </li>
                <li class="menu-item menu-item-footer">
                    <a href="{{ route('/') }}">
                        <i class="bi bi-power menu-item--icon"></i>
                        <span class="menu-item--text">
                            Logout
                          </span>
                    </a>
                </li>
                </a>
            </ul>
        </nav>
        <!-- END MENU -->
    </section>
    <!-- END SIDEBAR -->

    <!-- START MAIN BODY -->


</body>

</html>--}}

