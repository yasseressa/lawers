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
	<link href="{{URL::asset('assets/css/posts.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/comments.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/all.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/bootstrap.min (2).css')}}" rel="stylesheet">

    <title>Users</title>
  </head>
  <body>
    <header>
            <nav>
              <div class="logo">
                  <img src="{{URL::asset('assets/images/logo.png')}}">
              </div>
              <div class="my-nav">
                <div class="menu">
                  <ul>
					<li><a href="index.html">Logout</a></li>
                  </ul>
                </div>
              </div>
            </nav>
    </header>


    <!-- ====================================CONTACT>>>START==================================== -->


    <section id="contact" class="_mn_uy_we">
		<div class="container">
		<div class="row">
			  <div class="col-12">
				<div class="_hg_we_fe">
				  <h2>Users<span></span></h2>
				</div>
			  </div>
		</div>

            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif

            @if(Session::has('del_success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('del_success')}}
                </div>
            @endif
		<form method="POST" action="{{route('users.store')}}">

            @csrf
			<div class="form-floating mb-3">
				<input type="text" name="name" class="form-control" id="floatingName" placeholder="Ahmad Ahmad" required>
				<label for="floatingName">Name</label>
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
			</div>
			<div class="form-floating mb-3">
				<input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
				<label for="floatingEmail">Email address</label>
                @error('email')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
			</div>
			<div class="form-floating mb-3">
				<input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
				<label for="floatingPassword">Password</label>
                @error('password')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
			</div>
			<div class="form-floating mb-3">
				  <select name="role_id" id="floatingRole">
					<option value="2">Lawyer</option>
					<option value="3">User</option>
				  </select>
                <label for="floatingRole"></label>
			</div>
            <button type="submit" class="btn" style="background-color: #56db4b;">Add New User</button>
		</form>


			<table class="table">
				<thead>
					<tr>
						<th scope="col">Type</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Password</th>
					</tr>
				</thead>
				<tbody>
                @forelse($list_user as $user)
                    <tr>
                        <td>{{$user->role_id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>
                            <a href="{{url('users/delete/'.$user -> id)}}" class="btn btn-danger">Del</a>
                        </td>
                    </tr>
                @empty
                    <p>No users</p>
                @endforelse
				</tbody>
			</table>

		</div>
		<!-- END TICKET -->
	</section>

    <!-- ====================================CONTACT>>>END==================================== -->

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
