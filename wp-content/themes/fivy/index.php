<?php get_header(); ?>

<?php
    global $fivy_options;
?>
<section class="great-deals">
    <div class="container">
      <!--======= TITTLE =========-->
      <div class="tittle">
        <h1>great deals of the day</h1>
      </div>
      <div class="coupon">
        <ul class="row">
          <!--======= COUPEN DEALS =========-->
          <li class="col-sm-4">
            <div class="coupon-inner">
              <div class="top-tag"> <span class="eten"><span>eten</span></span></div>
              <div class="c-img"> <img class="img-responsive" src="assets/images/c-img-1.jpg" alt=""> <a class="head" href="#.">Flat 40% off Hotel Bookings In 10 Cities  Near you</a>
                <p class="timer">nog: 15 uur 51 min 24 sec</p>
                <div class="text-center"> <a href="#." class="btn">pak de deal!</a></div>
                <div class="text-center"><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
              </div>

            </div>
          </li>

          <!--======= COUPEN DEALS =========-->
          <li class="col-sm-4">
            <div class="coupon-inner">
              <div class="top-tag"> <span class="fun"><span>fun</span></span></div>
              <div class="c-img"> <img class="img-responsive" src="assets/images/c-img-2.jpg" alt=""> <a class="head" href="#.">Flat 40% off Hotel Bookings In 10 Cities  Near you</a>
                <p class="timer">nog: 15 uur 51 min 24 sec</p>
                <div class="text-center"> <a href="#." class="btn">pak de deal!</a> </div>
                <div class="text-center"><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
              </div>
            </div>
          </li>

          <!--======= COUPEN DEALS =========-->
          <li class="col-sm-4">
            <div class="coupon-inner">
              <div class="top-tag"> <span class="vakantie"><span>vakantie</span></span></div>
              <div class="c-img"> <img class="img-responsive" src="assets/images/c-img-3.jpg" alt=""> <a class="head" href="#.">Flat 40% off Hotel Bookings In 10 Cities  Near you</a>
                <p class="timer">nog: 15 uur 51 min 24 sec</p>
                <div class="text-center"> <a href="#." class="btn">pak de deal!</a> </div>
                <div class="text-center"><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
              </div>
            </div>
          </li>

          <!--======= COUPEN DEALS =========-->
          <li class="col-sm-4">
            <div class="coupon-inner">
              <div class="top-tag"> <span class="gadget"><span>gadget</span></span></div>
              <div class="c-img"> <img class="img-responsive" src="assets/images/c-img-4.jpg" alt=""> <a class="head" href="#.">Flat 40% off Hotel Bookings In 10 Cities  Near you</a>
                <p class="timer">nog: 15 uur 51 min 24 sec</p>
                <div class="text-center"> <a href="#." class="btn">pak de deal!</a> </div>
                <div class="text-center"><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
              </div>
            </div>
          </li>

          <!--======= COUPEN DEALS =========-->
          <li class="col-sm-4">
            <div class="coupon-inner">
              <div class="top-tag"> <span class="tussenuit"><span>tussenuit</span></span></div>
              <div class="c-img"> <img class="img-responsive" src="assets/images/c-img-5.jpg" alt=""> <a class="head" href="#.">Flat 40% off Hotel Bookings In 10 Cities  Near you</a>
                <p class="timer">nog: 15 uur 51 min 24 sec</p>
                <div class="text-center"> <a href="#." class="btn">pak de deal!</a> </div>
                <div class="text-center"><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
              </div>
            </div>
          </li>
          <li class="col-sm-4">
            <div class="coupon-inner">
                <div class="top-tag">
                    <span class="sponsor"><?php echo $fivy_options['sponsor-title']; ?></span>
                </div>
                <div class="c-img">
                    <div class="text-center">
                        <p><?php echo $fivy_options['sponsor-content']; ?></p>
                        <script type="text/javascript">
                            google_ad_client = "ca-pub-5248039354450328";
                            google_ad_slot = "1769310150";
                            google_ad_width = 300;
                            google_ad_height = 250;
                        </script>
                        <!-- Fivy [square] -->
                        <script type="text/javascript" src="//pagead2.googlesyndication.com/pagead/show_ads.js"></script>
                        <a href="<?php echo $fivy_options['sponsor-button-url']; ?>" class="btn btn-sponsor"><?php echo $fivy_options['sponsor-button-text']; ?></a>
                    </div>
                </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>

<?php get_footer(); ?>