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
      <link href="{{URL::asset('assets/css/lawyer.css')}}" rel="stylesheet">


    <title>Lawyers</title>
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
                <li>Lawyers</li>
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
						<h2>Lawyers<span></span></h2>
					</div>
				</div>
			</div>

			<div>
                @error('rate')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                <table data-toggle="table"  data-search="true" data-striped="true">
                    <thead>
                    <tr>
                        <th data-field="Photo">Photo</th>
						<th data-field="Name">Name</th>
						<th data-field="Email">Email</th>
                        <th data-field="exp">Experience Year</th>
						<th data-field="Rating">Rating</th>
                    </tr>
					</thead>
                    <tbody>
                    @forelse($list_lawyer as $lawyer)
                        <tr>
                            <td>
                                <img src="{{ URL::asset('storage/'.$lawyer->photo)}}" class="img-fluid img-responsive rounded-circle mr-2" width="38">
                            </td>
                            <td>{{$lawyer->name}}</td>
                            <td>{{$lawyer->email}}</td>
                            <td>{{$lawyer->exp_years}}</td>
                            <td>
                                @for($x=0; $x<$lawyer->rate;$x++)
                                    <span class="fa fa-star checked"></span>
                                @endfor
                                @if(Session::get('user')[0]->role_id == 3)
                                <button value="Rate" id="{{$lawyer->id}}" onclick="rateFun(this.id)">Rate</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div id="id01" class="modal">
            <form class="modal-content animate" action="{{route('rate_lawyer')}}" method="post">
                @csrf
                <div class="container">
                    <label for="rate"><b>Enter Number</b></label>
                    <input class="number form-text" type="number" min="0" max="5" placeholder="0" name="rate" required>
                    <button type="submit">Send</button>
                    <input type="hidden" name="lawyerId" id="lawyerId" value="">
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
	<script src="{{URL::asset('assets/js/bootstrap-table.min.js')}}"></script>

  <script>
      // Get the modal
      var modal = document.getElementById('id01');
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
      function rateFun(id){
          document.getElementById('id01').style.display='block';
          document.getElementById('lawyerId').value = id;
      }
  </script>

  </body>
</html>
