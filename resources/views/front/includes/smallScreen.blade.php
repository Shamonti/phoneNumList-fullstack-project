  <!-- START NAVBAR FOR SMALL SCREEN -->
  <div class="d-lg-none d-flex">
    <div class="navbar__logo ms-md-5 ms-2 ps-5">
      <a class="navbar-brand d-flex" href="/">
        <img class="img-fluid" src="{{ asset('/') }}/adminAsset/assets/images/logo--company-name-dark.svg" alt="phone list" />
      </a>
    </div>
    <div class="navigation">
      <input type="checkbox" class="navigation__checkbox" id="navi-toggle" />

      <label for="navi-toggle" class="navigation__button">
        <span class="navigation__icon">&nbsp;</span>
      </label>

      <div class="navigation__background">&nbsp;</div>

      <nav class="navigation__nav">
        <ul class="navigation__list">
          <li class="navigation__item">
            <a href="product.html" class="navigation__link">Product</a>
          </li>
          <li class="navigation__item">
            <a href="packages.html" class="navigation__link">Pricing</a>
          </li>
          <li class="navigation__item">
            <a href="https://blog.phonelist.io" class="navigation__link">Blog</a>
          </li>
          <li class="navigation__item">
            <a href="#" class="navigation__link">Careers</a>
          </li>
          <li class="navigation__item d-flex justify-content-center">
            <!-- START TRANSLATOR -->
            <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl my-auto"
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
          <li class="navigation__item">
            <a href="login.html" class="navigation__link">Account</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- END NAVBAR FOR SMALL SCREEN -->
