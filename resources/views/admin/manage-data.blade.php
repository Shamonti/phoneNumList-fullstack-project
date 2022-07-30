@extends('admin.master')


@section('title')
    Dashboard
@endsection

@section('active')
    active
@endsection
@section('body')
    <section class="section-dashboard--main section-viewalldata">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-8 pop-up-message--box me-0">
                    <div class="card ">
                        @if($message = Session::get('message'))
                        <div class="card-body">
                            🎉
                            <span>{{ $message }}{{--Successfully deleted data!--}}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if(isset($allDataName))
                <div class="row mb-4">
                    <div class="col-md-4 m-auto">
                        <h3 class="fw-light">Total Entries: <span>{{ $rowcount }}</span> </h3>
                    </div>

                    <!-- START PEOPLE SEARCHBAR -->
                    <div class="offset-md-5 col-md-3 d-flex justify-content-end">
                        <form id="search" action="{{ route('people.search.by.admin') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="text"
                                   name="search"
                                   id="searchPeopleByAdmin"
                                   class="searchBar w-100"
                                   onkeyup="searchPeople()"
                                   autocomplete="off"
                                   placeholder="Search People..."
                                   value="{{ $res }}"/>

                            {{--<button type="submit" class="btn btn-purple rounded-1 w-100">
                                Apply
                            </button>--}}
                        </form>
                    </div>
                    <!-- END PEOPLE SEARCHBAR -->
                </div>

                <!-- START TABLE -->
                <div class="row pt-2 pb-4">

                    <!-- TODO Add table-scrollable to col-md-12 -->
                    <div class="col-md-12 table-scrollable">
                        <table class="table table-hover table-bordered table-responsive edit" id="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Facebook URL</th>

                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allDataName as $data)
                                <tr class="table-row">
                                    <td scope="row" class="name">
                                        <a href=""> {{ $data->full_name }} </a>
                                    </td>
                                    <td> {{$data->phone }} </td>
                                    <td> {{ $data->email }} </td>
                                    <td> https://www.facebook.com/{{ $data->uid }} </td>

                                    <td>
                                        <input type="button" name="view" value="Edit" id="{{ $data->id }}" class="btn btn-edit bg-primary view_data" data-bs-toggle="modal" data-bs-target="#dataModal{{ $data->id }}" />
                                    </td>

                                    <td>
                                        <a href="{{ route('delete-data', ['id' => $data->id]) }}" onclick="return confirm('Are you sure?')">
                                            <button type="button" class="btn btn-delete bg-danger">Delete</button>
                                        </a>


                                    </td>

                                </tr>
                                <!-- START MODAL FOR EDIT  -->
                                <div class="modal editModal fade" id="dataModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body" >
                                                <form action="{{ route('edit.phoneList.data') }}" enctype="multipart/form-data" method="post">
                                                    @csrf

                                                    <input hidden type="text" class="form-control" name="phoneListUserid" value="{{$data->id }}">
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{$data->email }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" name="first_name" value="{{$data->first_name }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="last_name" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" value="{{$data->last_name }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Gender</label>
                                                        <input type="text" class="form-control" name="gender" value="{{$data->gender }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="country" class="form-label">Country</label>
                                                        <input type="text" class="form-control" name="country" value="{{$data->country}}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="location" class="form-label">Location</label>
                                                        <input type="text" class="form-control" name="location" value="{{$data->location }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="hometown" class="form-label">Hometown</label>
                                                        <input type="text" class="form-control" name="hometown" value="{{$data->hometown }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="relation" class="form-label">Relationship Status</label>
                                                        <input type="text" class="form-control" name="relation" value="{{$data->relationship_status }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="education" class="form-label">Education Last Year</label>
                                                        <input type="number" class="form-control" name="education" value="{{$data->education_last_year }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="work" class="form-label">Workplace</label>
                                                        <input type="text" class="form-control" name="work" value="{{$data->work }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- END MODAL FOR EDIT  -->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
                                        {!! $allDataName->links() !!}
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- END PAGINATION -->
                </div>
                <!-- END TABLE -->
            @else
                <div class="row mb-4">
                    <div class="col-md-4 m-auto">
                        <h3 class="fw-light">Total Entries: <span>{{ $rowcount }}</span> </h3>
                    </div>

                    <!-- START PEOPLE SEARCHBAR -->
                    <div class="offset-md-5 col-md-3 d-flex justify-content-end">
                        <form id="search" action="{{ route('people.search.by.admin') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="text"
                                   name="search"
                                   id="searchPeopleByAdmin"
                                   class="searchBar w-100"
                                   onkeyup="searchPeople()"
                                   autocomplete="off"
                                   placeholder="Search People..." />
                            {{--value="{{ $res }}"--}}
                            {{--<button type="submit" class="btn btn-purple rounded-1 w-100">
                                Apply
                            </button>--}}
                        </form>
                    </div>
                    <!-- END PEOPLE SEARCHBAR -->
                </div>

                <!-- START TABLE -->
                <div class="row pt-2 pb-4">

                    <!-- TODO Add table-scrollable to col-md-12 -->
                    <div class="col-md-12 table-scrollable">
                        <table class="table table-hover table-bordered table-responsive edit" id="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Facebook URL</th>

                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allData as $data)
                                <tr class="table-row">
                                    <td scope="row" class="name">
                                        <a href=""> {{ $data->full_name }} </a>
                                    </td>
                                    <td> {{$data->phone }} </td>
                                    <td> {{ $data->email }} </td>
                                    <td> https://www.facebook.com/{{ $data->uid }} </td>

                                    <td>
                                        <input type="button" name="view" value="Edit" id="{{ $data->id }}" class="btn btn-edit bg-primary view_data" data-bs-toggle="modal" data-bs-target="#dataModal{{ $data->id }}" />
                                    </td>

                                    <td>
                                        <a href="{{ route('delete-data', ['id' => $data->id]) }}" onclick="return confirm('Are you sure?')">
                                            <button type="button" class="btn btn-delete bg-danger">Delete</button>
                                        </a>


                                    </td>

                                </tr>
                                <!-- START MODAL FOR EDIT  -->
                                <div class="modal editModal fade" id="dataModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body" >
                                                <form action="{{ route('edit.phoneList.data') }}" enctype="multipart/form-data" method="post">
                                                    @csrf

                                                    <input hidden type="text" class="form-control" name="phoneListUserid" value="{{$data->id }}">
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{$data->email }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="first_name" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" name="first_name" value="{{$data->first_name }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="last_name" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" value="{{$data->last_name }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Gender</label>
                                                        <input type="text" class="form-control" name="gender" value="{{$data->gender }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="country" class="form-label">Country</label>
                                                        <input type="text" class="form-control" name="country" value="{{$data->country}}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="location" class="form-label">Location</label>
                                                        <input type="text" class="form-control" name="location" value="{{$data->location }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="hometown" class="form-label">Hometown</label>
                                                        <input type="text" class="form-control" name="hometown" value="{{$data->hometown }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="relation" class="form-label">Relationship Status</label>
                                                        <input type="text" class="form-control" name="relation" value="{{$data->relationship_status }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="education" class="form-label">Education Last Year</label>
                                                        <input type="number" class="form-control" name="education" value="{{$data->education_last_year }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="work" class="form-label">Workplace</label>
                                                        <input type="text" class="form-control" name="work" value="{{$data->work }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- END MODAL FOR EDIT  -->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
                <!-- END TABLE -->
            @endif

        </div>
    </section>
    <!-- END MAIN BODY -->
@endsection




