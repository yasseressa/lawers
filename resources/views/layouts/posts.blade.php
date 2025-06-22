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

    <title>Posts</title>
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
                <li>Posts</li>
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
              <h2>Posts<span></span></h2>
            </div>
          </div>
        </div>
            @if(Session::has('add_success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('add_success')}}
                </div>
            @endif
        <div class="row">
            <div class="col-md-9">
                <div class="grid support-content">
                        <div class="col-lg-4 col-12" style="width:100%">
                            @if($not_law == '')
                                <form id="form1" method="post" action="{{route('add_post')}}">
                                    @csrf
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                      <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" name="title" class="form-control required" placeholder="Enter Title" aria-required="true"></textarea>
                                            @error('title')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                            <br/>
                                            <label for="contents">Content</label>
                                            <textarea id="contents" name="contents" class="form-control required" rows="5" placeholder="Enter Content" aria-required="true"></textarea>
                                            @error('contents')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                      </div>
                                      <div class="col-12">
                                        <div class="btn-02">
                                          <a onclick="document.getElementById('form1').submit()">
                                              <span>Add</span>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                </form>
                            @endif
                            <div class="_lk_rt_we">
                              <div class="_oi_yt_we">
                                <div class="accordion" id="nu_kl">
                                    @forelse($posts_list as $post)
                                  <div class="card">
                                    <div class="card-header" id="mo_yu">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#my-ss_{{$post->id}}" aria-expanded="false" aria-controls="my-ss_{{$post->id}}">
                                            {{$post -> title}}
                                        </button>
                                      </h2>
                                    </div>

                                    <div id="my-ss_{{$post->id}}" class="collapse" aria-labelledby="mo_yu" data-parent="#nu_kl">
                                      <div class="card-body">
                                          <div class="d-flex flex-row comment-user">
                                      <img src="{{ URL::asset('storage/'.$post->photo) }}" class="rounded" width="40">
                                          <div class="ml-2">
                                              <div class="d-flex flex-row align-items-center">
                                                  <span class="name font-weight-bold">{{$post -> name}} </span>
                                              </div>
                                          </div>
                                          </div>
                                      <!--<button type="button" class="btn btn-success btn-sm">Select</button>-->
                                        <p>{{$post -> contents}}.</p>
                                        <div class="container mt-5 mb-5">
                                        <div class="d-flex row">
                                            <div class="d-flex flex-column">
                                                <div class="coment-bottom bg-white p-2 px-4">
                                                    <form id="form2" method="post" action="{{route('add_reply')}}">
                                                        @csrf
                                                        @if($not_law == 'law')
                                                    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                                                        <img src="{{ URL::asset('storage/'.Session::get('user')[0]->photo) }}" class="img-fluid img-responsive rounded-circle mr-2" width="38">
                                                        <input type="text" name="contents" required class="form-control mr-3" placeholder="Add comment">
                                                        @error('contents')
                                                        <small class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                        <input type="hidden" name="post_id" class="form-control mr-3" value="{{$post->id}}">
                                                        <button class="btn btn-primary" type="submit">Comment</button>
                                                    </div>
                                                            @endif
                                                    </form>
                                                    @forelse($replys_list as $reply)
                                                        @if($reply -> post_id == $post -> id)
                                                    <div class="container">
                                                        <div class="d-flex row">
                                                            <div>
                                                                <div class="p-3 bg-white rounded">
                                                                    <div class="review mt-4">
                                                                        <div class="d-flex flex-row comment-user">
                                                                            <img class="rounded" src="{{ URL::asset('storage/'.$reply->photo) }}" width="40">
                                                                            <div class="ml-2">
                                                                                <div class="d-flex flex-row align-items-center">
                                                                                    <span class="name font-weight-bold">{{$reply -> name}} </span>
                                                                                </div>
                                                                                Rating
                                                                                @for($x=0; $x<$reply -> rate;$x++)
                                                                                    <span class="fa fa-star checked"></span>
                                                                                @endfor
                                                                            </div>
                                                                            <div class="comment-footer">
                                                                                @if($not_law == '')
                                                                                    <form id="form3" method="post" action="{{route('select_lawyer')}}">
                                                                                        @csrf
                                                                                        <input name="post_id" type="hidden" value="{{$reply->post_id}}"/>
                                                                                        <input name="lawyer_id" type="hidden" value="{{$reply->lawyer_id}}"/>
                                                                            <button type="submit" class="btn btn-success btn-sm">Select</button>
                                                                                    </form>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-2">
                                                                            <p class="comment-text">{{$reply -> contents}}.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        @endif
                                                    @empty
                                                        <p>No Reply Yet</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                    @empty
                                        <p>No Posts For You</p>
                                    @endforelse
                                </div>
                              </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
		<!-- END TICKET -->
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
