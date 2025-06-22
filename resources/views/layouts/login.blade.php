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
	<link href="{{URL::asset('assets/css/all.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/bootstrap.min (2).css')}}" rel="stylesheet">

    <title>Login</title>
  </head>
  <body>

  @include('includes.header')

    <section class="_cd_er_aq">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_cd_er_aa">
              <ol>
                <li>Home</li>
                <li>Login</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ====================================CONTACT>>>START==================================== -->


    <section id="contact" class="_mn_uy_we">
      <div class="container">
		<div class="container">
				<div class="row">
				  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
					<div class="card border-0 shadow rounded-3 my-5">
					  <div class="card-body p-4 p-sm-5">
						<h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
                          @if(Session::has('auth_fail'))
                              <h5 class="alert alert-danger" role="alert">
                                  {{Session::get('auth_fail')}}
                              </h5>
                          @endif
                          @if(Session::has('signup_success'))
                              <h5 class="alert alert-success" role="alert">
                                  {{Session::get('signup_success')}}
                              </h5>
                          @endif
						<form method="post" action="{{route('post_login')}}">
                            @csrf

						  <div class="form-floating mb-3">
							<input type="email" name="email" class="form-control" required id="floatingInput" placeholder="name@example.com">
							<label for="floatingInput">Email address</label>
						  </div>
						  <div class="form-floating mb-3">
							<input type="password" name="password" class="form-control" required id="floatingPassword" placeholder="Password">
							<label for="floatingPassword">Password</label>
						  </div>

						  <div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
							<label class="form-check-label" for="rememberPasswordCheck">
							  Remember password
							</label>
						  </div>
						  <div class="d-grid">
							<button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Login</button>
							<br/>
							<a href="{{route('signup')}}">Sign up</a>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
			</div>
        </div>
      </div>
    </section>

    <!-- ====================================CONTACT>>>END==================================== -->

    <!-- ====================================FOOTER>>>STARTED==================================== -->
    @include('includes.footer')
    <!-- ====================================FOOTER>>>END==================================== -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

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
