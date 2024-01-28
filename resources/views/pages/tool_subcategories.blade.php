@extends('layouts.app')

@section('title', 'Tools - LetsMakeItOnline')

@section('content')
<section id="pricing" class="pricing">
 <?php if($subcategoryData->isNotEmpty() && isset($subcategoryData[0]->categoryDisplayTitle)){ ?>
      <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="section-title">
      @if ($subcategoryData->isNotEmpty() && isset($subcategoryData[0]->categoryDisplayTitle))
            <h2>{{ $subcategoryData[0]->categoryDisplayTitle }}</h2>
        @endif
        @if ($subcategoryData->isNotEmpty() && isset($subcategoryData[0]->categoryDisplayDesc))
        <p>{{$subcategoryData[0]->categoryDisplayDesc}}</p>
        @endif
    </div>

        <div class="row">
        @foreach ($subcategoryData as $subcategory)
          <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="box featured">
              <h3>{{$subcategory->display_title}}</h3>
              <p>{{$subcategory->display_description}}</p>
              <a href="{{ url('tools/' . $subcategory->categoryRoute.'/'.$subcategory->route) }}" class="buy-btn">Get Started</a>
              <!-- <a href="{{ route ('nhs-cv-templates')}}" class="buy-btn">Get Started</a> -->
            </div>
          </div>
          @endforeach
       
        </div>

      </div>

      <?php }else{ ?>
        <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
    
         <h2>No Subcategories found</h2>
       </div>

       <div class="row">
  <div class="col-12 text-center">
    <p class="mx-auto">Subcategories coming soon...</p>
  </div>
</div>


      </div>
       <?php } ?> 
 </section>

@endsection