@extends('auth.adminpages.master')

@section('title', 'Create Tool')




    <!-- Your dashboard content goes here -->

    @section('sidebar')
        @include('auth.adminpages.includes.sidebar')
        @endsection

@section('content')
<div class="content-body">
            <div class="container-fluid">


                <!-- row --> 
            <div class="row page-titles mx-0">
            
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add New Tool</h4>
                           
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listing-tools') }}">Tools</a></li>
                            <li class="breadcrumb-item active">Create New Tool</li>
                        </ol>
                    </div>

                    
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create new tool</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="save-tool" action="{{ route('save_tool') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <!--  action="#" method="post" -->
                                        <div class="row">
                                            <div class="col-xl-10">
                                                
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="display_title">Display Title <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="display_title" name="display_title" placeholder="Enter Display Title">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="display_description">Display Description <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="display_description" name="display_description" placeholder="Enter Display Description">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Route <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="route" name="route" placeholder="Enter Route">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Meta Title <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Meta Description <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Category <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
    <select class="form-control" name="tool_category_id">
        <option value="" selected disabled>Select Category</option>
        @foreach ($toolCategories as $toolCategory)
            <option value="{{ $toolCategory->id }}">{{ $toolCategory->name }}</option>
        @endforeach
    </select>
</div>

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Sub Category <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
    <select class="form-control" name="tool_subcategory_id">
        <option value="" selected disabled>Select Sub Category</option>
        @foreach ($toolSubCategories as $toolCategory)
            <option value="{{ $toolCategory->id }}">{{ $toolCategory->display_title }}</option>
        @endforeach
    </select>
</div>

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="html_content">HTML Content <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <textarea class="form-control" rows="4" name="html_content" id="html_content" placeholder="HTML Content"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="html_content">CSS <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <textarea class="form-control" rows="4" name="css" id="css" placeholder="CSS Content"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="html_content">Script <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                    <textarea class="form-control" rows="4" name="script" id="script" placeholder="Script Content"></textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="preview_image">Preview Image <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" name="preview_image" class="custom-file-input" id="previewImageInput" onchange="updateFileName()">
                <label class="custom-file-label" id="previewImageLabel">Choose file</label>
            </div>
        </div>
        <small id="previewImagePath" class="form-text text-muted"></small>
    </div>
</div>



                                                
                                               
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label"><a
                                                            href="javascript:void()">Home Page Visibility</a> <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <label class="css-control css-control-primary css-checkbox" for="home_page_visibility">
                                                            <input type="checkbox" class="css-control-input mr-2"
                                                                id="home_page_visibility" name="home_page_visibility" value="0">
                                                            <span class="css-control-indicator"></span> Tool will be visible on Home Page</label>
                                                    </div>
                                                </div>


                                              


                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                              
                                             
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

             
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <script>
    function updateFileName() {
        var input = document.getElementById('previewImageInput');
        var label = document.getElementById('previewImageLabel');
        var pathDisplay = document.getElementById('previewImagePath');

        if (input.files.length > 0) {
            label.innerText = input.files[0].name;
            pathDisplay.innerText = "File Path: " + input.files[0].name;
        } else {
            label.innerText = 'Choose file';
            pathDisplay.innerText = '';
        }
    }
</script>
        @endsection

        
