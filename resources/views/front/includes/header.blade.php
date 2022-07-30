<!-- START NAVBAR -->
<div class="container">
    <div class="row" id="home-navbar">
        <div class="navbar__logo">
            <a class="navbar-brand d-lg-flex" href="{{ route('/') }}">
                <img class="img-fluid" src="{{ asset('/') }}/adminAsset/assets/images/logo--company-name-dark.svg" alt="phone list" />
            </a>
        </div>

        <nav class="navbar navbar--center d-lg-flex d-none">
            <ul class="navbar__ul">
                <li class="navbar__li">
                    <a href="{{ route('product') }}" class="navbar__a"> Product </a>
                </li>
                <li class="navbar__li">
                    <a href="{{ route('packages') }}" class="navbar__a"> Pricing </a>
                </li>
                <li class="navbar__li">
                    <a href="https://blog.phonelist.io" class="navbar__a"> Blog </a>
                </li>
                <li class="navbar__li">
                    <a href="{{ route('careers') }}" class="navbar__a"> Careers </a>
                </li>
            </ul>
        </nav>
        <nav class="navbar navbar--right d-lg-flex d-none">
            <ul class="navbar__ul align-items-center">
                <li class="navbar__li d-flex align-items-center me-5">
              <!-- START TRANSLATOR -->
              <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl"
                style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16"
                  width="16" alt="English" /></a>

              <br /><select id="translator" onchange="doGTranslate(this);">
                <option value="">English</option>
                <option value="en|af">Afrikaans</option>
                <option value="en|sq">Albanian</option>
                <option value="en|ar">Arabic</option>
                <option value="en|hy">Armenian</option>
                <option value="en|az">Azerbaijani</option>
                <option value="en|eu">Basque</option>
                <option value="en|be">Belarusian</option>
                <option value="en|bg">Bulgarian</option>
                <option value="en|ca">Catalan</option>
                <option value="en|zh-CN">Chinese (Simplified)</option>
                <option value="en|zh-TW">Chinese (Traditional)</option>
                <option value="en|hr">Croatian</option>
                <option value="en|cs">Czech</option>
                <option value="en|da">Danish</option>
                <option value="en|nl">Dutch</option>
                <option value="en|en">English</option>
                <option value="en|et">Estonian</option>
                <option value="en|tl">Filipino</option>
                <option value="en|fi">Finnish</option>
                <option value="en|fr">French</option>
                <option value="en|gl">Galician</option>
                <option value="en|ka">Georgian</option>
                <option value="en|de">German</option>
                <option value="en|el">Greek</option>
                <option value="en|ht">Haitian Creole</option>
                <option value="en|iw">Hebrew</option>
                <option value="en|hi">Hindi</option>
                <option value="en|hu">Hungarian</option>
                <option value="en|is">Icelandic</option>
                <option value="en|id">Indonesian</option>
                <option value="en|ga">Irish</option>
                <option value="en|it">Italian</option>
                <option value="en|ja">Japanese</option>
                <option value="en|ko">Korean</option>
                <option value="en|lv">Latvian</option>
                <option value="en|lt">Lithuanian</option>
                <option value="en|mk">Macedonian</option>
                <option value="en|ms">Malay</option>
                <option value="en|mt">Maltese</option>
                <option value="en|no">Norwegian</option>
                <option value="en|fa">Persian</option>
                <option value="en|pl">Polish</option>
                <option value="en|pt">Portuguese</option>
                <option value="en|ro">Romanian</option>
                <option value="en|ru">Russian</option>
                <option value="en|sr">Serbian</option>
                <option value="en|sk">Slovak</option>
                <option value="en|sl">Slovenian</option>
                <option value="en|es">Spanish</option>
                <option value="en|sw">Swahili</option>
                <option value="en|sv">Swedish</option>
                <option value="en|th">Thai</option>
                <option value="en|tr">Turkish</option>
                <option value="en|uk">Ukrainian</option>
                <option value="en|ur">Urdu</option>
                <option value="en|vi">Vietnamese</option>
                <option value="en|cy">Welsh</option>
                <option value="en|yi">Yiddish</option>
              </select>
              <div id="google_translate_element2"></div>
              <!-- END TRANSLATOR -->
            </li>
                @guest
                    <li class="navbar__li">
                        <a href="{{ route('/phonelistUserLogin') }}" class="navbar__a"> Account </a>
                    </li>
                @else
                    <li class="navbar__li">
                        <a href="{{ route('loggedInUser') }}" class="navbar__a"> Account </a>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</div>
<!-- END NAVBAR -->
