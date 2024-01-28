@extends('layouts.app')

@section('title', $toolData->meta_title)
@section('meta-description', $toolData->meta_description)


@section('content')
@push('custom-css')
{!! $toolData->css !!}
@endpush
@push('template-css')
<style>
     /* Additional styles for the header */
     .section-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .download-btn {
            display: inline-block;
            margin-right: 10px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #37517e; /* Set your desired background color */
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .download-btn i {
            margin-right: 5px;
        }

        .editable-message {
            font-size: 14px;
            color: #888;
            margin-top: 10px;
        }


</style>
@endpush

<section>
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h1>{{$toolData->display_title}}</h1>
                <p>{{$toolData->display_description}}</p>
                <div class="editable-message">
                    <i class="fa fa-pencil"></i> This template is editable. Click on the content to customize.
                </div>
            </div>

            <div class="section-header">
                <a href="#" class="download-btn" id="downloadDocx">
                    <i class="fa fa-download"></i> Download to PDF
                </a>
              
            </div>

            <div class="row">
                {!! $toolData->html_content !!}
            </div>

        </div>

        <form id="export-form" style="display:none" method="post"  action="{{ route('export-docx') }}">
        @csrf
             <input type="hidden" id="html_content" name="html_content"/>
             <input type="hidden" id="css_content" name="css_content" value="{{ addslashes($toolData->css) }}">

        </form>
    </section>

    @push('custom-scripts')
        {!! $toolData->script !!}
        <script>
    $(document).ready(function () {
        // Attach a click event listener to the downloadDocx button
        $('#downloadDocx').click(function () {
            // Get the HTML content of the downloadDiv
            $('.add-button').css('display', 'none');
            var htmlContent = $('.downloadDiv').html();
           $('#html_content').val(htmlContent);
           
           $('.add-button').css('display', 'block');
           
//
          $('#export-form').submit();
        });
    });
</script>
 

    @endpush
    @push('template-scripts')

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('.h1, .h2, .h3, .h4, .h5, .h6, .p'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl, {
        title: 'This element is editable',
        placement: 'top',
      });
    });
  });

  
</script>





    @endpush
    

@endsection