@extends('userDashboard.settings.master')

@section('main')
    <section class="section-main">
        <!-- START SECOND NAVBAR -->
        <section class="second-navbar">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="{{ route('exports') }}" class="nav-link {{  request()->routeIs('exports') ? 'active' : '' }}">CSV Exports</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('csv-export-settings') }}" class="nav-link {{  request()->routeIs('csv-export-settings') ? 'active' : '' }}"
                    >CSV Export Settings</a
                    >
                </li>
            </ul>
        </section>
        <!-- END SECOND NAVBAR -->

        <!-- START CSV EXPORT SETTINGS -->
        <section
            class="section-csv-export-settings u-padding-lg d-flex flex-column align-items-center"
        >
            <h3 class="fw-bold text-dark">CSV Export Settings</h3>
            <div class="card border-0 u-box-shadow-1">
                <div class="card-body p-4">
                    <h4 class="card-title border-0">
                        What is the CSV Export settings for?
                    </h4>
                    <p class="card-text text-secondary">
                        You can customize the default fields you want to download
                        every time you export a CSV file.
                    </p>
                    <div class="csv-export-box d-flex justify-content-between">
                        <div class="csv-export-icon-box d-flex align-items-center">
                            <i class="bi bi-people-fill px-3"></i>
                            <div class="csv-export-title">Contact CSV Export</div>
                        </div>

                        <!-- BUTTON TRIGGER MODAL -->
                        <button
                            type="button"
                            class="csv-export-button btn btn-access fw-bold"
                            data-bs-toggle="modal"
                            data-bs-target="#contactCSVExport"
                        >
                            <i class="bi bi-gear pe-1"></i>
                            Edit Settings
                        </button>

                        <!-- Modal -->
                        <div
                            class="modal fade"
                            id="contactCSVExport"
                            tabindex="-1"
                            aria-labelledby="contactCSVExportLabel"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="{{ route('custom.csv.settings') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4
                                                class="modal-title fw-bold text-dark"
                                                id="contactCSVExportLabel"
                                            >
                                                Contact CSV Export
                                            </h4>
                                            <div>
                                                <button
                                                    type="button"
                                                    class="btn btn-access text-dark"
                                                    data-bs-dismiss="modal"
                                                >
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-purple">
                                                    Save settings
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div
                                                class="modal-body--header border-bottom py-3 d-flex align-items-center justify-content-between"
                                            >
                                                <h4 class="text-dark fw-bold">Standard Fields</h4>
                                                <input id="checkAll" type="button" class="selectAll fs-4" value="Select All" onclick="myFunction()"/>
                                            </div>
                                            <div class="modal-body--content py-4">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>First Name</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'first_name') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="first_name"
                                                                                name="first_name"
                                                                                value="first_name"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="first_name"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="first_name"
                                                                                name="first_name"
                                                                                value="first_name"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="first_name"
                                                                        >
                                                                        </label>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Last Name</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'last_name') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="last_name"
                                                                                name="last_name"
                                                                                value="last_name"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="last_name"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="last_name"
                                                                                name="last_name"
                                                                                value="last_name"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="last_name"
                                                                        >
                                                                        </label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Facebook Profile</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'uid') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="uid"
                                                                                name="uid"
                                                                                value="uid"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="uid"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="uid"
                                                                                name="uid"
                                                                                value="uid"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="uid"
                                                                        >
                                                                        </label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Phone Number</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'phone') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="phone"
                                                                                name="phone"
                                                                                value="phone"
                                                                                checked
                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="phone"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="phone"
                                                                                name="phone"
                                                                                value="phone"
                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="phone"
                                                                        >
                                                                        </label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Email</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'email') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="email"
                                                                                name="email"
                                                                                value="email"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="email"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="email"
                                                                                name="email"
                                                                                value="email"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="email"
                                                                        >
                                                                        </label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Gender</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'gender') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="gender"
                                                                                name="gender"
                                                                                value="gender"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="gender"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="gender"
                                                                                name="gender"
                                                                                value="gender"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="gender"
                                                                        >
                                                                        </label>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Relationship Status</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'relationship_status') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="relationship_status"
                                                                                name="relationship_status"
                                                                                value="relationship_status"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="relationship_status"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="relationship_status"
                                                                                name="relationship_status"
                                                                                value="relationship_status"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="relationship_status"
                                                                        >
                                                                        </label>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Work Place</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'work') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="work"
                                                                                name="work"
                                                                                value="work"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="work"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="work"
                                                                                name="work"
                                                                                value="work"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="work"
                                                                        >
                                                                        </label>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Last Education Year</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'education_last_year') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="education_last_year"
                                                                                name="education_last_year"
                                                                                value="education_last_year"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="education_last_year"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="education_last_year"
                                                                                name="education_last_year"
                                                                                value="education_last_year"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="education_last_year"
                                                                        >
                                                                        </label>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Current Address</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'location') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="location"
                                                                                name="location"
                                                                                value="location"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="location"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="location"
                                                                                name="location"
                                                                                value="location"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="location"
                                                                        >
                                                                        </label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Home Town</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'hometown') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="hometown"
                                                                                name="hometown"
                                                                                value="hometown"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="hometown"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="hometown"
                                                                                name="hometown"
                                                                                value="hometown"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="hometown"
                                                                        >
                                                                        </label>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <div class="field-name-box">
                                                                <h5>Country</h5>
                                                                <div class="form-check">
                                                                    @if (strpos($csvSettings, 'country') !== false)
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="countryName"
                                                                                name="countryName"
                                                                                value="country"
                                                                                checked

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="countryName"
                                                                        >
                                                                        </label>
                                                                    @else
                                                                        <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                id="countryName"
                                                                                name="countryName"
                                                                                value="country"

                                                                        />
                                                                        <label
                                                                                class="form-check-label"
                                                                                for="countryName"
                                                                        >
                                                                        </label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END CSV EXPORT SETTINGS -->
    </section>

    <script type="text/javascript">
        function myFunction() {
                let checkBox1 = document.getElementById("phone");
                checkBox1.checked = true;
                let checkBox2 = document.getElementById("uid");
                checkBox2.checked = true;
                let checkBox3 = document.getElementById("email");
                checkBox3.checked = true;
                let checkBox4 = document.getElementById("first_name");
                checkBox4.checked = true;
                let checkBox5 = document.getElementById("last_name");
                checkBox5.checked = true;
                let checkBox6 = document.getElementById("gender");
                checkBox6.checked = true;
                let checkBox7 = document.getElementById("countryName");
                checkBox7.checked = true;
                let checkBox8 = document.getElementById("location");
                checkBox8.checked = true;
                let checkBox9 = document.getElementById("hometown");
                checkBox9.checked = true;
                let checkBox10 = document.getElementById("relationship_status");
                checkBox10.checked = true;
                let checkBox11 = document.getElementById("education_last_year");
                checkBox11.checked = true;
                let checkBox12 = document.getElementById("work");
                checkBox12.checked = true;

        }
    </script>
@endsection


