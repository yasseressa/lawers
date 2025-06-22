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

    <title>Contact Us</title>
  </head>
  <body>

  @include('includes.header')

    <section class="_cd_er_aq">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_cd_er_aa">
              <h2>Contact Us</h2>
              <ol>
                <li>Home</li>
                <li>Contact Us</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ====================================CONTACT>>>START==================================== -->

  <form id="form1" method="post" action="{{route('complaint')}}">
      @csrf
    <section id="contact" class="_mn_uy_we">
      <div class="container">
          @if(Session::has('fail'))
              <div class="alert alert-danger" role="alert">
                  {{Session::get('fail')}}
              </div>
          @endif
          @if(Session::has('success'))
              <div class="alert alert-success" role="alert">
                  {{Session::get('success')}}
              </div>
          @endif
        <div class="row">
          <div class="col-12">
            <div class="_hg_we_fe">
              <h2>Get<span>In Touch</span></h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="_cd_er_we_zs">
              <ol>
                <li>OUR OFFICE LOCATION
                  <p>#011,Streen, Riyadh, KSA</p>
                </li>
              </ol>
            </div>

            <div class="_cd_er_we_zs _nd_er_io">
              <ol>
                <li>OUR CONTACT NUMBER
                  <p>+966 123456789</p>
                </li>
              </ol>
            </div>

            <div class="_cd_er_we_zs _nd_er">
              <ol>
                <li>OUR CONTACT E-MAIL
                  <p>support@honestlawyer.com</p>
                </li>
              </ol>
            </div>
          </div>
          <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
            <h3 class="_lk_iu_ew">Add Complaint</h3>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea id="message" name="message" class="form-control required" required rows="5" placeholder="Enter Message" aria-required="true"></textarea>
                    @error('message')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
              </div>
			  <div class="col-12">
                <div class="form-group">
				  <a href="{{route('login')}}">You Must Loged in</a>
                </div>
              </div>
              <div class="col-12">
                <div class="btn-02">
                  <a onclick="document.getElementById('form1').submit();"><span>Submit</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>

    <!-- ====================================CONTACT>>>END==================================== -->
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
