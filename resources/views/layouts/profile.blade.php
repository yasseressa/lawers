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

    <title>Profile</title>
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
                <li>Profile</li>
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
            <div class="main-body">
              <!-- /Breadcrumb -->
            @if(Session::has('edit_success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('edit_success')}}
                </div>
            @endif
            @if(Session::has('edit_fail'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('edit_fail')}}
                    </div>
            @endif
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <form method="post" action="{{route('edit_profile')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="{{ URL::asset('storage/'.$user[0]->photo) }}" alt="Photo" class="rounded-circle" width="150">
                                                <div class="mt-3">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="file" value="{{ URL::asset('storage/'.$user[0]->photo) }}" name="file"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" value="{{$user[0]->name}}" name="name" class="form-control" id="floatingName" placeholder="Ahmad Ahmad" required>
                                <label for="floatingName">Name</label>
                                @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" value="{{$user[0]->age}}" name="age" min="0" max="100" class="form-control" id="floatingAge" placeholder="25">
                                <label for="floatingAge">Age</label>
                                @error('age')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" value="{{$user[0]->address}}" name="address" class="form-control" id="floatingAddress" placeholder="KSA">
                                <label for="floatingAddress">Address</label>
                                @error('address')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" value="{{$user[0]->email}}" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                                <label for="floatingEmail">Email address</label>
                                @error('email')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @if(Session::get('user')[0]->role_id == 2)
                                <div class="form-floating mb-3">
                                    <input type="number" value="{{$user[0]->exp_years}}" name="exp" min="0" max="100" class="form-control" id="floatingExp" placeholder="0" required>
                                    <label for="floatingExp">Experience Years</label>
                                    @error('exp')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" value="{{$user[0]->graduate_date}}" name="g_date" class="form-control" id="floatingDate" placeholder="1-1-2000" required>
                                    <label for="floatingDate">Experience Years</label>
                                    @error('g_date')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            @endif
                            <div class="form-floating mb-3">
                                <input type="password" value="" name="password" class="form-control" id="floatingPassword" placeholder="Password" >
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" value="" name="confirm" class="form-control" id="floatingConfirm" placeholder="Password">
                                <label for="floatingConfirm">Confirm Password</label>
                                @error('password')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary " type="submit">Edit</button>
                            </div>
                        </form>
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
