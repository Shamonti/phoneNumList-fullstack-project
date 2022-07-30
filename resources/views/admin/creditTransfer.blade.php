@extends('admin.master')


@section('title')
    Credit History | Phone List
@endsection

@section('active')
    active
@endsection
@section('body')
    <section class="section-dashboard--main section-dashboard--creditTransfer custom-scrollbar">
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
                <div class="col-md-12 table-scrollable" style="max-height: 80vh;">
                    <table class="table table-hover table-bordered table-responsive" id="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Current Plan</th>
                            <th>Update Credit</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userData  as $data)
                            <tr class="table-row">
                                <td scope="row" class="name">
                                    {{ $data->firstName }} {{$data->lastName}}
                                </td>
                                <td>{{ $data->phone }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-purple dropdown-toggle bg-secondary rounded-1 my-3" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            {{ $data->purchasePlan }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a class="dropdown-item" href="{{ route('update.user.plan', ['planId' => 1,'id' => $data->id]) }}">Free</a>
                                            <a class="dropdown-item" href="{{ route('update.user.plan', ['planId' => 2,'id' => $data->id]) }}">Basic</a>
                                            <a class="dropdown-item" href="{{ route('update.user.plan', ['planId' => 3,'id' => $data->id]) }}">Professional</a>
                                            <a class="dropdown-item" href="{{ route('update.user.plan', ['planId' => 4,'id' => $data->id]) }}">Business</a>
                                            <a class="dropdown-item" href="{{ route('update.user.plan', ['planId' => 5,'id' => $data->id]) }}">Business Pro</a>
                                            <a class="dropdown-item" href="{{ route('update.user.plan', ['planId' => 6,'id' => $data->id]) }}">Enterprise</a>
                                            <a class="dropdown-item" href="{{ route('update.user.plan', ['planId' => 7,'id' => $data->id]) }}">Custom</a>
                                        </div>
                                    </div>
                                </td>
                                <form action="{{ route('update.user.credit') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <td>
                                        <input type="number" class="form-control w-50 fs-4"  name="useAbleCredit" value="{{ $data->useAbleCredit }}">
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <input hidden type="text" name="id" value="{{ $data->id }}">
                                            <button type="submit" class="btn btn-delete bg-info" id="updateUserCredit">Update</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- START PAGINATION -->
                    <div class="row pb-2 pt-5 mt-2">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <div class="d-sm-inline-flex justify-content-center">
                                        {!! $userData->links() !!}
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- END PAGINATION -->
                </div>
            </div>
            <!-- END TABLE -->

        </div>
    </section>
@endsection






