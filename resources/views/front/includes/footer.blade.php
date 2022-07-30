  <!-- START FOOTER -->
  <footer class="footer pt-5 bg-light">
    <div class="container">
      <div class="row pt-3">

        <div class="col-lg-3 pl-5 mb-lg-0 mb-5">
          <a href="/">
            <img class="img-fluid footer__logo" src="{{ asset('/') }}/adminAsset/assets/images/logo--company-name-dark.svg" alt="phone list" />
          </a>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 pl-md-0 pb-3 ps-md-0 ps-4">
          <h5 class="footer-title">ABOUT</h5>
          <ul class="pt-3">
            <li><a href="{{ route('about') }}">About us</a></li>
            <li><a href="{{ route('contact') }}">Contact us</a></li>
            <li><a href="http://phonelist.io/forum/">Forum</a></li>
            <li><a href="http://help.phonelist.io/">Help</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 p-md-0 pb-3 ps-md-0 ps-4 mt-md-0 mt-4">
          <h5 class="footer-title">OUR PARTNERS</h5>

          <div class="row pe-5">
            <div class="col-lg-4 col-md-5 col-4 mt-3">
              <a href="https://www.latestdatabase.com/">
                <img src="{{ asset('/') }}/adminAsset/assets/images/latest-database--logo.svg" class="img-fluid partner-logo"
                  alt="latest database logo" />
              </a>
            </div>
            <div class="col-lg-4 col-md-5 col-4 mt-3 me-1">
              <a href="https://www.bcellphonelist.com/">
                <img src="{{ asset('/') }}/adminAsset/assets/images/Brother Phone Number List--logo.svg" class="img-fluid partner-logo"
                  alt="Brother Phone Number List logo" />
              </a>
            </div>
            <div class="col-lg-4 col-md-5 col-4 mt-3">
              <a href="http://www.photoeditorph.com/">
                <img src="{{ asset('/') }}/adminAsset/assets/images/phollipines-photo-editor--logo.svg" class="img-fluid partner-logo"
                  alt="Philippines Photo Editor logo" />
              </a>
            </div>
            <div class="col-lg-4 col-md-5 col-4 mt-3 me-1">
              <a href="https://www.mplists.com/">
                <img src="{{ asset('/') }}/adminAsset/assets/images/mplists--logo.svg" class="img-fluid partner-logo" alt="Mp List logo" />
              </a>
            </div>
            <div class="col-lg-4 col-md-5 col-4 me-md-auto mt-3">
              <a href="http://www.seoexpartebd.com/">
                <img src="{{ asset('/') }}/adminAsset/assets/images/seo-exparte-logo.svg" class="img-fluid partner-logo"
                  alt="SEO Exparte Bangladesh logo" />
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 pb-lg-5 pb-3 ps-md-0 ps-4 mt-md-0 mt-4">
          <div class="span pb-3">
            <h5 class="footer-title">SOCIAL MEDIA</h5>
          </div>
          <div class="span fsocial">
            Follow us on social media to find out the latest updates on our
            progress.
          </div>
          <div class="social-media pt-3">
            <a href="https://www.facebook.com/Phonelistio-111559994765583">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/Phonelistio">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.youtube.com/channel/UCIYmVIkqTG1oi79AWTeVLDQ">
              <i class="fab fa-youtube"></i>
            </a>
            <a href="https://www.linkedin.com/in/phone-list-05b32a230/">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://www.instagram.com/phonelist.io/">
              <i class="fab fa-instagram"></i>
            </a>
          </div>

          <!-- START SOCIAL MEDIA BUTTON -->
          <div class="social-media-button mt-3">
            <ul>
              <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-telegram" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-facebook-messenger" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-skype" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fas fa-phone-alt" aria-hidden="true"></i></a></li>
            </ul>
          </div>
          <!-- END SOCIAL MEDIA BUTTON -->
        </div>
      </div>
      <div class="row mt-5">
        <hr class="line" />
      </div>
      <div class="row bottom-line">
        <div class="col-md-4 text-md-left text-center">
          <span class="copy">&#169;2022 Phonelist.io All rights reserved.</span>
        </div>
        <div class="col-md-8 mt-md-0 mt-4">
          <ul class="text-center m-auto terms">
            <li><a href="{{ route('termsAndServices') }}">Terms of service</a></li>
            <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
            <li><a href="{{ route('refund') }}">Refund Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- END FOOTER -->
