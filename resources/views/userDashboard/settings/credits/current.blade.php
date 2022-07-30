@extends('userDashboard.settings.master')

@section('main')
    <section class="section-main">
        <!-- START SECOND NAVBAR -->
        <section class="second-navbar">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="{{ route('current') }}" class="nav-link {{  request()->routeIs('current') ? 'active' : '' }}"
                    >Current Credit Usage</a
                    >
                </li>
                <li class="nav-item">
                    <a href="{{ route('history') }}" class="nav-link {{  request()->routeIs('history') ? 'active' : '' }}">Credit Usage History</a>
                </li>
            </ul>
        </section>
        <!-- END SECOND NAVBAR -->

        <!-- START CURRENT CREDIT -->
        <section class="section-current-credit">
            <div class="card u-box-shadow-2 m-4 border rounded-3">
                <div
                    class="card-title d-flex justify-content-between align-items-center"
                >
                    <h3 class="p-4 text-capitalize">
                        Credits Usage <span> {{ $userPurchasePlan[1] }} {{ $userPurchasePlan[3] }} {{ $userPurchasePlan[2] }}  - {{ $userPurchasePlan[4] }} {{ $userPurchasePlan[5] }} {{ $userPurchasePlan[6] }} </span>
                    </h3>
                    <a
                        href="{{route('upgrade')}}"
                        type="button"
                        class="btn btn-access me-4"
                    >
                        Buy More Credits
                    </a>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="fs-3">
                                    Email Credits
                                    <i
                                        class="bi bi-question-circle-fill text-secondary"
                                    ></i>
                                    <p class="mt-4">
                                        You have used <span class="text-primary">{{ $userPurchasePlan[7] }}</span> of
                                        <span class="text-dark">{{ $userPurchasePlan[8] }}</span> available email
                                        credits this billing cycle.
                                    </p>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END CURRENT CREDIT -->
    </section>
@endsection
