<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/layers.css')}}" rel="stylesheet">

    <title>About Us</title>
  </head>
  <body>

  @include('includes.header')

    <section class="_cd_er_aq">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_cd_er_aa">
              <h2>About Us</h2>
              <ol>
                <li>Home</li>
                <li>About Us</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================ABOUT US>>>START========================================= -->

    <section id="aboutus" class="_ab_er_we">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_hg_we_fe">
              <h2>ABOUT US<span></span></h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8 col-12">
            <div class="_lk_fr_er">
              <p>Injustice is very painful and being deceived is difficult. Through this platform, we seek to respond to the injustice of the oppressed. We listen to people's cases and respond to their inquiries and complaints regarding any case registered with us or entrusted to a lawyer from our team. Do not hesitate to take advice, even if it is an simple issue.</p>
              <div class="_kl_bv_xs">
                <ol>
                  <li><p>Deal Support</p></li>
                  <li><p>Online Consulting</p></li>
                  <li><p>Document preparation</p></li>
                </ol>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-12">
            <div class="_lk_rt_we">
              <img src="{{url::asset('assets/images/img-01.jpg')}}">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================ABOUT US>>>END========================================= -->

    <!-- ====================================FOOTER>>>STARTED==================================== -->
    @include('includes.footer')
    <!-- ====================================FOOTER>>>END==================================== -->

    <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>

    <script>
      $(document).ready (function(){
        $('.menu-toggle').click(function(){
          $('.menu-toggle').toggleClass('active')
          $('.menu').toggleClass('active')
        })
      })
    </script>

    <script>
      $( () => {

        //On Scroll Functionality
        $(window).scroll( () => {
          var windowTop = $(window).scrollTop();
          windowTop > 50 ? $('.header-wrapper').addClass('og-hf') : $('.header-wrapper').removeClass('og-hf');
        });
      });
    </script>

    <script>
      $('.counting').each(function() {
        var $this = $(this),
        countTo = $this.attr('data-count');

      $({ countNum: $this.text()}).animate({
        countNum: countTo
        },

      {

      duration: 3000,
      easing:'linear',
      step: function() {
      $this.text(Math.floor(this.countNum));
    },
      complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

    });


  });
    </script>
  </body>
</html>
