      <!-- ======= Header ======= -->
      <header id="header">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route ('home')}}" class="logo me-auto"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route ('home')}}">Home</a></li>
          @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'home')
            <li><a class="nav-link scrollto" href="#about">About</a></li>
          @endif
          <li><a class="nav-link scrollto" href="{{ route ('tools')}}">Tools</a></li>
        
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'home')
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#services">Get Started</a></li>
          @endif
        
        
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->