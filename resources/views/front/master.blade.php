<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="@yield('metaDescription')" />
    <meta name="keywords"
          content="phone number list, mobile number list, sales leads, mobile leads, data prospect, sales crm, contact database, contact details" />

    <title>@yield('title')</title>

@include('front.includes.css')
</head>

<body id="home">
<header>
    @include('front.includes.header')
</header>

<!-- START NAVBAR FOR SMALL SCREEN -->
@include('front.includes.smallScreen')
<!-- END NAVBAR FOR SMALL SCREEN -->
<main>

   @yield('main')

   <!-- START CATAGORIES -->
       <section class="section-categories bg-light u-padding-lg">
           <div class="container">
               <div class="row mb-3">
                   <div class="col-md-12 border-bottom">
                       <h5 class="sub-heading">
                           Browse Phone Number List's Directories
                       </h5>
                   </div>
               </div>
               <div class="row py-5 px-3">
                   <div class="col-md-6 pe-4">
                       <div class="d-flex align-items-center border-bottom pb-3 mb-4">
                           <div class="circle-element circle-element--person">
                               <i class="bi bi-people-fill"></i>
                           </div>
                           <span class="sub-heading">Person Search</span>
                       </div>
                       <div>
                           <a href="{{ route('category', ['id' => 'A'])  }}" class="blue-link ">A</a>
                           <a href="{{ route('category', ['id' => 'B'])  }}" class="blue-link">B</a>
                           <a href="{{ route('category', ['id' => 'C'])  }}" class="blue-link">C</a>
                           <a href="{{ route('category', ['id' => 'D'])  }}" class="blue-link">D</a>
                           <a href="{{ route('category', ['id' => 'E'])  }}" class="blue-link">E</a>
                           <a href="{{ route('category', ['id' => 'F'])  }}" class="blue-link">F</a>
                           <a href="{{ route('category', ['id' => 'G'])  }}" class="blue-link">G</a>
                           <a href="{{ route('category', ['id' => 'H'])  }}" class="blue-link">H</a>
                           <a href="{{ route('category', ['id' => 'I'])  }}" class="blue-link">I</a>
                           <a href="{{ route('category', ['id' => 'J'])  }}" class="blue-link">J</a>
                           <a href="{{ route('category', ['id' => 'K'])  }}" class="blue-link">K</a>
                           <a href="{{ route('category', ['id' => 'L'])  }}" class="blue-link">L</a>
                           <a href="{{ route('category', ['id' => 'M'])  }}" class="blue-link">M</a>
                           <a href="{{ route('category', ['id' => 'N'])  }}" class="blue-link">N</a>
                           <a href="{{ route('category', ['id' => 'O'])  }}" class="blue-link">O</a>
                           <a href="{{ route('category', ['id' => 'P'])  }}" class="blue-link">P</a>
                           <a href="{{ route('category', ['id' => 'Q'])  }}" class="blue-link">Q</a>
                           <a href="{{ route('category', ['id' => 'R'])  }}" class="blue-link">R</a>
                           <a href="{{ route('category', ['id' => 'S'])  }}" class="blue-link">S</a>
                           <a href="{{ route('category', ['id' => 'T'])  }}" class="blue-link">T</a>
                           <a href="{{ route('category', ['id' => 'U'])  }}" class="blue-link">U</a>
                           <a href="{{ route('category', ['id' => 'V'])  }}" class="blue-link">V</a>
                           <a href="{{ route('category', ['id' => 'W'])  }}" class="blue-link">W</a>
                           <a href="{{ route('category', ['id' => 'X'])  }}" class="blue-link">X</a>
                           <a href="{{ route('category', ['id' => 'Y'])  }}" class="blue-link">Y</a>
                           <a href="{{ route('category', ['id' => 'Z'])  }}" class="blue-link">Z</a>
                       </div>
                   </div>
                   <div class="col-md-6 ps-md-4 mt-md-0 mt-5">
                       <div class="d-flex align-items-center border-bottom pb-3 mb-4">
                           <div class="circle-element circle-element--company">
                               <i class="bi bi-briefcase-fill"></i>
                           </div>
                           <span class="sub-heading">People Search for Country</span>
                       </div>
                       <div class="country-dropdown">
                           <select id="country" name="country" class="col-6
                        //onchange ="window.location.href=this.options[this.selectedIndex].value;"
                                   onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
                           >
                               <option value="{{ route('country', ['id' => 'Afghanistan']) }}">Afghanistan</option>
                               <option value="{{ route('country', ['id' => 'Åland Islands']) }}" >Åland Islands</option>
                               <option value="{{ route('country', ['id' => 'Albania']) }}" >Albania</option>
                               <option value="{{ route('country', ['id' => 'Algeria']) }}" >Algeria</option>
                               <option value="{{ route('country', ['id' => 'American Samoa']) }}">American Samoa</option>
                               <option value=" {{ route('country', ['id' => 'Andorra']) }}">Andorra</option>
                               <option value="{{ route('country', ['id' => 'Angola']) }}">Angola</option>
                               <option value="{{ route('country', ['id' => 'Anguilla']) }}" >Anguilla</option>
                               <option value="{{ route('country', ['id' => 'Antarctica']) }}">Antarctica</option>
                               <option value="{{ route('country', ['id' => 'Antigua and Barbuda']) }}" >
                                   Antigua and Barbuda
                               </option>
                               <option value="{{ route('country', ['id' => 'Argentina']) }}" >Argentina</option>
                               <option value="{{ route('country', ['id' => 'Armenia']) }}" >Armenia</option>
                               <option value="{{ route('country', ['id' => 'Aruba']) }}" >Aruba</option>
                               <option value="{{ route('country', ['id' => 'Australia']) }}" >Australia</option>
                               <option value="{{ route('country', ['id' => 'Austria']) }}"  >Austria</option>
                               <option value="{{ route('country', ['id' => 'Azerbaijan']) }}">Azerbaijan</option>
                               <option value="{{ route('country', ['id' => 'Bahamas']) }}"  >Bahamas</option>
                               <option value="{{ route('country', ['id' => 'Bahrain']) }}"  >Bahrain</option>
                               <option value="{{ route('country', ['id' => 'Bangladesh']) }}"  >Bangladesh</option>
                               <option value="{{ route('country', ['id' => 'Barbados']) }}">Barbados</option>
                               <option value="{{ route('country', ['id' => 'Belarus']) }}" >Belarus</option>
                               <option value="{{ route('country', ['id' => 'Belgium']) }}">Belgium</option>
                               <option value="{{ route('country', ['id' => 'Belize']) }}">Belize</option>
                               <option value="{{ route('country', ['id' => 'Benin']) }}" >Benin</option>
                               <option value="{{ route('country', ['id' => 'Bermuda']) }}"  >Bermuda</option>
                               <option value="{{ route('country', ['id' => 'Bhutan']) }}"  >Bhutan</option>
                               <option value="{{ route('country', ['id' => 'Bolivia']) }}" >Bolivia</option>
                               <option value="{{ route('country', ['id' => 'Bosnia and Herzegovina']) }}"  >
                                   Bosnia and Herzegovina
                               </option>
                               <option value="{{ route('country', ['id' => 'Botswana']) }}" >Botswana</option>
                               <option value="{{ route('country', ['id' => 'Bouvet Island']) }}" >Bouvet Island</option>
                               <option value="{{ route('country', ['id' => 'Brazil']) }}">Brazil</option>
                               <option value="{{ route('country', ['id' => 'British Indian Ocean Territory']) }}" >
                                   British Indian Ocean Territory
                               </option>
                               <option value="{{ route('country', ['id' => 'Brunei Darussalam']) }}"  >
                                   Brunei Darussalam
                               </option>
                               <option value="{{ route('country', ['id' => 'Bulgaria']) }}">Bulgaria</option>
                               <option value="{{ route('country', ['id' => 'Burkina Faso']) }}">Burkina Faso</option>
                               <option value="{{ route('country', ['id' => 'Burundi']) }}" >Burundi</option>
                               <option value="{{ route('country', ['id' => 'Cambodia']) }}" >Cambodia</option>
                               <option value="{{ route('country', ['id' => 'Cameroon']) }}"  >Cameroon</option>
                               <option value="{{ route('country', ['id' => 'Canada']) }}"  >Canada</option>
                               <option value="{{ route('country', ['id' => 'Cape Verde']) }}">Cape Verde</option>
                               <option value="{{ route('country', ['id' => 'Cayman Islands']) }}" >Cayman Islands</option>
                               <option value="{{ route('country', ['id' => 'Central African Republic']) }}">
                                   Central African Republic
                               </option>
                               <option value="{{ route('country', ['id' => 'Chad']) }}"  >Chad</option>
                               <option value="{{ route('country', ['id' => 'Chile']) }}">Chile</option>
                               <option value="{{ route('country', ['id' => 'China']) }}">China</option>
                               <option value="{{ route('country', ['id' => 'Christmas Island']) }}" >Christmas Island</option>
                               <option value="{{ route('country', ['id' => 'Cocos (Keeling) Islands']) }}">
                                   Cocos (Keeling) Islands
                               </option>
                               <option value="{{ route('country', ['id' => 'Colombia']) }}" >Colombia</option>
                               <option value="{{ route('country', ['id' => 'Comoros']) }}" >Comoros</option>
                               <option value="{{ route('country', ['id' => 'Congo']) }}">Congo</option>
                               <option value="{{ route('country', ['id' => 'Congo, The Democratic Republic of The']) }}"   >
                                   Congo, The Democratic Republic of The
                               </option>
                               <option value="{{ route('country', ['id' => 'Cook Islands']) }}">Cook Islands</option>
                               <option value="{{ route('country', ['id' => 'Costa Rica']) }}"  >Costa Rica</option>
                               <option value="{{ route('country', ['id' => 'Cote D ivoire']) }}">Cote D'ivoire</option>
                               <option value="{{ route('country', ['id' => 'Croatia']) }}">Croatia</option>
                               <option value="{{ route('country', ['id' => 'Cuba']) }}" >Cuba</option>
                               <option value="{{ route('country', ['id' => 'Cyprus']) }}" >Cyprus</option>
                               <option value="{{ route('country', ['id' => 'Czech Republic']) }}" >Czech Republic</option>
                               <option value="{{ route('country', ['id' => 'Denmark']) }}" >Denmark</option>
                               <option value="{{ route('country', ['id' => 'Djibouti']) }}">Djibouti</option>
                               <option value="{{ route('country', ['id' => 'Dominica']) }}" >Dominica</option>
                               <option value="{{ route('country', ['id' => 'Dominican Republic']) }}"  >
                                   Dominican Republic
                               </option>
                               <option value="{{ route('country', ['id' => 'Ecuador']) }}" >Ecuador</option>
                               <option value="{{ route('country', ['id' => 'Egypt']) }}" >Egypt</option>
                               <option value="{{ route('country', ['id' => 'El Salvador']) }}"  >El Salvador</option>
                               <option value="{{ route('country', ['id' => 'Equatorial Guinea']) }}">
                                   Equatorial Guinea
                               </option>
                               <option value="{{ route('country', ['id' => 'Eritrea']) }}" >Eritrea</option>
                               <option value="{{ route('country', ['id' => 'Estonia']) }}"  >Estonia</option>
                               <option value="{{ route('country', ['id' => 'Ethiopia']) }}"  >Ethiopia</option>
                               <option value="{{ route('country', ['id' => 'Falkland Islands (Malvinas)']) }}"  >
                                   Falkland Islands (Malvinas)
                               </option>
                               <option value="{{ route('country', ['id' => 'Faroe Islands']) }}" >Faroe Islands</option>
                               <option value="{{ route('country', ['id' => 'Fiji']) }}"  >Fiji</option>
                               <option value="{{ route('country', ['id' => 'Finland']) }}" >Finland</option>
                               <option value="{{ route('country', ['id' => 'France']) }}"  >France</option>
                               <option value="{{ route('country', ['id' => 'French Guiana']) }}"  >French Guiana</option>
                               <option value="{{ route('country', ['id' => 'French Polynesia']) }}" >French Polynesia</option>
                               <option value="{{ route('country', ['id' => 'French Southern Territories']) }}"  >
                                   French Southern Territories
                               </option>
                               <option value="{{ route('country', ['id' => 'Gabon']) }}" >Gabon</option>
                               <option value="{{ route('country', ['id' => 'Gambia']) }}" >Gambia</option>
                               <option value="{{ route('country', ['id' => 'Georgia']) }}">Georgia</option>
                               <option value="{{ route('country', ['id' => 'Germany']) }}" >Germany</option>
                               <option value="{{ route('country', ['id' => 'Ghana']) }}"  >Ghana</option>
                               <option value="{{ route('country', ['id' => 'Gibraltar']) }}"  >Gibraltar</option>
                               <option value="{{ route('country', ['id' => 'Greece']) }}"  >Greece</option>
                               <option value="{{ route('country', ['id' => 'Greenland']) }}"  >Greenland</option>
                               <option value="{{ route('country', ['id' => 'Grenada']) }}" >Grenada</option>
                               <option value="{{ route('country', ['id' => 'Guadeloupe']) }}" >Guadeloupe</option>
                               <option value="{{ route('country', ['id' => 'Guam']) }}"  >Guam</option>
                               <option value="{{ route('country', ['id' => 'Guatemala']) }}"  >Guatemala</option>
                               <option value="{{ route('country', ['id' => 'Guernsey']) }}" >Guernsey</option>
                               <option value="{{ route('country', ['id' => 'Guinea']) }}" >Guinea</option>
                               <option value="{{ route('country', ['id' => 'Guinea-bissau']) }}" >Guinea-bissau</option>
                               <option value="{{ route('country', ['id' => 'Guyana']) }}"  >Guyana</option>
                               <option value="{{ route('country', ['id' => 'Haiti']) }}"  >Haiti</option>
                               <option value="{{ route('country', ['id' => 'Heard Island and Mcdonald Islands']) }}" >
                                   Heard Island and Mcdonald Islands
                               </option>
                               <option value="{{ route('country', ['id' => 'Holy See (Vatican City State)']) }}">
                                   Holy See (Vatican City State)
                               </option>
                               <option value="{{ route('country', ['id' => 'Honduras']) }}">Honduras</option>
                               <option value="{{ route('country', ['id' => 'Hong Kong']) }}"  >Hong Kong</option>
                               <option value="{{ route('country', ['id' => 'Hungary']) }}"  >Hungary</option>
                               <option value="{{ route('country', ['id' => 'Iceland']) }}" >Iceland</option>
                               <option value="{{ route('country', ['id' => 'India']) }}" >India</option>
                               <option value="{{ route('country', ['id' => 'Indonesia']) }}">Indonesia</option>
                               <option value="{{ route('country', ['id' => 'Iran, Islamic Republic of']) }}" >
                                   Iran, Islamic Republic of
                               </option>
                               <option value="{{ route('country', ['id' => 'Iraq']) }}" >Iraq</option>
                               <option value="{{ route('country', ['id' => 'Ireland']) }}" >Ireland</option>
                               <option value="{{ route('country', ['id' => 'Isle of Man']) }}" >Isle of Man</option>
                               <option value="{{ route('country', ['id' => 'Israel']) }}" >Israel</option>
                               <option value="{{ route('country', ['id' => 'Italy']) }}" >Italy</option>
                               <option value="{{ route('country', ['id' => 'Jamaica']) }}" >Jamaica</option>
                               <option value="{{ route('country', ['id' => 'Japan']) }}"  >Japan</option>
                               <option value="{{ route('country', ['id' => 'Jersey']) }}" >Jersey</option>
                               <option value="{{ route('country', ['id' => 'Jordan']) }}" >Jordan</option>
                               <option value="{{ route('country', ['id' => 'Kazakhstan']) }}">Kazakhstan</option>
                               <option value="{{ route('country', ['id' => 'Kenya']) }}">Kenya</option>
                               <option value="{{ route('country', ['id' => 'Kiribati']) }}" >Kiribati</option>
                               <option value="{{ route('country', ['id' => 'Korea, Democratic Peoples Republic of']) }}" >
                                   Korea, Democratic People's Republic of
                               </option>
                               <option value="{{ route('country', ['id' => 'Korea, Republic of']) }}">
                                   Korea, Republic of
                               </option>
                               <option value="{{ route('country', ['id' => 'Kuwait']) }}">Kuwait</option>
                               <option value="{{ route('country', ['id' => 'Kyrgyzstan']) }}" >Kyrgyzstan</option>
                               <option value="{{ route('country', ['id' => 'Lao Peoples Democratic Republic']) }}">
                                   Lao People's Democratic Republic
                               </option>
                               <option value="{{ route('country', ['id' => 'Latvia']) }}" >Latvia</option>
                               <option value="{{ route('country', ['id' => 'Lebanon']) }}">Lebanon</option>
                               <option value="{{ route('country', ['id' => 'Lesotho']) }}">Lesotho</option>
                               <option value="{{ route('country', ['id' => 'Liberia']) }}" >Liberia</option>
                               <option value="{{ route('country', ['id' => 'Libyan Arab Jamahiriya']) }}"  >
                                   Libyan Arab Jamahiriya
                               </option>
                               <option value="{{ route('country', ['id' => 'Liechtenstein']) }}" >Liechtenstein</option>
                               <option value="{{ route('country', ['id' => 'Lithuania']) }}" >Lithuania</option>
                               <option value="{{ route('country', ['id' => 'Luxembourg']) }}" >Luxembourg</option>
                               <option value="{{ route('country', ['id' => 'Macao']) }}" >Macao</option>
                               <option
                                   value="{{ route('country', ['id' => 'Macedonia, The Former Yugoslav Republic of']) }}"
                               >
                                   Macedonia, The Former Yugoslav Republic of
                               </option>
                               <option value="{{ route('country', ['id' => 'Madagascar']) }}" >Madagascar</option>
                               <option value="{{ route('country', ['id' => 'Malawi']) }}"  >Malawi</option>
                               <option value="{{ route('country', ['id' => 'Malaysia']) }}" >Malaysia</option>
                               <option value="{{ route('country', ['id' => 'Maldives']) }}" >Maldives</option>
                               <option value="{{ route('country', ['id' => 'Mali']) }}" >Mali</option>
                               <option value="{{ route('country', ['id' => 'Malta']) }}" >Malta</option>
                               <option value="{{ route('country', ['id' => 'Marshall Islands']) }}"  >Marshall Islands</option>
                               <option value="{{ route('country', ['id' => 'Martinique']) }}"  >Martinique</option>
                               <option value="{{ route('country', ['id' => 'Mauritania']) }}"  >Mauritania</option>
                               <option value="{{ route('country', ['id' => 'Mauritius']) }}"  >Mauritius</option>
                               <option value="{{ route('country', ['id' => 'Mayotte']) }}"  >Mayotte</option>
                               <option value="{{ route('country', ['id' => 'Mexico']) }}" >Mexico</option>
                               <option value="{{ route('country', ['id' => 'Micronesia, Federated States of']) }}"  >
                                   Micronesia, Federated States of
                               </option>
                               <option value="{{ route('country', ['id' => 'Moldova, Republic of']) }}" >
                                   Moldova, Republic of
                               </option>
                               <option value="{{ route('country', ['id' => 'Monaco']) }}" >Monaco</option>
                               <option value="{{ route('country', ['id' => 'Mongolia']) }}">Mongolia</option>
                               <option value="{{ route('country', ['id' => 'Montenegro']) }}" >Montenegro</option>
                               <option value="{{ route('country', ['id' => 'Montserrat']) }}" >Montserrat</option>
                               <option value="{{ route('country', ['id' => 'Morocco']) }}" >Morocco</option>
                               <option value="{{ route('country', ['id' => 'Mozambique']) }}" >Mozambique</option>
                               <option value="{{ route('country', ['id' => 'Myanmar']) }}"  >Myanmar</option>
                               <option value="{{ route('country', ['id' => 'Namibia']) }}"  >Namibia</option>
                               <option value="{{ route('country', ['id' => 'Nauru']) }}" >Nauru</option>
                               <option value="{{ route('country', ['id' => 'Nepal']) }}" >Nepal</option>
                               <option value="{{ route('country', ['id' => 'Netherlands']) }}"  >Netherlands</option>
                               <option value="{{ route('country', ['id' => 'Netherlands Antilles']) }}"  >
                                   Netherlands Antilles
                               </option>
                               <option value="{{ route('country', ['id' => 'New Caledonia']) }}" >New Caledonia</option>
                               <option value="{{ route('country', ['id' => 'New Zealand']) }}"  >New Zealand</option>
                               <option value="{{ route('country', ['id' => 'Nicaragua']) }}" >Nicaragua</option>
                               <option value="{{ route('country', ['id' => 'Niger']) }}">Niger</option>
                               <option value="{{ route('country', ['id' => 'Nigeria']) }}" >Nigeria</option>
                               <option value="{{ route('country', ['id' => 'Niue']) }}">Niue</option>
                               <option value="{{ route('country', ['id' => 'Norfolk Island']) }}" >Norfolk Island</option>
                               <option value="{{ route('country', ['id' => 'Northern Mariana Islands']) }}"  >
                                   Northern Mariana Islands
                               </option>
                               <option value="{{ route('country', ['id' => 'Norway']) }}" >Norway</option>
                               <option value="{{ route('country', ['id' => 'Oman']) }}" >Oman</option>
                               <option value="{{ route('country', ['id' => 'Pakistan']) }}"  >Pakistan</option>
                               <option value="{{ route('country', ['id' => 'Palau']) }}" >Palau</option>
                               <option value="{{ route('country', ['id' => 'Palestinian Territory, Occupied']) }}"  >
                                   Palestinian Territory, Occupied
                               </option>
                               <option value="{{ route('country', ['id' => 'Panama']) }}">Panama</option>
                               <option value="{{ route('country', ['id' => 'Papua New Guinea']) }}" >Papua New Guinea</option>
                               <option value="{{ route('country', ['id' => 'Paraguay']) }}">Paraguay</option>
                               <option value="{{ route('country', ['id' => 'Peru']) }}" >Peru</option>
                               <option value="{{ route('country', ['id' => 'Philippines']) }}">Philippines</option>
                               <option value="{{ route('country', ['id' => 'Pitcairn']) }}">Pitcairn</option>
                               <option value="{{ route('country', ['id' => 'Poland']) }}" >Poland</option>
                               <option value="{{ route('country', ['id' => 'Portugal']) }}"  >Portugal</option>
                               <option value="{{ route('country', ['id' => 'Puerto Rico']) }}" >Puerto Rico</option>
                               <option value="{{ route('country', ['id' => 'Qatar']) }}"  >Qatar</option>
                               <option value="{{ route('country', ['id' => 'Reunion']) }}"  >Reunion</option>
                               <option value="{{ route('country', ['id' => 'Romania']) }}"  >Romania</option>
                               <option value="{{ route('country', ['id' => 'Russian Federation']) }}"  >
                                   Russian Federation
                               </option>
                               <option value="{{ route('country', ['id' => 'Rwanda']) }}" >Rwanda</option>
                               <option value="{{ route('country', ['id' => 'Saint Helena']) }}" >Saint Helena</option>
                               <option value="{{ route('country', ['id' => 'Saint Kitts and Nevis']) }}" >
                                   Saint Kitts and Nevis
                               </option>
                               <option value="{{ route('country', ['id' => 'Saint Lucia']) }}" >Saint Lucia</option>
                               <option value="{{ route('country', ['id' => 'Saint Pierre and Miquelon']) }}"  >
                                   Saint Pierre and Miquelon
                               </option>
                               <option value="{{ route('country', ['id' => 'Saint Vincent and The Grenadines']) }}"  >
                                   Saint Vincent and The Grenadines
                               </option>
                               <option value="{{ route('country', ['id' => 'Samoa']) }}"  >Samoa</option>
                               <option value="{{ route('country', ['id' => 'San Marino']) }}"  >San Marino</option>
                               <option value="{{ route('country', ['id' => 'Sao Tome and Principe']) }}"  >
                                   Sao Tome and Principe
                               </option>
                               <option value="{{ route('country', ['id' => 'Saudi Arabia']) }}"  >Saudi Arabia</option>
                               <option value="{{ route('country', ['id' => 'Senegal']) }}" >Senegal</option>
                               <option value="{{ route('country', ['id' => 'Serbia']) }}" >Serbia</option>
                               <option value="{{ route('country', ['id' => 'Seychelles']) }}"  >Seychelles</option>
                               <option value="{{ route('country', ['id' => 'Sierra Leone']) }}" >Sierra Leone</option>
                               <option value="{{ route('country', ['id' => 'Singapore']) }}"  >Singapore</option>
                               <option value="{{ route('country', ['id' => 'Slovakia']) }}"  >Slovakia</option>
                               <option value="{{ route('country', ['id' => 'Slovenia']) }}"  >Slovenia</option>
                               <option value="{{ route('country', ['id' => 'Solomon Islands']) }}"  >Solomon Islands</option>
                               <option value="{{ route('country', ['id' => 'Somalia']) }}"  >Somalia</option>
                               <option value="{{ route('country', ['id' => 'South Africa']) }}"  >South Africa</option>
                               <option
                                   value="{{ route('country', ['id' => 'South Georgia and The South Sandwich Islands']) }}"
                               >
                                   South Georgia and The South Sandwich Islands
                               </option>
                               <option value="{{ route('country', ['id' => 'Spain']) }}" >Spain</option>
                               <option value="{{ route('country', ['id' => 'Sri Lanka']) }}" >Sri Lanka</option>
                               <option value="{{ route('country', ['id' => 'Sudan']) }}" >Sudan</option>
                               <option value="{{ route('country', ['id' => 'Suriname']) }}" >Suriname</option>
                               <option value="{{ route('country', ['id' => 'Svalbard and Jan Mayen']) }}"  >
                                   Svalbard and Jan Mayen
                               </option>
                               <option value="{{ route('country', ['id' => 'Swaziland']) }}" >Swaziland</option>
                               <option value="{{ route('country', ['id' => 'Sweden']) }}"  >Sweden</option>
                               <option value="{{ route('country', ['id' => 'Switzerland']) }}" >Switzerland</option>
                               <option value="{{ route('country', ['id' => 'Syrian Arab Republic']) }}"  >
                                   Syrian Arab Republic
                               </option>
                               <option value="{{ route('country', ['id' => 'Taiwan']) }}">Taiwan</option>
                               <option value="{{ route('country', ['id' => 'Tajikistan']) }}" >Tajikistan</option>
                               <option value="{{ route('country', ['id' => 'Tanzania, United Republic of']) }}">
                                   Tanzania, United Republic of
                               </option>
                               <option value="{{ route('country', ['id' => 'Thailand']) }}" >Thailand</option>
                               <option value="{{ route('country', ['id' => 'Timor-leste']) }}" >Timor-leste</option>
                               <option value="{{ route('country', ['id' => 'Togo']) }}"  >Togo</option>
                               <option value="{{ route('country', ['id' => 'Tokelau']) }}"  >Tokelau</option>
                               <option value="{{ route('country', ['id' => 'Tonga']) }}"  >Tonga</option>
                               <option value="{{ route('country', ['id' => 'Trinidad and Tobago']) }}" >
                                   Trinidad and Tobago
                               </option>
                               <option value="{{ route('country', ['id' => 'Tunisia']) }}" >Tunisia</option>
                               <option value="{{ route('country', ['id' => 'Turkey']) }}" >Turkey</option>
                               <option value="{{ route('country', ['id' => 'Turkmenistan']) }}"  >Turkmenistan</option>
                               <option value="{{ route('country', ['id' => 'Turks and Caicos Islands']) }}" >
                                   Turks and Caicos Islands
                               </option>
                               <option value="{{ route('country', ['id' => 'Tuvalu']) }}">Tuvalu</option>
                               <option value="{{ route('country', ['id' => 'Uganda']) }}"  >Uganda</option>
                               <option value="{{ route('country', ['id' => 'Ukraine']) }}"  >Ukraine</option>
                               <option value="{{ route('country', ['id' => 'United Arab Emirates']) }}"  >
                                   United Arab Emirates
                               </option>
                               <option value="{{ route('country', ['id' => 'United Kingdom']) }}" >United Kingdom</option>
                               <option value="{{ route('country', ['id' => 'United States']) }}"  >United States</option>
                               <option value="{{ route('country', ['id' => 'United States Minor Outlying Islands']) }}" >
                                   United States Minor Outlying Islands
                               </option>
                               <option value="{{ route('country', ['id' => 'Uruguay']) }}">Uruguay</option>
                               <option value="{{ route('country', ['id' => 'Uzbekistan']) }}" >Uzbekistan</option>
                               <option value="{{ route('country', ['id' => 'Vanuatu']) }}"  >Vanuatu</option>
                               <option value="{{ route('country', ['id' => 'Venezuela']) }}"  >Venezuela</option>
                               <option value="{{ route('country', ['id' => 'Viet Nam']) }}"  >Viet Nam</option>
                               <option value="{{ route('country', ['id' => 'Virgin Islands, British']) }}" >
                                   Virgin Islands, British
                               </option>
                               <option value="{{ route('country', ['id' => 'Virgin Islands, U.S.']) }}"  >
                                   Virgin Islands, U.S.
                               </option>
                               <option value="{{ route('country', ['id' => 'Wallis and Futuna']) }}"  >
                                   Wallis and Futuna
                               </option>
                               <option value="{{ route('country', ['id' => 'Western Sahara']) }}"  >Western Sahara</option>
                               <option value="{{ route('country', ['id' => 'Yemen']) }}" >Yemen</option>
                               <option value="{{ route('country', ['id' => 'Zambia']) }}" >Zambia</option>
                               <option value="{{ route('country', ['id' => 'Zimbabwe']) }}"  >Zimbabwe</option>
                           </select>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- END CATAGORIES -->
</main>

<!-- START FOOTER -->
@include('front.includes.footer')
<!-- END FOOTER -->

@include('front.includes.js')

<!-- TYPEWRITER JS -->
<script>
    let bannerText = document.getElementById('bannerText');

    let typewriter = new Typewriter(bannerText, {
        loop: false,
        delay: 50,
        cursor: ' ',
    });

    typewriter
        .typeString('Crush your sales numbers every quarter')
        .pauseFor(1500)
        // .deleteAll()
        .start();
</script>

<!-- ANIMATION JS -->
<script>
    AOS.init({
        once: true,
    });
</script>


</body>

</html>
