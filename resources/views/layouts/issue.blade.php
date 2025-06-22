<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/owl.carousel.min.cssv')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/layers.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/posts.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/comments.css')}}" rel="stylesheet">

    <title>Issue</title>
  </head>
  <body>

  @include('includes.header');

    <section class="_cd_er_aq">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_cd_er_aa">
              <ol>
                <li>Home</li>
                <li>Issue</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ====================================CONTACT>>>START==================================== -->


    <section id="contact" class="_mn_uy_we">
		<div class="container">
			<div class="row">
			  <div class="col-12">
				<div class="_hg_we_fe">
				  <h2>Issue<span></span></h2>
				</div>
			  </div>
			</div>
            @if(Session::has('finished'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('finished')}}
                </div>
            @endif
            @if($issue -> issue_finished == 1)
                <div class="alert alert-heading" role="alert">
                    Issue Finished
                </div>
            @endif
            <form method="post" action="{{route('issue_finish',['id' => $issue -> id])}}">
                @csrf
                <div>
                    <h4>{{$issue -> title}}</h4>
                    <p>{{$issue -> contents}}</p>
                    <img src="{{ URL::asset('storage/'.$issue->photo) }}" class="img-fluid img-responsive rounded-circle mr-2" width="38">
                    @if($role == '2')
                        <p>The Agent : {{$issue -> name}}</p>
                    @else
                        <p>Taken By Lawyer: {{$issue -> name}}</p>
                        <p><button type="submit" class="btn btn-primary">Click To Finish</button></p>
                    @endif
                </div>
            </form>
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
