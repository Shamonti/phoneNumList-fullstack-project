@extends('userDashboard.settings.master')

@section('main')
    <section class="section-main">
        <div class="card u-box-shadow-2 m-4 border rounded-3">
            <div class="card-title d-flex align-items-center justify-content-between">
                <h1 class="p-4 text-capitalize">Account Info</h1>
                <button type="button" class="btn btn-purple me-3" onclick="saveFunction()">Save</button>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-4">
                        <input hidden type="text" class="form-control" id="id" name="id" value="{{ Auth::user()->id }}"/>
                        <form action="{{ route('updateUserFirstName', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ Auth::user()->firstName }}" onkeypress="handleFirstName" />
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('updateUserLastName', ['id' => Auth::user()->id]) }}"  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ Auth::user()->lastName }}" onkeypress="handleLastName"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('updateUserTitle') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" @if(Auth::user()->title ) value="{{ Auth::user()->title }}"  @endif onkeypress="handleAddress"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('updateUserPhone', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="number" class="form-label"
                                >Phone Number</label
                                >
                                <input type="number" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" onkeypress="handlePhone"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('updateUserAddress') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" @if(Auth::user()->address ) value="{{ Auth::user()->address }}"  @endif onkeypress="handleAddress"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('updateUserCountry', ['id' => Auth::user()->id]) }}" id="personalInfo" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="country" class="form-label">Country</label>
                            <div class="dropdown" id="country">
                                <input
                                        class="searchBar bg-white text-dark fw-normal col-12"
                                        id="countryDropdown"
                                        type="text"
                                        placeholder="{{ Auth::user()->country }}"
                                        data-toggle="dropdown"
                                        data-bs-toggle="dropdown"
                                />

                                <span class="caret"></span>

                                <ul
                                        class="dropdown-menu bg-white text-dark fw-bold p-3"
                                        aria-labelledby="countryDropdown"
                                >
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Afghanistan']) }}" >Afghanistan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Åland Islands']) }}" >Åland Islands</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Albania']) }}" >Albania</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Algeria']) }}" >Algeria</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'American Samoa']) }}" >American Samoa</a></li>
                                    <li class="dropdown-item"><a href=" {{ route('updateUserCountry', ['id' => 'Andorra']) }}" >Andorra</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Angola']) }}" >Angola</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Anguilla']) }}" Anguilla>Anguilla</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Antarctica']) }}" Antarctica>Antarctica</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Antigua and Barbuda']) }}" Antigua and Barbuda>
                                            Antigua and Barbuda
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Argentina']) }}" Argentina>Argentina</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Armenia']) }}" Armenia>Armenia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Aruba']) }}" Aruba>Aruba</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Australia']) }}" Australia>Australia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Austria']) }}" Austria>Austria</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Azerbaijan']) }}" Azerbaijan>Azerbaijan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Bahamas']) }}" Bahamas>Bahamas</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Bahrain']) }}" Bahrain>Bahrain</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Bangladesh']) }}" Bangladesh>Bangladesh</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Barbados']) }}" Barbados>Barbados</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Belarus']) }}" Belarus>Belarus</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Belgium']) }}" Belgium>Belgium</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Belize']) }}" Belize>Belize</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Benin']) }}" Benin>Benin</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Bermuda']) }}" Bermuda>Bermuda</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Bhutan']) }}" Bhutan>Bhutan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Bolivia']) }}" Bolivia>Bolivia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Bosnia and Herzegovina']) }}" Bosnia and Herzegovina>
                                            Bosnia and Herzegovina
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Botswana']) }}" Botswana>Botswana</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Bouvet Island']) }}" Bouvet Island>Bouvet Island</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Brazil']) }}" Brazil>Brazil</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'British Indian Ocean Territory']) }}" British Indian Ocean Territory>
                                            British Indian Ocean Territory
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Brunei Darussalam']) }}" Brunei Darussalam>
                                            Brunei Darussalam
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Bulgaria']) }}" Bulgaria>Bulgaria</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Burkina Faso']) }}" Burkina Faso>Burkina Faso</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Burundi']) }}" Burundi>Burundi</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Cambodia']) }}" Cambodia>Cambodia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Cameroon']) }}" Cameroon>Cameroon</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Canada']) }}" Canada>Canada</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Cape Verde']) }}" Cape Verde>Cape Verde</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Cayman Islands']) }}" Cayman Islands>Cayman Islands</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Central African Republic']) }}" Central African Republic>
                                            Central African Republic
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Chad']) }}" Chad>Chad</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Chile']) }}" Chile>Chile</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'China']) }}" China>China</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Christmas Island']) }}" Christmas Island>Christmas Island</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Cocos (Keeling) Islands']) }}" Cocos (Keeling) Islands>
                                            Cocos (Keeling) Islands
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Colombia']) }}" Colombia>Colombia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Comoros']) }}" Comoros>Comoros</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Congo']) }}" Congo>Congo</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Congo, The Democratic Republic of The']) }}" Congo, The Democratic Republic of The>
                                            Congo, The Democratic Republic of The
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Cook Islands']) }}" Cook Islands>Cook Islands</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Costa Rica']) }}" Costa Rica>Costa Rica</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Cote D ivoire']) }}" Cote D ivoire>Cote D'ivoire</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Croatia']) }}" Croatia>Croatia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Cuba']) }}" Cuba>Cuba</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Cyprus']) }}" Cyprus>Cyprus</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Czech Republic']) }}" Czech Republic>Czech Republic</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Denmark']) }}" Denmark>Denmark</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Djibouti']) }}" Djibouti>Djibouti</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Dominica']) }}" Dominica>Dominica</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Dominican Republic']) }}" Dominican Republic>
                                            Dominican Republic
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Ecuador']) }}" Ecuador>Ecuador</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Egypt']) }}" Egypt>Egypt</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'El Salvador']) }}" El Salvador>El Salvador</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Equatorial Guinea']) }}" Equatorial Guinea>
                                            Equatorial Guinea
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Eritrea']) }}" Eritrea>Eritrea</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Estonia']) }}" Estonia>Estonia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Ethiopia']) }}" Ethiopia>Ethiopia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Falkland Islands (Malvinas)']) }}" Falkland Islands (Malvinas)>
                                            Falkland Islands (Malvinas)
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Faroe Islands']) }}" Faroe Islands>Faroe Islands</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Fiji']) }}" Fiji>Fiji</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Finland']) }}" Finland>Finland</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'France']) }}" France>France</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'French Guiana']) }}" French Guiana>French Guiana</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'French Polynesia']) }}" French Polynesia>French Polynesia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'French Southern Territories']) }}" French Southern Territories>
                                            French Southern Territories
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Gabon']) }}" Gabon>Gabon</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Gambia']) }}" Gambia>Gambia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Georgia']) }}" Georgia>Georgia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Germany']) }}" Germany>Germany</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Ghana']) }}" Ghana>Ghana</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Gibraltar']) }}" Gibraltar>Gibraltar</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Greece']) }}" Greece>Greece</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Greenland']) }}" Greenland>Greenland</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Grenada']) }}" Grenada>Grenada</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Guadeloupe']) }}" Guadeloupe>Guadeloupe</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Guam']) }}" Guam>Guam</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Guatemala']) }}" Guatemala>Guatemala</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Guernsey']) }}" Guernsey>Guernsey</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Guinea']) }}" Guinea>Guinea</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Guinea-bissau']) }}" Guinea-bissau>Guinea-bissau</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Guyana']) }}" Guyana>Guyana</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Haiti']) }}" Haiti>Haiti</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Heard Island and Mcdonald Islands']) }}" Heard Island and Mcdonald Islands>
                                            Heard Island and Mcdonald Islands
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Holy See (Vatican City State)']) }}" Holy See (Vatican City State)>
                                            Holy See (Vatican City State)
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Honduras']) }}" Honduras>Honduras</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Hong Kong']) }}" Hong Kong>Hong Kong</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Hungary']) }}" Hungary>Hungary</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Iceland']) }}" Iceland>Iceland</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'India']) }}" India>India</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Indonesia']) }}" Indonesia>Indonesia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Iran, Islamic Republic of']) }}" Iran, Islamic Republic of>
                                            Iran, Islamic Republic of
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Iraq']) }}" Iraq>Iraq</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Ireland']) }}" Ireland>Ireland</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Isle of Man']) }}" Isle of Man>Isle of Man</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Israel']) }}" Israel>Israel</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Italy']) }}" Italy>Italy</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Jamaica']) }}" Jamaica>Jamaica</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Japan']) }}" Japan>Japan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Jersey']) }}" Jersey>Jersey</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Jordan']) }}" Jordan>Jordan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Kazakhstan']) }}" Kazakhstan>Kazakhstan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Kenya']) }}" Kenya>Kenya</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Kiribati']) }}" Kiribati>Kiribati</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Korea, Democratic Peoples Republic of']) }}" Korea, Democratic Peoples Republic of>
                                            Korea, Democratic People's Republic of
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Korea, Republic of']) }}" Korea, Republic of>
                                            Korea, Republic of
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Kuwait']) }}" Kuwait>Kuwait</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Kyrgyzstan']) }}" Kyrgyzstan>Kyrgyzstan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Lao Peoples Democratic Republic']) }}" Lao Peoples Democratic Republic>
                                            Lao People's Democratic Republic
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Latvia']) }}" Latvia>Latvia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Lebanon']) }}" Lebanon>Lebanon</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Lesotho']) }}" Lesotho>Lesotho</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Liberia']) }}" Liberia>Liberia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Libyan Arab Jamahiriya']) }}" Libyan Arab Jamahiriya>
                                            Libyan Arab Jamahiriya
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Liechtenstein']) }}" Liechtenstein>Liechtenstein</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Lithuania']) }}" Lithuania>Lithuania</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Luxembourg']) }}" Luxembourg>Luxembourg</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Macao']) }}" Macao>Macao</a></li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('updateUserCountry', ['id' => 'Macedonia, The Former Yugoslav Republic of']) }}">
                                            Macedonia, The Former Yugoslav Republic of
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Madagascar']) }}" Madagascar>Madagascar</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Malawi']) }}" Malawi>Malawi</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Malaysia']) }}" Malaysia>Malaysia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Maldives']) }}" Maldives>Maldives</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Mali']) }}" Mali>Mali</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Malta']) }}" Malta>Malta</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Marshall Islands']) }}" Marshall Islands>Marshall Islands</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Martinique']) }}" Martinique>Martinique</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Mauritania']) }}" Mauritania>Mauritania</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Mauritius']) }}" Mauritius>Mauritius</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Mayotte']) }}" Mayotte>Mayotte</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Mexico']) }}" Mexico>Mexico</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Micronesia, Federated States of']) }}" Micronesia, Federated States of>
                                            Micronesia, Federated States of
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Moldova, Republic of']) }}" Moldova, Republic of>
                                            Moldova, Republic of
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Monaco']) }}" Monaco>Monaco</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Mongolia']) }}" Mongolia>Mongolia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Montenegro']) }}" Montenegro>Montenegro</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Montserrat']) }}" Montserrat>Montserrat</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Morocco']) }}" Morocco>Morocco</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Mozambique']) }}" Mozambique>Mozambique</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Myanmar']) }}" Myanmar>Myanmar</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Namibia']) }}" Namibia>Namibia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Nauru']) }}" Nauru>Nauru</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Nepal']) }}" Nepal>Nepal</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Netherlands']) }}" Netherlands>Netherlands</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Netherlands Antilles']) }}" Netherlands Antilles>
                                            Netherlands Antilles
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'New Caledonia']) }}" New Caledonia>New Caledonia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'New Zealand']) }}" New Zealand>New Zealand</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Nicaragua']) }}" Nicaragua>Nicaragua</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Niger']) }}" Niger>Niger</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Nigeria']) }}" Nigeria>Nigeria</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Niue']) }}" Niue>Niue</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Norfolk Island']) }}" Norfolk Island>Norfolk Island</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Northern Mariana Islands']) }}" Northern Mariana Islands>
                                            Northern Mariana Islands
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Norway']) }}" Norway>Norway</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Oman']) }}" Oman>Oman</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Pakistan']) }}" Pakistan>Pakistan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Palau']) }}" Palau>Palau</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Palestinian Territory, Occupied']) }}" Palestinian Territory, Occupied>
                                            Palestinian Territory, Occupied
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Panama']) }}" Panama>Panama</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Papua New Guinea']) }}" Papua New Guinea>Papua New Guinea</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Paraguay']) }}" Paraguay>Paraguay</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Peru']) }}" Peru>Peru</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Philippines']) }}" Philippines>Philippines</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Pitcairn']) }}" Pitcairn>Pitcairn</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Poland']) }}" Poland>Poland</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Portugal']) }}" Portugal>Portugal</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Puerto Rico']) }}" Puerto Rico>Puerto Rico</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Qatar']) }}" Qatar>Qatar</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Reunion']) }}" Reunion>Reunion</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Romania']) }}" Romania>Romania</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Russian Federation']) }}" Russian Federation>
                                            Russian Federation
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Rwanda']) }}" Rwanda>Rwanda</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Saint Helena']) }}" Saint Helena>Saint Helena</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Saint Kitts and Nevis']) }}" Saint Kitts and Nevis>
                                            Saint Kitts and Nevis
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Saint Lucia']) }}" Saint Lucia>Saint Lucia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Saint Pierre and Miquelon']) }}" Saint Pierre and Miquelon>
                                            Saint Pierre and Miquelon
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Saint Vincent and The Grenadines']) }}" Saint Vincent and The Grenadines>
                                            Saint Vincent and The Grenadines
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Samoa']) }}" Samoa>Samoa</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'San Marino']) }}" San Marino>San Marino</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Sao Tome and Principe']) }}" Sao Tome and Principe>
                                            Sao Tome and Principe
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Saudi Arabia']) }}" Saudi Arabia>Saudi Arabia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Senegal']) }}" Senegal>Senegal</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Serbia']) }}" Serbia>Serbia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Seychelles']) }}" Seychelles>Seychelles</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Sierra Leone']) }}" Sierra Leone>Sierra Leone</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Singapore']) }}" Singapore>Singapore</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Slovakia']) }}" Slovakia>Slovakia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Slovenia']) }}" Slovenia>Slovenia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Solomon Islands']) }}" Solomon Islands>Solomon Islands</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Somalia']) }}" Somalia>Somalia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'South Africa']) }}" South Africa>South Africa</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'South Georgia and The South Sandwich Islands']) }}"
                                        >
                                            South Georgia and The South Sandwich Islands
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Spain']) }}" Spain>Spain</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Sri Lanka']) }}" Sri Lanka>Sri Lanka</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Sudan']) }}" Sudan>Sudan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Suriname']) }}" Suriname>Suriname</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Svalbard and Jan Mayen']) }}" Svalbard and Jan Mayen>
                                            Svalbard and Jan Mayen
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Swaziland']) }}" Swaziland>Swaziland</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Sweden']) }}" Sweden>Sweden</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Switzerland']) }}" Switzerland>Switzerland</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Syrian Arab Republic']) }}" Syrian Arab Republic>
                                            Syrian Arab Republic
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Taiwan']) }}" Taiwan>Taiwan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Tajikistan']) }}" Tajikistan>Tajikistan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Tanzania, United Republic of']) }}" Tanzania, United Republic of>
                                            Tanzania, United Republic of
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Thailand']) }}" Thailand>Thailand</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Timor-leste']) }}" Timor-leste>Timor-leste</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Togo']) }}" Togo>Togo</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Tokelau']) }}" Tokelau>Tokelau</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Tonga']) }}" Tonga>Tonga</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Trinidad and Tobago']) }}" Trinidad and Tobago>
                                            Trinidad and Tobago
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Tunisia']) }}" Tunisia>Tunisia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Turkey']) }}" Turkey>Turkey</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Turkmenistan']) }}" Turkmenistan>Turkmenistan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Turks and Caicos Islands']) }}" Turks and Caicos Islands>
                                            Turks and Caicos Islands
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Tuvalu']) }}" Tuvalu>Tuvalu</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Uganda']) }}" Uganda>Uganda</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Ukraine']) }}" Ukraine>Ukraine</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'United Arab Emirates']) }}" United Arab Emirates>
                                            United Arab Emirates
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'United Kingdom']) }}" United Kingdom>United Kingdom</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'United States']) }}" United States>United States</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'United States Minor Outlying Islands']) }}" United States Minor Outlying Islands>
                                            United States Minor Outlying Islands
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Uruguay']) }}" Uruguay>Uruguay</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Uzbekistan']) }}" Uzbekistan>Uzbekistan</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Vanuatu']) }}" Vanuatu>Vanuatu</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Venezuela']) }}" Venezuela>Venezuela</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Viet Nam']) }}" Viet Nam>Viet Nam</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Virgin Islands, British']) }}" Virgin Islands, British>
                                            Virgin Islands, British
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Virgin Islands, U.S.']) }}" Virgin Islands, U.S.>
                                            Virgin Islands, U.S.
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Wallis and Futuna']) }}" Wallis and Futuna>
                                            Wallis and Futuna
                                        </a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Western Sahara']) }}" Western Sahara>Western Sahara</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Yemen']) }}" Yemen>Yemen</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Zambia']) }}" Zambia>Zambia</a></li>
                                    <li class="dropdown-item"><a href="{{ route('updateUserCountry', ['id' => 'Zimbabwe']) }}" Zimbabwe>Zimbabwe</a></li>

                                </ul>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <span class="form-span d-block" id="email"
                                >{{ Auth::user()->email }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <button
                                    type="button"
                                    class="btn btn-change mt-3"
                                    data-bs-toggle="modal"
                                    data-bs-target="#changeEmail"
                            >
                                <i class="bi bi-shield-lock"></i>
                                Change Email
                            </button>

                            <!-- Modal -->
                            <div
                                    class="modal fade"
                                    id="changeEmail"
                                    tabindex="-1"
                                    aria-labelledby="changeEmail"
                                    aria-hidden="true"
                            >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="changeEmail">
                                                Change Email
                                            </h3>
                                            <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                            ></button>
                                        </div>
                                        <form action="{{ route('updateUserEmail', ['id' => Auth::user()->id]) }}" id="personalInfo" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="" class="form-label"
                                                    >New Email:</label
                                                    >
                                                    <input type="email" class="form-control" name="email" />
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">
                                                    Change Email
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <button
                                    type="button"
                                    class="btn btn-change"
                                    data-bs-toggle="modal"
                                    data-bs-target="#changePassword"
                            >
                                <i class="bi bi-shield-lock"></i>
                                Change Password
                            </button>

                            <!-- Modal -->
                            <div
                                    class="modal fade"
                                    id="changePassword"
                                    tabindex="-1"
                                    aria-labelledby="changePassword"
                                    aria-hidden="true"
                            >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="changePassword">
                                                Change Password
                                            </h3>
                                            <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                            ></button>
                                        </div>
                                        <form action="{{ route('updateUserPassword', ['id' => Auth::user()->id]) }}"  method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="" class="form-label"
                                                    >New Password:</label
                                                    >
                                                    <input type="password" class="form-control" name="password" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">
                                                    Change Password
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--</form>--}}

        </div>
        </div>
    </section>


    <script>

        function handleFirstName(e){
            if(e.key === "Enter"){
                alert("Enter was just pressed.");
            }

            return false;
        }
        function handleLastName(e){
            if(e.key === "Enter"){
                alert("Enter was just pressed.");
            }

            return false;
        }
        function handlePhone(e){
            if(e.key === "Enter"){
                alert("Enter was just pressed.");
            }

            return false;
        }
        function handleCountry(e){
            if(e.key === "Enter"){
                alert("Enter was just pressed.");
            }

            return false;
        }
        function saveFunction(){
            var arr = new Array();
            arr ['id'] = document.getElementById("id").value;
            arr [1] = document.getElementById("firstName").value;
            arr [2] = document.getElementById("lastName").value;
            arr [3] = document.getElementById("title").value;
            arr [4] = document.getElementById("phone").value;
            arr [5] = document.getElementById("address").value;
            //alert(arr);
            let url = "{{ route('updateUserInfo', ':arr') }}";
            url = url.replace(':arr', arr);
            document.location.href=url;
        }



    </script>

@endsection
