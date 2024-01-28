@extends('layouts.app')

@section('title', 'Home - LetsMakeItOnline')

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Free online tools to empower you.</h1>
          <h2>Access free, online tools for resumes, calculations, and more.</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#services" class="btn-get-started scrollto">Explore</a>
           
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

   

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
            Our online tools are designed to be easy to use and affordable. We offer a wide range of tools, including
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Create Your Resumes Online</li>
              <li><i class="ri-check-double-line"></i> Online Calculators</li>
              <li><i class="ri-check-double-line"></i> Invoice Manager</li>
            </ul>
           
          </div>

          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            Welcome to LetsMakeItOnline, your one-stop shop for online tools that can make your life easier. Whether you are looking for tools to help you with your work, your personal life, or your education, we have you covered.
            </p>
            <p>We are constantly adding new tools to our library, so be sure to check back often.</p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

  
   

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tools</h2>
          <p>
           Explore a diverse range of online tools and resources to enhance your life in every aspect.</p>
        </div>

        <div class="row">
        @foreach($toolCategories as $toolCategory)
    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
            <div class="icon">{!! $toolCategory->tool_icon !!}</div>
            <h4><a href="{{ 'tools/'.$toolCategory->route }}">{{ $toolCategory->name }}</a></h4>
            <p>{{ $toolCategory->display_description }}</p>
        </div>
    </div>
@endforeach

       

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>For any queries, feel free to reach out to us at.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Galway, Ireland</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>getintouch@letsmakeitonline.com</p>
              </div>

             

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d76329.91282299467!2d-9.131147077214715!3d53.28398573518928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485b96eca4f63c15%3A0x9f202f408ade89a3!2sGalway%20City%2C%20Galway%2C%20Ireland!5e0!3m2!1sen!2sin!4v1703140111722!5m2!1sen!2sin" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
       


             <form action="{{ route('contact-form') }}" method="post" role="form" class="php-email-form" id="ajax-form">
              @csrf
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="button" id="submitBtn" class="btn-send-message">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection