<header>
      <div class="header-wrapper">
        <div class="container">
          <div class="row">
            <nav>
              <div class="logo">
                <a href="{{route('home')}}">
                  <img src="{{URL::asset('assets/images/logo.png')}}">
                </a>
              </div>
              <div class="menu-toggle"></div>
              <div class="my-nav">
                <div class="menu">
                  <ul>
                      @if(Session::has('user'))
                          <li><a href="/">Home</a></li>
                          <li><a href="{{route('posts')}}">Your Posts</a></li>
                          <li><a href="{{route('issues')}}">Your Issues</a></li>
                          <li><a href="{{route('about')}}">About Us</a></li>
                          <li><a href="{{route('contact')}}">Contact Us</a></li>
                          <li><a href="{{route('profile')}}">Profile</a></li>
                          <li><a href="{{route('lawyers')}}">Lawyers</a></li>
                          <li><a href="{{route('logout')}}">Logout</a></li>
                      @else
                          <li><a href="{{route('home')}}">Home</a></li>
                          <li><a href="{{route('about')}}">About Us</a></li>
                          <li><a href="{{route('contact')}}">Contact Us</a></li>
                          <li><a href="{{route('login')}}">Login</a></li>
                      @endif
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
