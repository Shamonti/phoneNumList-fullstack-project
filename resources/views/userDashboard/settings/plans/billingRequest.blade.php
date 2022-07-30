@extends('userDashboard.settings.master')
@section('main')
    <section class="section-main">
        <!-- START SECOND NAVBAR -->
        <section class="second-navbar">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="{{ route('managePlan') }}" class="nav-link {{  request()->routeIs('managePlan') ? 'active' : '' }}">Plan Overview</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('billing') }}" class="nav-link {{  request()->routeIs('billing') ? 'active' : '' }}">Billing</a>
                </li>
            </ul>
        </section>
        <!-- END SECOND NAVBAR -->

        <!-- START BILLING -->
        <section class="section-settings-billing">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 p-0 d-none">
                        <!-- START Credit Card Information -->
                        <div class="card p-4 border-0 rounded-3">
                            <div class="card-title m-0 d-flex justify-content-between align-items-center  col-12">
                                <h1 class="py-4 text-capitalize fs-2 fw-bold col-5">
                                    Credit Card Information
                                </h1>
                                <!-- Button trigger modal -->
                                <div class="col-7">
                                    @if( !$userCardInfo->isEmpty() )
                                        <button type="button" class="btn btn-purple col-5" data-bs-toggle="modal"
                                                data-bs-target="#creditCardModalEdit">
                                            <i class="bi bi-pen pe-1"></i>
                                            Update Credit Card
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-purple col-5" data-bs-toggle="modal"
                                                data-bs-target="#creditCardModal">
                                            <i class="bi bi-pen pe-1"></i>
                                            Add Credit Card
                                        </button>
                                    @endif
                                        @if( !$userCardInfo->isEmpty() )
                                            <a href="{{ route('removeCard') }}">
                                                <button type="button"  class="btn btn-purple text-white col-5 ">
                                                    <i class="bi bi-dash pe-1"></i>
                                                    Remove Credit Card
                                                </button>
                                            </a>
                                        @endif
                                </div>
                            </div>

                            <!-- WHEN NO CREDIT CARD INFO FOUND -->

                            @if( $userCardInfo->isEmpty() )
                                <div class="card-body text-secondary">
                                    <span>You have not entered any credit card information yet.</span>
                                </div>
                        @endif


                        <!-- Modal -->
                            <div class="modal fade" id="creditCardModal" tabindex="-1" aria-labelledby="creditCardModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="creditCardModalLabel"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-4 mb-5">
                                            <form action="{{ route('addCardInfo') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div>
                                                    <h5>Your Details</h5>
                                                    <div class="card u-box-shadow-2 border-0">
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <input type="text" hidden name="userId" value="{{ Auth::user()->id }}" class="form-control"/>
                                                                            <label for="fname" class="form-label">First Name</label>
                                                                            <input type="text" name="firstName" value="" class="form-control" id="fname" placeholder="First Name"
                                                                                   required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="lname" class="form-label">Last Name</label>
                                                                            <input type="text" name="lastName" value="" class="form-control" id="lname" placeholder="Last Name"
                                                                                   required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <h5>Card Details</h5>
                                                    <div class="card u-box-shadow-2 border-0">
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="cNumber" class="form-label">Credit Card Number</label>
                                                                            <input type="number" name="creditCardNumber" value="" class="form-control" id="cNumber"
                                                                                   placeholder="1234 1234 1234 1234" required maxlength="16" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="expDate" class="form-label">Expiration Date</label>
                                                                            <input type="text" name="expirationDate" value="" class="form-control" id="expDate" placeholder="MM / YY"
                                                                                   required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="cvc" class="form-label">CVC</label>
                                                                            <input type="number" name="cvc" value="" class="form-control" id="cvc" placeholder="CVC"
                                                                                   required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <h5>Billing Information</h5>
                                                    <div class="card u-box-shadow-2 border-0">
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="address" class="form-label">Address</label>
                                                                            <input type="text" name="address" value="" class="form-control" id="address" placeholder="Address"
                                                                                   required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="city" class="form-label">City</label>
                                                                            <input type="text" name="city" value="" class="form-control" id="city" placeholder="City" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="state" class="form-label">State</label>
                                                                            <input type="text" name="state" value="" class="form-control" id="state" placeholder="State" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="country" class="form-label">Country</label>
                                                                            <div class="country-dropdown">
                                                                                <select name="country" class="col-12">
                                                                                    <option selected value="Afghanistan">
                                                                                        Afghanistan
                                                                                    </option>
                                                                                    <option value="Åland Islands">
                                                                                        Åland Islands
                                                                                    </option>
                                                                                    <option value="Albania">
                                                                                        Albania
                                                                                    </option>
                                                                                    <option value="Algeria">
                                                                                        Algeria
                                                                                    </option>
                                                                                    <option value="American Samoa">
                                                                                        American Samoa
                                                                                    </option>
                                                                                    <option value="Andorra">
                                                                                        Andorra
                                                                                    </option>
                                                                                    <option value="Angola">Angola</option>
                                                                                    <option value="Anguilla">
                                                                                        Anguilla
                                                                                    </option>
                                                                                    <option value="Antarctica">
                                                                                        Antarctica
                                                                                    </option>
                                                                                    <option value="Antigua and Barbuda">
                                                                                        Antigua and Barbuda
                                                                                    </option>
                                                                                    <option value="Argentina">
                                                                                        Argentina
                                                                                    </option>
                                                                                    <option value="Armenia">
                                                                                        Armenia
                                                                                    </option>
                                                                                    <option value="Aruba">Aruba</option>
                                                                                    <option value="Australia">
                                                                                        Australia
                                                                                    </option>
                                                                                    <option value="Austria">
                                                                                        Austria
                                                                                    </option>
                                                                                    <option value="Azerbaijan">
                                                                                        Azerbaijan
                                                                                    </option>
                                                                                    <option value="Bahamas">
                                                                                        Bahamas
                                                                                    </option>
                                                                                    <option value="Bahrain">
                                                                                        Bahrain
                                                                                    </option>
                                                                                    <option value="Bangladesh">
                                                                                        Bangladesh
                                                                                    </option>
                                                                                    <option value="Barbados">
                                                                                        Barbados
                                                                                    </option>
                                                                                    <option value="Belarus">
                                                                                        Belarus
                                                                                    </option>
                                                                                    <option value="Belgium">
                                                                                        Belgium
                                                                                    </option>
                                                                                    <option value="Belize">Belize</option>
                                                                                    <option value="Benin">Benin</option>
                                                                                    <option value="Bermuda">
                                                                                        Bermuda
                                                                                    </option>
                                                                                    <option value="Bhutan">Bhutan</option>
                                                                                    <option value="Bolivia">
                                                                                        Bolivia
                                                                                    </option>
                                                                                    <option value="Bosnia and Herzegovina">
                                                                                        Bosnia and Herzegovina
                                                                                    </option>
                                                                                    <option value="Botswana">
                                                                                        Botswana
                                                                                    </option>
                                                                                    <option value="Bouvet Island">
                                                                                        Bouvet Island
                                                                                    </option>
                                                                                    <option value="Brazil">Brazil</option>
                                                                                    <option value="British Indian Ocean Territory">
                                                                                        British Indian Ocean Territory
                                                                                    </option>
                                                                                    <option value="Brunei Darussalam">
                                                                                        Brunei Darussalam
                                                                                    </option>
                                                                                    <option value="Bulgaria">
                                                                                        Bulgaria
                                                                                    </option>
                                                                                    <option value="Burkina Faso">
                                                                                        Burkina Faso
                                                                                    </option>
                                                                                    <option value="Burundi">
                                                                                        Burundi
                                                                                    </option>
                                                                                    <option value="Cambodia">
                                                                                        Cambodia
                                                                                    </option>
                                                                                    <option value="Cameroon">
                                                                                        Cameroon
                                                                                    </option>
                                                                                    <option value="Canada">Canada</option>
                                                                                    <option value="Cape Verde">
                                                                                        Cape Verde
                                                                                    </option>
                                                                                    <option value="Cayman Islands">
                                                                                        Cayman Islands
                                                                                    </option>
                                                                                    <option value="Central African Republic">
                                                                                        Central African Republic
                                                                                    </option>
                                                                                    <option value="Chad">Chad</option>
                                                                                    <option value="Chile">Chile</option>
                                                                                    <option value="China">China</option>
                                                                                    <option value="Christmas Island">
                                                                                        Christmas Island
                                                                                    </option>
                                                                                    <option value="Cocos (Keeling) Islands">
                                                                                        Cocos (Keeling) Islands
                                                                                    </option>
                                                                                    <option value="Colombia">
                                                                                        Colombia
                                                                                    </option>
                                                                                    <option value="Comoros">
                                                                                        Comoros
                                                                                    </option>
                                                                                    <option value="Congo">Congo</option>
                                                                                    <option value="Congo, The Democratic Republic of The">
                                                                                        Congo, The Democratic Republic of
                                                                                        The
                                                                                    </option>
                                                                                    <option value="Cook Islands">
                                                                                        Cook Islands
                                                                                    </option>
                                                                                    <option value="Costa Rica">
                                                                                        Costa Rica
                                                                                    </option>
                                                                                    <option value="Cote D'ivoire">
                                                                                        Cote D'ivoire
                                                                                    </option>
                                                                                    <option value="Croatia">
                                                                                        Croatia
                                                                                    </option>
                                                                                    <option value="Cuba">Cuba</option>
                                                                                    <option value="Cyprus">Cyprus</option>
                                                                                    <option value="Czech Republic">
                                                                                        Czech Republic
                                                                                    </option>
                                                                                    <option value="Denmark">
                                                                                        Denmark
                                                                                    </option>
                                                                                    <option value="Djibouti">
                                                                                        Djibouti
                                                                                    </option>
                                                                                    <option value="Dominica">
                                                                                        Dominica
                                                                                    </option>
                                                                                    <option value="Dominican Republic">
                                                                                        Dominican Republic
                                                                                    </option>
                                                                                    <option value="Ecuador">
                                                                                        Ecuador
                                                                                    </option>
                                                                                    <option value="Egypt">Egypt</option>
                                                                                    <option value="El Salvador">
                                                                                        El Salvador
                                                                                    </option>
                                                                                    <option value="Equatorial Guinea">
                                                                                        Equatorial Guinea
                                                                                    </option>
                                                                                    <option value="Eritrea">
                                                                                        Eritrea
                                                                                    </option>
                                                                                    <option value="Estonia">
                                                                                        Estonia
                                                                                    </option>
                                                                                    <option value="Ethiopia">
                                                                                        Ethiopia
                                                                                    </option>
                                                                                    <option value="Falkland Islands (Malvinas)">
                                                                                        Falkland Islands (Malvinas)
                                                                                    </option>
                                                                                    <option value="Faroe Islands">
                                                                                        Faroe Islands
                                                                                    </option>
                                                                                    <option value="Fiji">Fiji</option>
                                                                                    <option value="Finland">
                                                                                        Finland
                                                                                    </option>
                                                                                    <option value="France">France</option>
                                                                                    <option value="French Guiana">
                                                                                        French Guiana
                                                                                    </option>
                                                                                    <option value="French Polynesia">
                                                                                        French Polynesia
                                                                                    </option>
                                                                                    <option value="French Southern Territories">
                                                                                        French Southern Territories
                                                                                    </option>
                                                                                    <option value="Gabon">Gabon</option>
                                                                                    <option value="Gambia">Gambia</option>
                                                                                    <option value="Georgia">
                                                                                        Georgia
                                                                                    </option>
                                                                                    <option value="Germany">
                                                                                        Germany
                                                                                    </option>
                                                                                    <option value="Ghana">Ghana</option>
                                                                                    <option value="Gibraltar">
                                                                                        Gibraltar
                                                                                    </option>
                                                                                    <option value="Greece">Greece</option>
                                                                                    <option value="Greenland">
                                                                                        Greenland
                                                                                    </option>
                                                                                    <option value="Grenada">
                                                                                        Grenada
                                                                                    </option>
                                                                                    <option value="Guadeloupe">
                                                                                        Guadeloupe
                                                                                    </option>
                                                                                    <option value="Guam">Guam</option>
                                                                                    <option value="Guatemala">
                                                                                        Guatemala
                                                                                    </option>
                                                                                    <option value="Guernsey">
                                                                                        Guernsey
                                                                                    </option>
                                                                                    <option value="Guinea">Guinea</option>
                                                                                    <option value="Guinea-bissau">
                                                                                        Guinea-bissau
                                                                                    </option>
                                                                                    <option value="Guyana">Guyana</option>
                                                                                    <option value="Haiti">Haiti</option>
                                                                                    <option value="Heard Island and Mcdonald Islands">
                                                                                        Heard Island and Mcdonald Islands
                                                                                    </option>
                                                                                    <option value="Holy See (Vatican City State)">
                                                                                        Holy See (Vatican City State)
                                                                                    </option>
                                                                                    <option value="Honduras">
                                                                                        Honduras
                                                                                    </option>
                                                                                    <option value="Hong Kong">
                                                                                        Hong Kong
                                                                                    </option>
                                                                                    <option value="Hungary">
                                                                                        Hungary
                                                                                    </option>
                                                                                    <option value="Iceland">
                                                                                        Iceland
                                                                                    </option>
                                                                                    <option value="India">India</option>
                                                                                    <option value="Indonesia">
                                                                                        Indonesia
                                                                                    </option>
                                                                                    <option value="Iran, Islamic Republic of">
                                                                                        Iran, Islamic Republic of
                                                                                    </option>
                                                                                    <option value="Iraq">Iraq</option>
                                                                                    <option value="Ireland">
                                                                                        Ireland
                                                                                    </option>
                                                                                    <option value="Isle of Man">
                                                                                        Isle of Man
                                                                                    </option>
                                                                                    <option value="Israel">Israel</option>
                                                                                    <option value="Italy">Italy</option>
                                                                                    <option value="Jamaica">
                                                                                        Jamaica
                                                                                    </option>
                                                                                    <option value="Japan">Japan</option>
                                                                                    <option value="Jersey">Jersey</option>
                                                                                    <option value="Jordan">Jordan</option>
                                                                                    <option value="Kazakhstan">
                                                                                        Kazakhstan
                                                                                    </option>
                                                                                    <option value="Kenya">Kenya</option>
                                                                                    <option value="Kiribati">
                                                                                        Kiribati
                                                                                    </option>
                                                                                    <option value="Korea, Democratic People's Republic of">
                                                                                        Korea, Democratic People's Republic
                                                                                        of
                                                                                    </option>
                                                                                    <option value="Korea, Republic of">
                                                                                        Korea, Republic of
                                                                                    </option>
                                                                                    <option value="Kuwait">Kuwait</option>
                                                                                    <option value="Kyrgyzstan">
                                                                                        Kyrgyzstan
                                                                                    </option>
                                                                                    <option value="Lao People's Democratic Republic">
                                                                                        Lao People's Democratic Republic
                                                                                    </option>
                                                                                    <option value="Latvia">Latvia</option>
                                                                                    <option value="Lebanon">
                                                                                        Lebanon
                                                                                    </option>
                                                                                    <option value="Lesotho">
                                                                                        Lesotho
                                                                                    </option>
                                                                                    <option value="Liberia">
                                                                                        Liberia
                                                                                    </option>
                                                                                    <option value="Libyan Arab Jamahiriya">
                                                                                        Libyan Arab Jamahiriya
                                                                                    </option>
                                                                                    <option value="Liechtenstein">
                                                                                        Liechtenstein
                                                                                    </option>
                                                                                    <option value="Lithuania">
                                                                                        Lithuania
                                                                                    </option>
                                                                                    <option value="Luxembourg">
                                                                                        Luxembourg
                                                                                    </option>
                                                                                    <option value="Macao">Macao</option>
                                                                                    <option value="Macedonia, The Former Yugoslav Republic of">
                                                                                        Macedonia, The Former Yugoslav
                                                                                        Republic of
                                                                                    </option>
                                                                                    <option value="Madagascar">
                                                                                        Madagascar
                                                                                    </option>
                                                                                    <option value="Malawi">Malawi</option>
                                                                                    <option value="Malaysia">
                                                                                        Malaysia
                                                                                    </option>
                                                                                    <option value="Maldives">
                                                                                        Maldives
                                                                                    </option>
                                                                                    <option value="Mali">Mali</option>
                                                                                    <option value="Malta">Malta</option>
                                                                                    <option value="Marshall Islands">
                                                                                        Marshall Islands
                                                                                    </option>
                                                                                    <option value="Martinique">
                                                                                        Martinique
                                                                                    </option>
                                                                                    <option value="Mauritania">
                                                                                        Mauritania
                                                                                    </option>
                                                                                    <option value="Mauritius">
                                                                                        Mauritius
                                                                                    </option>
                                                                                    <option value="Mayotte">
                                                                                        Mayotte
                                                                                    </option>
                                                                                    <option value="Mexico">Mexico</option>
                                                                                    <option value="Micronesia, Federated States of">
                                                                                        Micronesia, Federated States of
                                                                                    </option>
                                                                                    <option value="Moldova, Republic of">
                                                                                        Moldova, Republic of
                                                                                    </option>
                                                                                    <option value="Monaco">Monaco</option>
                                                                                    <option value="Mongolia">
                                                                                        Mongolia
                                                                                    </option>
                                                                                    <option value="Montenegro">
                                                                                        Montenegro
                                                                                    </option>
                                                                                    <option value="Montserrat">
                                                                                        Montserrat
                                                                                    </option>
                                                                                    <option value="Morocco">
                                                                                        Morocco
                                                                                    </option>
                                                                                    <option value="Mozambique">
                                                                                        Mozambique
                                                                                    </option>
                                                                                    <option value="Myanmar">
                                                                                        Myanmar
                                                                                    </option>
                                                                                    <option value="Namibia">
                                                                                        Namibia
                                                                                    </option>
                                                                                    <option value="Nauru">Nauru</option>
                                                                                    <option value="Nepal">Nepal</option>
                                                                                    <option value="Netherlands">
                                                                                        Netherlands
                                                                                    </option>
                                                                                    <option value="Netherlands Antilles">
                                                                                        Netherlands Antilles
                                                                                    </option>
                                                                                    <option value="New Caledonia">
                                                                                        New Caledonia
                                                                                    </option>
                                                                                    <option value="New Zealand">
                                                                                        New Zealand
                                                                                    </option>
                                                                                    <option value="Nicaragua">
                                                                                        Nicaragua
                                                                                    </option>
                                                                                    <option value="Niger">Niger</option>
                                                                                    <option value="Nigeria">
                                                                                        Nigeria
                                                                                    </option>
                                                                                    <option value="Niue">Niue</option>
                                                                                    <option value="Norfolk Island">
                                                                                        Norfolk Island
                                                                                    </option>
                                                                                    <option value="Northern Mariana Islands">
                                                                                        Northern Mariana Islands
                                                                                    </option>
                                                                                    <option value="Norway">Norway</option>
                                                                                    <option value="Oman">Oman</option>
                                                                                    <option value="Pakistan">
                                                                                        Pakistan
                                                                                    </option>
                                                                                    <option value="Palau">Palau</option>
                                                                                    <option value="Palestinian Territory, Occupied">
                                                                                        Palestinian Territory, Occupied
                                                                                    </option>
                                                                                    <option value="Panama">Panama</option>
                                                                                    <option value="Papua New Guinea">
                                                                                        Papua New Guinea
                                                                                    </option>
                                                                                    <option value="Paraguay">
                                                                                        Paraguay
                                                                                    </option>
                                                                                    <option value="Peru">Peru</option>
                                                                                    <option value="Philippines">
                                                                                        Philippines
                                                                                    </option>
                                                                                    <option value="Pitcairn">
                                                                                        Pitcairn
                                                                                    </option>
                                                                                    <option value="Poland">Poland</option>
                                                                                    <option value="Portugal">
                                                                                        Portugal
                                                                                    </option>
                                                                                    <option value="Puerto Rico">
                                                                                        Puerto Rico
                                                                                    </option>
                                                                                    <option value="Qatar">Qatar</option>
                                                                                    <option value="Reunion">
                                                                                        Reunion
                                                                                    </option>
                                                                                    <option value="Romania">
                                                                                        Romania
                                                                                    </option>
                                                                                    <option value="Russian Federation">
                                                                                        Russian Federation
                                                                                    </option>
                                                                                    <option value="Rwanda">Rwanda</option>
                                                                                    <option value="Saint Helena">
                                                                                        Saint Helena
                                                                                    </option>
                                                                                    <option value="Saint Kitts and Nevis">
                                                                                        Saint Kitts and Nevis
                                                                                    </option>
                                                                                    <option value="Saint Lucia">
                                                                                        Saint Lucia
                                                                                    </option>
                                                                                    <option value="Saint Pierre and Miquelon">
                                                                                        Saint Pierre and Miquelon
                                                                                    </option>
                                                                                    <option value="Saint Vincent and The Grenadines">
                                                                                        Saint Vincent and The Grenadines
                                                                                    </option>
                                                                                    <option value="Samoa">Samoa</option>
                                                                                    <option value="San Marino">
                                                                                        San Marino
                                                                                    </option>
                                                                                    <option value="Sao Tome and Principe">
                                                                                        Sao Tome and Principe
                                                                                    </option>
                                                                                    <option value="Saudi Arabia">
                                                                                        Saudi Arabia
                                                                                    </option>
                                                                                    <option value="Senegal">
                                                                                        Senegal
                                                                                    </option>
                                                                                    <option value="Serbia">Serbia</option>
                                                                                    <option value="Seychelles">
                                                                                        Seychelles
                                                                                    </option>
                                                                                    <option value="Sierra Leone">
                                                                                        Sierra Leone
                                                                                    </option>
                                                                                    <option value="Singapore">
                                                                                        Singapore
                                                                                    </option>
                                                                                    <option value="Slovakia">
                                                                                        Slovakia
                                                                                    </option>
                                                                                    <option value="Slovenia">
                                                                                        Slovenia
                                                                                    </option>
                                                                                    <option value="Solomon Islands">
                                                                                        Solomon Islands
                                                                                    </option>
                                                                                    <option value="Somalia">
                                                                                        Somalia
                                                                                    </option>
                                                                                    <option value="South Africa">
                                                                                        South Africa
                                                                                    </option>
                                                                                    <option value="South Georgia and The South Sandwich Islands">
                                                                                        South Georgia and The South Sandwich
                                                                                        Islands
                                                                                    </option>
                                                                                    <option value="Spain">Spain</option>
                                                                                    <option value="Sri Lanka">
                                                                                        Sri Lanka
                                                                                    </option>
                                                                                    <option value="Sudan">Sudan</option>
                                                                                    <option value="Suriname">
                                                                                        Suriname
                                                                                    </option>
                                                                                    <option value="Svalbard and Jan Mayen">
                                                                                        Svalbard and Jan Mayen
                                                                                    </option>
                                                                                    <option value="Swaziland">
                                                                                        Swaziland
                                                                                    </option>
                                                                                    <option value="Sweden">Sweden</option>
                                                                                    <option value="Switzerland">
                                                                                        Switzerland
                                                                                    </option>
                                                                                    <option value="Syrian Arab Republic">
                                                                                        Syrian Arab Republic
                                                                                    </option>
                                                                                    <option value="Taiwan">Taiwan</option>
                                                                                    <option value="Tajikistan">
                                                                                        Tajikistan
                                                                                    </option>
                                                                                    <option value="Tanzania, United Republic of">
                                                                                        Tanzania, United Republic of
                                                                                    </option>
                                                                                    <option value="Thailand">
                                                                                        Thailand
                                                                                    </option>
                                                                                    <option value="Timor-leste">
                                                                                        Timor-leste
                                                                                    </option>
                                                                                    <option value="Togo">Togo</option>
                                                                                    <option value="Tokelau">
                                                                                        Tokelau
                                                                                    </option>
                                                                                    <option value="Tonga">Tonga</option>
                                                                                    <option value="Trinidad and Tobago">
                                                                                        Trinidad and Tobago
                                                                                    </option>
                                                                                    <option value="Tunisia">
                                                                                        Tunisia
                                                                                    </option>
                                                                                    <option value="Turkey">Turkey</option>
                                                                                    <option value="Turkmenistan">
                                                                                        Turkmenistan
                                                                                    </option>
                                                                                    <option value="Turks and Caicos Islands">
                                                                                        Turks and Caicos Islands
                                                                                    </option>
                                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                                    <option value="Uganda">Uganda</option>
                                                                                    <option value="Ukraine">
                                                                                        Ukraine
                                                                                    </option>
                                                                                    <option value="United Arab Emirates">
                                                                                        United Arab Emirates
                                                                                    </option>
                                                                                    <option value="United Kingdom">
                                                                                        United Kingdom
                                                                                    </option>
                                                                                    <option value="United States">
                                                                                        United States
                                                                                    </option>
                                                                                    <option value="United States Minor Outlying Islands">
                                                                                        United States Minor Outlying Islands
                                                                                    </option>
                                                                                    <option value="Uruguay">
                                                                                        Uruguay
                                                                                    </option>
                                                                                    <option value="Uzbekistan">
                                                                                        Uzbekistan
                                                                                    </option>
                                                                                    <option value="Vanuatu">
                                                                                        Vanuatu
                                                                                    </option>
                                                                                    <option value="Venezuela">
                                                                                        Venezuela
                                                                                    </option>
                                                                                    <option value="Viet Nam">
                                                                                        Viet Nam
                                                                                    </option>
                                                                                    <option value="Virgin Islands, British">
                                                                                        Virgin Islands, British
                                                                                    </option>
                                                                                    <option value="Virgin Islands, U.S.">
                                                                                        Virgin Islands, U.S.
                                                                                    </option>
                                                                                    <option value="Wallis and Futuna">
                                                                                        Wallis and Futuna
                                                                                    </option>
                                                                                    <option value="Western Sahara">
                                                                                        Western Sahara
                                                                                    </option>
                                                                                    <option value="Yemen">Yemen</option>
                                                                                    <option value="Zambia">Zambia</option>
                                                                                    <option value="Zimbabwe">
                                                                                        Zimbabwe
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="postalCode" class="form-label">Postal Code</label>
                                                                            <input type="number" name="postalCode" class="form-control" id="postalCode"
                                                                                   placeholder="Postal Code" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <button type="submit" class="btn btn-purple">
                                                                            Add Credit Card
                                                                        </button>
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
                            <div class="modal fade" id="creditCardModalEdit" tabindex="-1" aria-labelledby="creditCardModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="creditCardModalLabel"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-4 mb-5">
                                            @foreach($userCardInfo as $cardInfo)
                                                <form action="{{ route('updateCardInfo') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div>
                                                        <h5>Your Details</h5>
                                                        <div class="card u-box-shadow-2 border-0">
                                                            <div class="card-body">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <input type="text" hidden name="userId" value="{{ Auth::user()->id }}" class="form-control"/>
                                                                                <input type="text" hidden name="cardId" value="{{ $cardInfo->id }}" class="form-control"/>
                                                                                <label for="fname" class="form-label">First Name</label>
                                                                                <input type="text" name="firstName" value="{{ $cardInfo->firstName }}" class="form-control" id="fname" placeholder="First Name"
                                                                                       required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="lname" class="form-label">Last Name</label>
                                                                                <input type="text" name="lastName" value="{{ $cardInfo->lastName }}" class="form-control" id="lname" placeholder="Last Name"
                                                                                       required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-5">
                                                        <h5>Card Details</h5>
                                                        <div class="card u-box-shadow-2 border-0">
                                                            <div class="card-body">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="mb-3">
                                                                                <label for="cNumber" class="form-label">Credit Card Number</label>
                                                                                <input type="number" name="creditCardNumber" value="{{ $cardInfo->creditCardNumber }}" class="form-control" id="cNumber"
                                                                                       placeholder="1234 1234 1234 1234" required maxlength="16" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="expDate" class="form-label">Expiration Date</label>
                                                                                <input type="text" name="expirationDate" value="{{ $cardInfo->expirationDate }}" class="form-control" id="expDate" placeholder="MM / YY"
                                                                                       required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="cvc" class="form-label">CVC</label>
                                                                                <input type="number" name="cvc" value="{{ $cardInfo->cvc }}" class="form-control" id="cvc" placeholder="CVC"
                                                                                       required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-5">
                                                        <h5>Billing Information</h5>
                                                        <div class="card u-box-shadow-2 border-0">
                                                            <div class="card-body">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="mb-3">
                                                                                <label for="address" class="form-label">Address</label>
                                                                                <input type="text" name="address" value="{{ $cardInfo->address }}" class="form-control" id="address" placeholder="Address"
                                                                                       required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="city" class="form-label">City</label>
                                                                                <input type="text" name="city" value="{{ $cardInfo->city }}" class="form-control" id="city" placeholder="City" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="state" class="form-label">State</label>
                                                                                <input type="text" name="state" value="{{ $cardInfo->state }}" class="form-control" id="state" placeholder="State" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="country" class="form-label">Country</label>
                                                                                <div class="country-dropdown">
                                                                                    <select name="country" class="col-12">
                                                                                        <option selected value="{{ $cardInfo->country }}">
                                                                                            {{ $cardInfo->country }}
                                                                                        </option>
                                                                                        <option value="Afghanistan">
                                                                                            Afghanistan
                                                                                        </option>
                                                                                        <option value="Åland Islands">
                                                                                            Åland Islands
                                                                                        </option>
                                                                                        <option value="Albania">
                                                                                            Albania
                                                                                        </option>
                                                                                        <option value="Algeria">
                                                                                            Algeria
                                                                                        </option>
                                                                                        <option value="American Samoa">
                                                                                            American Samoa
                                                                                        </option>
                                                                                        <option value="Andorra">
                                                                                            Andorra
                                                                                        </option>
                                                                                        <option value="Angola">Angola</option>
                                                                                        <option value="Anguilla">
                                                                                            Anguilla
                                                                                        </option>
                                                                                        <option value="Antarctica">
                                                                                            Antarctica
                                                                                        </option>
                                                                                        <option value="Antigua and Barbuda">
                                                                                            Antigua and Barbuda
                                                                                        </option>
                                                                                        <option value="Argentina">
                                                                                            Argentina
                                                                                        </option>
                                                                                        <option value="Armenia">
                                                                                            Armenia
                                                                                        </option>
                                                                                        <option value="Aruba">Aruba</option>
                                                                                        <option value="Australia">
                                                                                            Australia
                                                                                        </option>
                                                                                        <option value="Austria">
                                                                                            Austria
                                                                                        </option>
                                                                                        <option value="Azerbaijan">
                                                                                            Azerbaijan
                                                                                        </option>
                                                                                        <option value="Bahamas">
                                                                                            Bahamas
                                                                                        </option>
                                                                                        <option value="Bahrain">
                                                                                            Bahrain
                                                                                        </option>
                                                                                        <option value="Bangladesh">
                                                                                            Bangladesh
                                                                                        </option>
                                                                                        <option value="Barbados">
                                                                                            Barbados
                                                                                        </option>
                                                                                        <option value="Belarus">
                                                                                            Belarus
                                                                                        </option>
                                                                                        <option value="Belgium">
                                                                                            Belgium
                                                                                        </option>
                                                                                        <option value="Belize">Belize</option>
                                                                                        <option value="Benin">Benin</option>
                                                                                        <option value="Bermuda">
                                                                                            Bermuda
                                                                                        </option>
                                                                                        <option value="Bhutan">Bhutan</option>
                                                                                        <option value="Bolivia">
                                                                                            Bolivia
                                                                                        </option>
                                                                                        <option value="Bosnia and Herzegovina">
                                                                                            Bosnia and Herzegovina
                                                                                        </option>
                                                                                        <option value="Botswana">
                                                                                            Botswana
                                                                                        </option>
                                                                                        <option value="Bouvet Island">
                                                                                            Bouvet Island
                                                                                        </option>
                                                                                        <option value="Brazil">Brazil</option>
                                                                                        <option value="British Indian Ocean Territory">
                                                                                            British Indian Ocean Territory
                                                                                        </option>
                                                                                        <option value="Brunei Darussalam">
                                                                                            Brunei Darussalam
                                                                                        </option>
                                                                                        <option value="Bulgaria">
                                                                                            Bulgaria
                                                                                        </option>
                                                                                        <option value="Burkina Faso">
                                                                                            Burkina Faso
                                                                                        </option>
                                                                                        <option value="Burundi">
                                                                                            Burundi
                                                                                        </option>
                                                                                        <option value="Cambodia">
                                                                                            Cambodia
                                                                                        </option>
                                                                                        <option value="Cameroon">
                                                                                            Cameroon
                                                                                        </option>
                                                                                        <option value="Canada">Canada</option>
                                                                                        <option value="Cape Verde">
                                                                                            Cape Verde
                                                                                        </option>
                                                                                        <option value="Cayman Islands">
                                                                                            Cayman Islands
                                                                                        </option>
                                                                                        <option value="Central African Republic">
                                                                                            Central African Republic
                                                                                        </option>
                                                                                        <option value="Chad">Chad</option>
                                                                                        <option value="Chile">Chile</option>
                                                                                        <option value="China">China</option>
                                                                                        <option value="Christmas Island">
                                                                                            Christmas Island
                                                                                        </option>
                                                                                        <option value="Cocos (Keeling) Islands">
                                                                                            Cocos (Keeling) Islands
                                                                                        </option>
                                                                                        <option value="Colombia">
                                                                                            Colombia
                                                                                        </option>
                                                                                        <option value="Comoros">
                                                                                            Comoros
                                                                                        </option>
                                                                                        <option value="Congo">Congo</option>
                                                                                        <option value="Congo, The Democratic Republic of The">
                                                                                            Congo, The Democratic Republic of
                                                                                            The
                                                                                        </option>
                                                                                        <option value="Cook Islands">
                                                                                            Cook Islands
                                                                                        </option>
                                                                                        <option value="Costa Rica">
                                                                                            Costa Rica
                                                                                        </option>
                                                                                        <option value="Cote D'ivoire">
                                                                                            Cote D'ivoire
                                                                                        </option>
                                                                                        <option value="Croatia">
                                                                                            Croatia
                                                                                        </option>
                                                                                        <option value="Cuba">Cuba</option>
                                                                                        <option value="Cyprus">Cyprus</option>
                                                                                        <option value="Czech Republic">
                                                                                            Czech Republic
                                                                                        </option>
                                                                                        <option value="Denmark">
                                                                                            Denmark
                                                                                        </option>
                                                                                        <option value="Djibouti">
                                                                                            Djibouti
                                                                                        </option>
                                                                                        <option value="Dominica">
                                                                                            Dominica
                                                                                        </option>
                                                                                        <option value="Dominican Republic">
                                                                                            Dominican Republic
                                                                                        </option>
                                                                                        <option value="Ecuador">
                                                                                            Ecuador
                                                                                        </option>
                                                                                        <option value="Egypt">Egypt</option>
                                                                                        <option value="El Salvador">
                                                                                            El Salvador
                                                                                        </option>
                                                                                        <option value="Equatorial Guinea">
                                                                                            Equatorial Guinea
                                                                                        </option>
                                                                                        <option value="Eritrea">
                                                                                            Eritrea
                                                                                        </option>
                                                                                        <option value="Estonia">
                                                                                            Estonia
                                                                                        </option>
                                                                                        <option value="Ethiopia">
                                                                                            Ethiopia
                                                                                        </option>
                                                                                        <option value="Falkland Islands (Malvinas)">
                                                                                            Falkland Islands (Malvinas)
                                                                                        </option>
                                                                                        <option value="Faroe Islands">
                                                                                            Faroe Islands
                                                                                        </option>
                                                                                        <option value="Fiji">Fiji</option>
                                                                                        <option value="Finland">
                                                                                            Finland
                                                                                        </option>
                                                                                        <option value="France">France</option>
                                                                                        <option value="French Guiana">
                                                                                            French Guiana
                                                                                        </option>
                                                                                        <option value="French Polynesia">
                                                                                            French Polynesia
                                                                                        </option>
                                                                                        <option value="French Southern Territories">
                                                                                            French Southern Territories
                                                                                        </option>
                                                                                        <option value="Gabon">Gabon</option>
                                                                                        <option value="Gambia">Gambia</option>
                                                                                        <option value="Georgia">
                                                                                            Georgia
                                                                                        </option>
                                                                                        <option value="Germany">
                                                                                            Germany
                                                                                        </option>
                                                                                        <option value="Ghana">Ghana</option>
                                                                                        <option value="Gibraltar">
                                                                                            Gibraltar
                                                                                        </option>
                                                                                        <option value="Greece">Greece</option>
                                                                                        <option value="Greenland">
                                                                                            Greenland
                                                                                        </option>
                                                                                        <option value="Grenada">
                                                                                            Grenada
                                                                                        </option>
                                                                                        <option value="Guadeloupe">
                                                                                            Guadeloupe
                                                                                        </option>
                                                                                        <option value="Guam">Guam</option>
                                                                                        <option value="Guatemala">
                                                                                            Guatemala
                                                                                        </option>
                                                                                        <option value="Guernsey">
                                                                                            Guernsey
                                                                                        </option>
                                                                                        <option value="Guinea">Guinea</option>
                                                                                        <option value="Guinea-bissau">
                                                                                            Guinea-bissau
                                                                                        </option>
                                                                                        <option value="Guyana">Guyana</option>
                                                                                        <option value="Haiti">Haiti</option>
                                                                                        <option value="Heard Island and Mcdonald Islands">
                                                                                            Heard Island and Mcdonald Islands
                                                                                        </option>
                                                                                        <option value="Holy See (Vatican City State)">
                                                                                            Holy See (Vatican City State)
                                                                                        </option>
                                                                                        <option value="Honduras">
                                                                                            Honduras
                                                                                        </option>
                                                                                        <option value="Hong Kong">
                                                                                            Hong Kong
                                                                                        </option>
                                                                                        <option value="Hungary">
                                                                                            Hungary
                                                                                        </option>
                                                                                        <option value="Iceland">
                                                                                            Iceland
                                                                                        </option>
                                                                                        <option value="India">India</option>
                                                                                        <option value="Indonesia">
                                                                                            Indonesia
                                                                                        </option>
                                                                                        <option value="Iran, Islamic Republic of">
                                                                                            Iran, Islamic Republic of
                                                                                        </option>
                                                                                        <option value="Iraq">Iraq</option>
                                                                                        <option value="Ireland">
                                                                                            Ireland
                                                                                        </option>
                                                                                        <option value="Isle of Man">
                                                                                            Isle of Man
                                                                                        </option>
                                                                                        <option value="Israel">Israel</option>
                                                                                        <option value="Italy">Italy</option>
                                                                                        <option value="Jamaica">
                                                                                            Jamaica
                                                                                        </option>
                                                                                        <option value="Japan">Japan</option>
                                                                                        <option value="Jersey">Jersey</option>
                                                                                        <option value="Jordan">Jordan</option>
                                                                                        <option value="Kazakhstan">
                                                                                            Kazakhstan
                                                                                        </option>
                                                                                        <option value="Kenya">Kenya</option>
                                                                                        <option value="Kiribati">
                                                                                            Kiribati
                                                                                        </option>
                                                                                        <option value="Korea, Democratic People's Republic of">
                                                                                            Korea, Democratic People's Republic
                                                                                            of
                                                                                        </option>
                                                                                        <option value="Korea, Republic of">
                                                                                            Korea, Republic of
                                                                                        </option>
                                                                                        <option value="Kuwait">Kuwait</option>
                                                                                        <option value="Kyrgyzstan">
                                                                                            Kyrgyzstan
                                                                                        </option>
                                                                                        <option value="Lao People's Democratic Republic">
                                                                                            Lao People's Democratic Republic
                                                                                        </option>
                                                                                        <option value="Latvia">Latvia</option>
                                                                                        <option value="Lebanon">
                                                                                            Lebanon
                                                                                        </option>
                                                                                        <option value="Lesotho">
                                                                                            Lesotho
                                                                                        </option>
                                                                                        <option value="Liberia">
                                                                                            Liberia
                                                                                        </option>
                                                                                        <option value="Libyan Arab Jamahiriya">
                                                                                            Libyan Arab Jamahiriya
                                                                                        </option>
                                                                                        <option value="Liechtenstein">
                                                                                            Liechtenstein
                                                                                        </option>
                                                                                        <option value="Lithuania">
                                                                                            Lithuania
                                                                                        </option>
                                                                                        <option value="Luxembourg">
                                                                                            Luxembourg
                                                                                        </option>
                                                                                        <option value="Macao">Macao</option>
                                                                                        <option value="Macedonia, The Former Yugoslav Republic of">
                                                                                            Macedonia, The Former Yugoslav
                                                                                            Republic of
                                                                                        </option>
                                                                                        <option value="Madagascar">
                                                                                            Madagascar
                                                                                        </option>
                                                                                        <option value="Malawi">Malawi</option>
                                                                                        <option value="Malaysia">
                                                                                            Malaysia
                                                                                        </option>
                                                                                        <option value="Maldives">
                                                                                            Maldives
                                                                                        </option>
                                                                                        <option value="Mali">Mali</option>
                                                                                        <option value="Malta">Malta</option>
                                                                                        <option value="Marshall Islands">
                                                                                            Marshall Islands
                                                                                        </option>
                                                                                        <option value="Martinique">
                                                                                            Martinique
                                                                                        </option>
                                                                                        <option value="Mauritania">
                                                                                            Mauritania
                                                                                        </option>
                                                                                        <option value="Mauritius">
                                                                                            Mauritius
                                                                                        </option>
                                                                                        <option value="Mayotte">
                                                                                            Mayotte
                                                                                        </option>
                                                                                        <option value="Mexico">Mexico</option>
                                                                                        <option value="Micronesia, Federated States of">
                                                                                            Micronesia, Federated States of
                                                                                        </option>
                                                                                        <option value="Moldova, Republic of">
                                                                                            Moldova, Republic of
                                                                                        </option>
                                                                                        <option value="Monaco">Monaco</option>
                                                                                        <option value="Mongolia">
                                                                                            Mongolia
                                                                                        </option>
                                                                                        <option value="Montenegro">
                                                                                            Montenegro
                                                                                        </option>
                                                                                        <option value="Montserrat">
                                                                                            Montserrat
                                                                                        </option>
                                                                                        <option value="Morocco">
                                                                                            Morocco
                                                                                        </option>
                                                                                        <option value="Mozambique">
                                                                                            Mozambique
                                                                                        </option>
                                                                                        <option value="Myanmar">
                                                                                            Myanmar
                                                                                        </option>
                                                                                        <option value="Namibia">
                                                                                            Namibia
                                                                                        </option>
                                                                                        <option value="Nauru">Nauru</option>
                                                                                        <option value="Nepal">Nepal</option>
                                                                                        <option value="Netherlands">
                                                                                            Netherlands
                                                                                        </option>
                                                                                        <option value="Netherlands Antilles">
                                                                                            Netherlands Antilles
                                                                                        </option>
                                                                                        <option value="New Caledonia">
                                                                                            New Caledonia
                                                                                        </option>
                                                                                        <option value="New Zealand">
                                                                                            New Zealand
                                                                                        </option>
                                                                                        <option value="Nicaragua">
                                                                                            Nicaragua
                                                                                        </option>
                                                                                        <option value="Niger">Niger</option>
                                                                                        <option value="Nigeria">
                                                                                            Nigeria
                                                                                        </option>
                                                                                        <option value="Niue">Niue</option>
                                                                                        <option value="Norfolk Island">
                                                                                            Norfolk Island
                                                                                        </option>
                                                                                        <option value="Northern Mariana Islands">
                                                                                            Northern Mariana Islands
                                                                                        </option>
                                                                                        <option value="Norway">Norway</option>
                                                                                        <option value="Oman">Oman</option>
                                                                                        <option value="Pakistan">
                                                                                            Pakistan
                                                                                        </option>
                                                                                        <option value="Palau">Palau</option>
                                                                                        <option value="Palestinian Territory, Occupied">
                                                                                            Palestinian Territory, Occupied
                                                                                        </option>
                                                                                        <option value="Panama">Panama</option>
                                                                                        <option value="Papua New Guinea">
                                                                                            Papua New Guinea
                                                                                        </option>
                                                                                        <option value="Paraguay">
                                                                                            Paraguay
                                                                                        </option>
                                                                                        <option value="Peru">Peru</option>
                                                                                        <option value="Philippines">
                                                                                            Philippines
                                                                                        </option>
                                                                                        <option value="Pitcairn">
                                                                                            Pitcairn
                                                                                        </option>
                                                                                        <option value="Poland">Poland</option>
                                                                                        <option value="Portugal">
                                                                                            Portugal
                                                                                        </option>
                                                                                        <option value="Puerto Rico">
                                                                                            Puerto Rico
                                                                                        </option>
                                                                                        <option value="Qatar">Qatar</option>
                                                                                        <option value="Reunion">
                                                                                            Reunion
                                                                                        </option>
                                                                                        <option value="Romania">
                                                                                            Romania
                                                                                        </option>
                                                                                        <option value="Russian Federation">
                                                                                            Russian Federation
                                                                                        </option>
                                                                                        <option value="Rwanda">Rwanda</option>
                                                                                        <option value="Saint Helena">
                                                                                            Saint Helena
                                                                                        </option>
                                                                                        <option value="Saint Kitts and Nevis">
                                                                                            Saint Kitts and Nevis
                                                                                        </option>
                                                                                        <option value="Saint Lucia">
                                                                                            Saint Lucia
                                                                                        </option>
                                                                                        <option value="Saint Pierre and Miquelon">
                                                                                            Saint Pierre and Miquelon
                                                                                        </option>
                                                                                        <option value="Saint Vincent and The Grenadines">
                                                                                            Saint Vincent and The Grenadines
                                                                                        </option>
                                                                                        <option value="Samoa">Samoa</option>
                                                                                        <option value="San Marino">
                                                                                            San Marino
                                                                                        </option>
                                                                                        <option value="Sao Tome and Principe">
                                                                                            Sao Tome and Principe
                                                                                        </option>
                                                                                        <option value="Saudi Arabia">
                                                                                            Saudi Arabia
                                                                                        </option>
                                                                                        <option value="Senegal">
                                                                                            Senegal
                                                                                        </option>
                                                                                        <option value="Serbia">Serbia</option>
                                                                                        <option value="Seychelles">
                                                                                            Seychelles
                                                                                        </option>
                                                                                        <option value="Sierra Leone">
                                                                                            Sierra Leone
                                                                                        </option>
                                                                                        <option value="Singapore">
                                                                                            Singapore
                                                                                        </option>
                                                                                        <option value="Slovakia">
                                                                                            Slovakia
                                                                                        </option>
                                                                                        <option value="Slovenia">
                                                                                            Slovenia
                                                                                        </option>
                                                                                        <option value="Solomon Islands">
                                                                                            Solomon Islands
                                                                                        </option>
                                                                                        <option value="Somalia">
                                                                                            Somalia
                                                                                        </option>
                                                                                        <option value="South Africa">
                                                                                            South Africa
                                                                                        </option>
                                                                                        <option value="South Georgia and The South Sandwich Islands">
                                                                                            South Georgia and The South Sandwich
                                                                                            Islands
                                                                                        </option>
                                                                                        <option value="Spain">Spain</option>
                                                                                        <option value="Sri Lanka">
                                                                                            Sri Lanka
                                                                                        </option>
                                                                                        <option value="Sudan">Sudan</option>
                                                                                        <option value="Suriname">
                                                                                            Suriname
                                                                                        </option>
                                                                                        <option value="Svalbard and Jan Mayen">
                                                                                            Svalbard and Jan Mayen
                                                                                        </option>
                                                                                        <option value="Swaziland">
                                                                                            Swaziland
                                                                                        </option>
                                                                                        <option value="Sweden">Sweden</option>
                                                                                        <option value="Switzerland">
                                                                                            Switzerland
                                                                                        </option>
                                                                                        <option value="Syrian Arab Republic">
                                                                                            Syrian Arab Republic
                                                                                        </option>
                                                                                        <option value="Taiwan">Taiwan</option>
                                                                                        <option value="Tajikistan">
                                                                                            Tajikistan
                                                                                        </option>
                                                                                        <option value="Tanzania, United Republic of">
                                                                                            Tanzania, United Republic of
                                                                                        </option>
                                                                                        <option value="Thailand">
                                                                                            Thailand
                                                                                        </option>
                                                                                        <option value="Timor-leste">
                                                                                            Timor-leste
                                                                                        </option>
                                                                                        <option value="Togo">Togo</option>
                                                                                        <option value="Tokelau">
                                                                                            Tokelau
                                                                                        </option>
                                                                                        <option value="Tonga">Tonga</option>
                                                                                        <option value="Trinidad and Tobago">
                                                                                            Trinidad and Tobago
                                                                                        </option>
                                                                                        <option value="Tunisia">
                                                                                            Tunisia
                                                                                        </option>
                                                                                        <option value="Turkey">Turkey</option>
                                                                                        <option value="Turkmenistan">
                                                                                            Turkmenistan
                                                                                        </option>
                                                                                        <option value="Turks and Caicos Islands">
                                                                                            Turks and Caicos Islands
                                                                                        </option>
                                                                                        <option value="Tuvalu">Tuvalu</option>
                                                                                        <option value="Uganda">Uganda</option>
                                                                                        <option value="Ukraine">
                                                                                            Ukraine
                                                                                        </option>
                                                                                        <option value="United Arab Emirates">
                                                                                            United Arab Emirates
                                                                                        </option>
                                                                                        <option value="United Kingdom">
                                                                                            United Kingdom
                                                                                        </option>
                                                                                        <option value="United States">
                                                                                            United States
                                                                                        </option>
                                                                                        <option value="United States Minor Outlying Islands">
                                                                                            United States Minor Outlying Islands
                                                                                        </option>
                                                                                        <option value="Uruguay">
                                                                                            Uruguay
                                                                                        </option>
                                                                                        <option value="Uzbekistan">
                                                                                            Uzbekistan
                                                                                        </option>
                                                                                        <option value="Vanuatu">
                                                                                            Vanuatu
                                                                                        </option>
                                                                                        <option value="Venezuela">
                                                                                            Venezuela
                                                                                        </option>
                                                                                        <option value="Viet Nam">
                                                                                            Viet Nam
                                                                                        </option>
                                                                                        <option value="Virgin Islands, British">
                                                                                            Virgin Islands, British
                                                                                        </option>
                                                                                        <option value="Virgin Islands, U.S.">
                                                                                            Virgin Islands, U.S.
                                                                                        </option>
                                                                                        <option value="Wallis and Futuna">
                                                                                            Wallis and Futuna
                                                                                        </option>
                                                                                        <option value="Western Sahara">
                                                                                            Western Sahara
                                                                                        </option>
                                                                                        <option value="Yemen">Yemen</option>
                                                                                        <option value="Zambia">Zambia</option>
                                                                                        <option value="Zimbabwe">
                                                                                            Zimbabwe
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="postalCode" class="form-label">Postal Code</label>
                                                                                <input type="number" name="postalCode" value="{{ $cardInfo->postalCode }}" class="form-control" id="postalCode"
                                                                                       placeholder="Postal Code" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mt-4">
                                                                            <button type="submit" class="btn btn-purple">
                                                                                Update Credit Card
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- WHEN CREDIT CARD INFO FOUND -->
                            <div class="credit-card-info u-box-shadow-2 mt-4">
                                <form action="{{ route('stripe') }}" enctype="multipart/form-data" method="post">
                                    @csrf

                                        <input hidden  type="number" name="credit" value="{{$purchasePlan->credit}}"/>
                                        <input hidden  type="number" name="phoneNumber" value="{{$purchasePlan->phoneNumber}}"/>
                                        <input hidden  type="text" name="dataFilter" value="{{$purchasePlan->dataFilter}}"/>
                                        <input hidden  type="text" name="csvExport" value="{{$purchasePlan->dataFilter}}"/>
                                        <input hidden  type="number" name="price" value="{{$purchasePlan->price}}"/>
                                        <input hidden  type="number" name="userId" value="{{ Auth::user()->id }}"/>
                                        <input hidden  type="text" name="plan" value="{{$purchasePlan->plan}}"/>
                                        <input hidden  type="text" name="paidBy" value="stripe"/>

                                    @foreach($userCardInfo as $card)
                                        <button type="submit" class="credit-card-info u-box-shadow-2 mt-4 bg-white text-start">
                                            <div class="card-body p-4">
                                                <h4 class="card-title py-3 mb-3">Card Information</h4>
                                                <p class="card-text">Card Number: </p>
                                                <p class="card-text">**** **** **** {{ substr($card->creditCardNumber, 12, 15) }}</p>
                                                <p class="card-text">Expiration Date:</p>
                                                <p class="card-text">{{ $card->expirationDate }}</p>
                                            </div>
                                        </button>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                        <!-- END Credit Card Information -->
                    </div>

                    <div class="col-md-4 p-0">
                        <!-- START OTHER PAYMENT METHODS -->
                        <div class="card p-4 border-0 rounded-3 ">
                            <div class="card-title m-0 d-flex justify-content-between align-items-center">
                                <h3 class="py-4 text-capitalize fs-2 fw-bold">
                                    Other Payment Methods
                                </h3>
                            </div>
                            <div class="card-body col-12 p-0">
                                <div class="d-flex justify-content-between px-5">
                                    <form action="{{ route('paypal') }}" class="col-5 d-none" enctype="multipart/form-data" method="post">
                                        @csrf

                                        <input hidden  type="number" name="credit" value="{{$purchasePlan->credit}}"/>
                                        <input hidden  type="number" name="phoneNumber" value="{{$purchasePlan->phoneNumber}}"/>
                                        <input hidden  type="text" name="dataFilter" value="{{$purchasePlan->dataFilter}}"/>
                                        <input hidden  type="text" name="csvExport" value="{{$purchasePlan->dataFilter}}"/>
                                        <input hidden  type="number" name="price" value="{{$purchasePlan->price}}"/>
                                        <input hidden  type="number" name="userId" value="{{ Auth::user()->id }}"/>
                                        <input hidden  type="text" name="plan" value="{{$purchasePlan->plan}}"/>
                                        <input hidden  type="text" name="paidBy" value="paypal"/>

                                        <button type="submit" class="bg-transparent">
                                            <img class="img-fluid" src="{{ asset('/') }}adminAsset/assets/images/paypal.png" alt="paypal logo">
                                        </button>
                                    </form>
                                    <form action="{{ route('payments.crypto.pay') }}" class="col-5" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <input hidden  type="number" name="credit" value="{{$purchasePlan->credit}}"/>
                                        <input hidden  type="number" name="phoneNumber" value="{{$purchasePlan->phoneNumber}}"/>
                                        <input hidden  type="text" name="dataFilter" value="{{$purchasePlan->dataFilter}}"/>
                                        <input hidden  type="text" name="csvExport" value="{{$purchasePlan->dataFilter}}"/>
                                        <input hidden  type="number" name="price" value="{{$purchasePlan->price}}"/>
                                        <input hidden  type="number" name="amountUSD" value="{{$purchasePlan->price}}"/>
                                        <input hidden  type="number" name="userId" value="{{ Auth::user()->id }}"/>
                                        <input hidden  type="number" name="userID" value="{{ Auth::user()->id }}"/>
                                        <input hidden  type="text" name="plan" value="{{$purchasePlan->plan}}"/>
                                        <input hidden  type="text" name="paidBy" value="bitcoincash"/>
                                        <input hidden type="text" name="orderID" value="1"/>
                                        <input type="hidden" name="redirect" value="{{ url()->full() }}">

                                        <button type="submit" class="p-1 bg-transparent">
                                            <img class="img-fluid p-4" src="{{ asset('/') }}adminAsset/assets/images/bitcoin.png" alt="bitcoin logo">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END OTHER PAYMENT METHODS -->
                    </div>
                </div>
            </div>

            <!-- START Billing Information -->
            <div class="card m-4 border-0 rounded-3 mt-4">
                <div class="card-title m-0 d-flex justify-content-between align-items-center">
                    <h3 class="py-4 text-capitalize fs-2 fw-bold">
                        Billing Information
                    </h3>

                    <button type="button" class="btn btn-purple">
                        <i class="bi bi-pen pe-1"></i>Save Billing Information
                    </button>
                </div>
                <div class="card-body col-6 p-0">
                    <form action="">
                        <p class="mt-4 text-secondary fs-5 fw-bold">
                            Send Invoices To:
                        </p>
                        <input type="text" class="form-control u-box-shadow-2" />
                    </form>
                </div>
            </div>
            <!-- END Billing Information -->

            <!-- START INVOICE HISTORY -->
            <div class="card m-4 border-0 rounded-3 mt-5">
                <div class="card-title m-0 d-flex justify-content-between align-items-center">
                    <h3 class="py-4 text-capitalize fs-2 fw-bold">
                        Invoice History
                    </h3>
                </div>

                <!-- WHEN NO INVOICE HISTORY FOUND -->
                <div class="card-body col-6 p-0 d-none">
                    <p class="mt-4 fs-5 text-dark">
                        You do not have any invoice history.
                    </p>
                </div>

                <!-- WHEN INVOICE HISTORY IS FOUND -->
                <div class="card-body invoice-history-table mt-4 mb-4 border rounded p-0" style="max-height: 27vh;">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Paid By</th>
                            <th>Amount</th>
                            <th>Download PDF</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td scope="row">
                                <div>
                                    Invoice 9809073
                                </div>
                                <div class="fs-5 text-secondary">
                                    Paid on
                                    <span>3:01 pm</span>
                                </div>
                                </p>
                            </td>
                            <td>
                                Credit Card
                                <br>
                                <div class="fs-5 text-secondary">
                                    <span>**** **** 1234</span>
                                </div>
                            </td>
                            <td>$300.00</td>
                            <td class="ps-5">
                                <a href="#">
                                    <i class="ms-4 bi bi-download"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">
                                <div>
                                    Invoice 3802071
                                </div>
                                <div class="fs-5 text-secondary">
                                    Paid on
                                    <span>Feb 19</span>
                                </div>
                                </p>
                            </td>
                            <td>
                                PayPal
                                <br>
                                <div class="fs-5 text-secondary">
                                    <span></span>
                                </div>
                            </td>
                            <td>$150.00</td>
                            <td class="ps-5">
                                <a href="#">
                                    <i class="ms-4 bi bi-download"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td class="d-flex align-items-center">
                                <span class="px-4">1-2 of 2</span>

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- END INVOICE HISTORY -->
        </section>
        <!-- END BILLING -->
    </section>
    <!-- END MAIN -->
@endsection

