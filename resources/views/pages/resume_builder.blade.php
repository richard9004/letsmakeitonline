@extends('layouts.app')

@section('title', 'Tools - LetsMakeItOnline')

@section('content')
<section id="pricing" class="pricing">
      <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="section-title">
  <h2>Resume Builder</h2>
  <p>Empower your career journey with our intuitive Resume Builder. Create a professional and polished resume effortlessly, showcasing your skills and experience.</p>
</div>

        <div class="row">

          <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="box featured">
              <h3>NHS CV Templates</h3>
              <p>Explore our comprehensive NHS CV templates designed to cater to various roles within the healthcare sector, including doctors, nurses, and healthcare assistants. Crafted with precision, our templates ensure a professional and impactful representation of your skills and experience. Choose from a variety of formats, such as Word documents, and elevate your application to the National Honor Society with a resume that stands out. Whether you're a medical professional or an aspiring NHS member, our templates offer a low-cost, efficient solution to enhance your chances of success. Download now and take the first step toward securing your desired position or membership.</p>
              <a href="{{ route ('nhs-cv-templates')}}" class="buy-btn">Get Started</a>
            </div>
          </div>

       
        </div>

      </div>
 </section>

@endsection