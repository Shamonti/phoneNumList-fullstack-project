@extends('userDashboard.master')


@section('title')
    You | Phone List
@endsection

@section('body')
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
                        <h2 class="fs-4 m-0 fw-bold">You</h2>
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a href="{{ route('managePlan') }}" class="nav-link {{  request()->routeIs('managePlan') ? 'active' : '' }} {{  request()->routeIs('billing') ? 'active' : '' }}" >
                        <h2 class="fs-4 m-0 fw-bold">Manage Plan</h2>
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <span class="text-uppercase">System Activity</span>
                    <a href="{{ route('exports') }}" class="nav-link {{  request()->routeIs('exports') ? 'active' : '' }} {{  request()->routeIs('csv-export-settings') ? 'active' : '' }}">Exports</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('current') }}" class="nav-link {{  request()->routeIs('current') ? 'active' : '' }} {{  request()->routeIs('history') ? 'active' : '' }}"> Credit Usage </a>
                </li>
            </ul>
        </section>
        <!-- END SIDEBAR -->

        <!-- START MAIN -->
        @yield('main')
        <!-- END MAIN -->
    </section>
@endsection
