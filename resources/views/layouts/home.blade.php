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

    <title>Honest Lawyer</title>
  </head>
  <body>

  @include('includes.header')

  @yield('content')

    <!-- ===========================================SLIDER>>>START=========================================== -->

    <section class="_slider_01">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
         <ol class="carousel-indicators">
          <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleFade" data-slide-to="1"></li>
          <li data-target="#carouselExampleFade" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{URL::asset('assets/images/slide-01.jpg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>We seek justice.</h5>
              <div class="btn_01">
                <a href="{{route('contact')}}"><span>Contact Us</span></a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="{{URL::asset('assets/images/justice.jpg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>We seek justice.</h5>
              <div class="btn_01">
                <a href="{{route('contact')}}"><span>Contact Us</span></a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="{{URL::asset('assets/images/slide-03.jpg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>We seek justice.</h5>
              <div class="btn_01">
                <a href="{{route('contact')}}"><span>Contact Us</span></a>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>


    <!-- =========================================ABOUT US>>>START========================================= -->

    <section id="aboutus" class="_ab_er_we">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_hg_we_fe">
              <h2>ABOUT <span>US</span></h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8 col-12">
            <div class="_lk_fr_er">
              <p>Injustice is very painful and being deceived is difficult. Through this platform, we seek to respond to the injustice of the oppressed. We listen to people's cases and respond to their inquiries and complaints regarding any case registered with us or entrusted to a lawyer from our team. Do not hesitate to take advice, even if it is an simple issue.</p>

              <p>call us.</p>
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
              <img src="{{URL::asset('assets/images/about.jpg')}}">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================ABOUT US>>>END========================================= -->

    <!-- ========================================SERVICESS>>>START======================================== -->

    <section id="services" class="_vd_yt_re_wq">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_hg_we_fe">
              <h2>Type Of Issues <span></span></h2>
            </div>
          </div>
        </div>

        <div class="row _ma_ol_lk">
            @foreach($type_list as $type)
              <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="_ne_ol_vd_pl">
                  <div style="background-image:url({{ URL::asset('storage/'.$type->photo) }});" class="_ne_ol_vd_pr">
                  </div>
                  <h2>{{$type->name}}</h2>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </section>

    <!-- ========================================SERVICESS>>>END======================================== -->
    <!-- ======================================TEAM>>>START====================================== -->

    <section class="_bd_we_xs_qw">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_hg_we_fe">
              <h2>Our Lawyers<span></span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="_mn_cd_we_vd">
              <div class="owl-carousel owl-theme">
                  @foreach($lawyer_list as $lawyer)
                    <a href="#">
                        <div class="item">
                            <div class="_mn_sd_we">
                              <div class="_cs_we_sd">
                                <img src="{{ URL::asset('storage/'.$lawyer->photo) }}">
                              </div>
                              <div class="_xs_we_zs">
                                <h3>{{$lawyer->name}}</h3>
                              </div>
                            </div>
                        </div>
                    </a>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======================================TEAM>>>END====================================== -->
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
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items:3,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })
          </script>

    <script>
      $('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          nav:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:4
              }
          }
})
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
