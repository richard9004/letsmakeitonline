@extends('auth.adminpages.master')

@section('title', 'Edit Tool')




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
                            <h4>Edit Tool</h4>
                           
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listing-tools') }}">Tools</a></li>
                            <li class="breadcrumb-item active">Edit Tool</li>
                        </ol>
                    </div>

                    
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit tool</h4>
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

<form id="edit-tool" action="{{ route('update_tool', $tool->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Use PUT method for updating data -->

    <div class="row">
        <div class="col-xl-10">

            <!-- Display Title -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="display_title">Display Title <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="display_title" name="display_title" placeholder="Enter Display Title" value="{{ old('display_title', $tool->display_title) }}">
                </div>
            </div>

            <!-- Display Description -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="display_description">Display Description <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="display_description" name="display_description" placeholder="Enter Display Description" value="{{ old('display_description', $tool->display_description) }}">
                </div>
            </div>

            <!-- Route -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="route">Route <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="route" name="route" placeholder="Enter Route" value="{{ old('route', $tool->route) }}">
                </div>
            </div>

            <!-- Meta Title -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="meta_title">Meta Title <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title" value="{{ old('meta_title', $tool->meta_title) }}">
                </div>
            </div>

            <!-- Meta Description -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="meta_description">Meta Description <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description" value="{{ old('meta_description', $tool->meta_description) }}">
                </div>
            </div>

            <!-- Category -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="tool_category_id">Category <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <select class="form-control" name="tool_category_id">
                        <option value="" selected disabled>Select Category</option>
                        @foreach ($toolCategories as $toolCategory)
                            <option value="{{ $toolCategory->id }}" {{ $toolCategory->id == $tool->tool_category_id ? 'selected' : '' }}>{{ $toolCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Sub Category -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="tool_subcategory_id">Sub Category <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <select class="form-control" name="tool_subcategory_id">
                        <option value="" selected disabled>Select Sub Category</option>
                        @foreach ($toolSubCategories as $toolSubCategory)
                            <option value="{{ $toolSubCategory->id }}" {{ $toolSubCategory->id == $tool->tool_subcategory_id ? 'selected' : '' }}>{{ $toolSubCategory->display_title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- HTML Content -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="html_content">HTML Content <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <textarea class="form-control" rows="4" name="html_content" id="html_content" placeholder="HTML Content">{{ old('html_content', $tool->html_content) }}</textarea>
                </div>
            </div>

            <!-- CSS -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="css">CSS <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <textarea class="form-control" rows="4" name="css" id="css" placeholder="CSS Content">{{ old('css', $tool->css) }}</textarea>
                </div>
            </div>

            <!-- Script -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="script">Script <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <textarea class="form-control" rows="4" name="script" id="script" placeholder="Script Content">{{ old('script', $tool->script) }}</textarea>
                </div>
            </div>

            <!-- Preview Image -->
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
                    <!-- Display existing image if available -->
                    @if($tool->preview_image)
                        <img src="{{ asset('storage/app/' . $tool->preview_image) }}" alt="Preview Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @endif
                </div>
            </div>

            <!-- Home Page Visibility -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label"><a href="javascript:void()">Home Page Visibility</a> <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <label class="css-control css-control-primary css-checkbox" for="home_page_visibility">
                        <input type="checkbox" class="css-control-input mr-2" id="home_page_visibility" name="home_page_visibility" value="1" {{ $tool->home_page_visibility ? 'checked' : '' }}>
                        <span class="css-control-indicator"></span> Tool will be visible on Home Page</label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
                <div class="col-lg-8 ml-auto">
                    <button type="submit" class="btn btn-primary">Update</button>
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

        
