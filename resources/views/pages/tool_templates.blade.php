@extends('layouts.app')

@section('title', $toolData[0]->subcategoryDisplayTitle)

@section('content')
<section id="pricing" class="pricing">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          
            @if ($toolData->isNotEmpty() && isset($toolData[0]->categoryDisplayTitle))
            <h2>{{$toolData[0]->subcategoryDisplayTitle}}</h2>
        @endif
        @if ($toolData->isNotEmpty() && isset($toolData[0]->categoryDisplayDesc))
        <p>{{$toolData[0]->subcategoryDisplayDesc}}</p>
        @endif
        </div>

        <div class="row">
        
        @foreach ($toolData as $tool)
            <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="box">
                    <h3>{{$tool->display_title}}</h3>
                    
                    <img src="{{ asset('storage/app/' . $tool->preview_image) }}" alt="{{$tool->display_title}}" class="template-image" style="width: 100%; height: 500px;">
                    <a href="{{ url('tools/' . $tool->categoryRoute.'/'.$tool->subCategoryRoute.'/'.$tool->route) }}" class="buy-btn">Customize and Download</a>
                </div>
            </div>

            @endforeach

           
        </div>

    </div>
</section>


    @endsection