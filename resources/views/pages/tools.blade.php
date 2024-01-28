@extends('layouts.app')

@section('title', 'Tools - LetsMakeItOnline')

@section('content')
<section id="pricing" class="pricing">
      <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="section-title">
  <h2>Tools</h2>
  <p>Empower your workflow with innovative solutions tailored for seamless efficiency and optimal performance.</p>
</div>

        <div class="row">
         
          @foreach ($toolCategories as $toolCategory)

           
          <div class="col-lg-4 aos-init aos-animate mt-3" data-aos="fade-up" data-aos-delay="100">
            <div class="box featured">
              <h3>{{$toolCategory->display_title}}</h3>
              <p>{{$toolCategory->display_description}}</p>
              <a href="{{ url('tools/' . $toolCategory->route) }}" class="buy-btn">Get Started</a>
            </div>
          </div>
          @endforeach
       

        </div>

      </div>
    </section>

    @endsection