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

    <title>Issues</title>
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
                <li>Issues</li>
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
              <h2>Issues<span></span></h2>
            </div>
          </div>
        </div>
	<div class="row">
		<!-- BEGIN TICKET -->
		<div class="col-md-9">
			<div class="grid support-content">
				 <div class="grid-body">
					 <!-- BEGIN TICKET CONTENT -->
						<div class="col-md-12">
							<ul class="list-group fa-padding">
                                @forelse($issues as $issue)
                                    <a href="{{route('issue',['id'=>$issue -> id])}}">
                                    <li href="{{route('issue',['id' => $issue -> id])}}" class="list-group-item" data-toggle="modal" data-target="#issue">
                                        <div class="media">
                                            <div class="media-body">
                                                <strong>{{$issue -> title}}</strong>
                                                <span class="number pull-right">
                                                    @if($issue -> issue_finished == 1)
                                                        Issue Finished
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    </a>
                                @empty
                                    <p>No Issues</p>
                                @endforelse
							</ul>
						</div>
						<!-- END DETAIL TICKET -->
				</div>
			</div>
						<!-- END TICKET CONTENT -->
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
