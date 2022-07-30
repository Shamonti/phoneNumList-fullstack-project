@extends('front.master')

@section('metaDescription')
    List of contacts in Phone Number List's database for contacts living in '{{ $dataId }}' which can be used for telemarketing campaigns
@endsection


@section('title')
    Country Search: {{ $dataId }} | Phone List
@endsection

@section('main')
    <!-- START BREADCRUMB -->
    <hr class="mt-lg-0 mt-5 text-secondary" />
    <div class="container">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $dataId }}</li>
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
                                <input type="text" name="searchPeople" id="searchPeople"
                                       class="searchBar bg-white border-5 text-dark fw-normal col-md-9 col-8"
                                       placeholder="Search by Name..." autocomplete="off"/>
                                <button type="submit" class="btn btn-purple">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="dropdown" id="searchCountry">
                        <input
                                class="searchBar w-100 bg-white text-dark fw-normal"
                                id="countryDropdown"
                                type="text"
                                placeholder="Search Person by Country..."
                                data-toggle="dropdown"
                                data-bs-toggle="dropdown"
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
    <!-- START SECTION PEOPLE CARDS -->
    <section class="section-people-cards mt-4 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card u-box-shadow-1 border-0 u-border-radius h-100 bg-light">
                        <div class="card-body p-5">
                            <h4 class="card-title">
                                <div class="d-flex align-items-center">
                                    <div class="circle-element circle-element--person">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <h1 class="sub-heading">People Search per Country</h1>
                                </div>

                                <select
                                        id="country"
                                        name="country"
                                        class="offset-md-2 col-md-4"
                                        onchange="window.location.href=this.options[this.selectedIndex].value;"
                                >
                                    @foreach($country as $countries)
                                        <option value="{{ route('country', ['id' => $countries->countryname]) }}" @if ($dataId == $countries->countryname) selected  @endif >{{ $countries->countryname }} ({{ $countries->countrycode }})</option>
                                    @endforeach
                                </select>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-5">
                    <div class="card bg-transparent u-border-radius h-100">
                        <div class="card-body d-flex align-items-center p-5 mx-lg-5">
                            <div class="col-4 pe-lg-5 pe-4">
                                <img src="{{ asset('/') }}adminAsset/assets/images/data.svg" class="img-fluid" alt="illustration" />
                            </div>
                            <div class="col-md-8">
                                <h2 class="heading--sub mb-4">
                                    Reach your target contacts faster with Phone Number List
                                    </h1>
                                    <a href="{{ route('/phonelistUserRegister') }}" type="button" class="btn btn-grad px-4">
                                        Sign Up For Free
                                    </a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION PEOPLE CARDS -->

    <!-- START SECTION MESSAGE -->
    <section class="section-message">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-body p-5 mt-5">
                            <h2 class="card-text no-data d-none">
                                No Person pages found for:
                                <span class="text-secondary">A</span>
                            </h2>
                            <p class="card-text">
                                @forelse ($data as $countryData)
                                    <a href="{{route('user', ['id' => $countryData->id]) }}" class="user-link">
                                        {{$countryData->first_name." ".$countryData->last_name }}
                                    </a>
                            @empty
                                <h2 class="card-text no-data">
                                    No Person pages found for :
                                    <span class="text-secondary"> {{ $dataId }}</span>
                                </h2>
                                @endforelse
                                </p>

                                <div class="card-footer bg-transparent border-0">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <div class="d-flex justify-content-center">
                                                    {!! $data->links() !!}
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION MESSAGE -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>

    <script type="text/javascript">
        let route = "{{ url('/autocomplete-search') }}";
        $('#searchPeople').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
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

@endsection


<script>
    function handleName(e){
        if(e.key === "Enter"){
            //alert("Enter was just pressed.");
        }

        return false;
    }
</script>




