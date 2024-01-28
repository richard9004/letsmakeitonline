@extends('auth.adminpages.master')

@section('title', 'Edit Sub Category')




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
                            <h4>Edit Sub Category</h4>
                           
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listing-tools-subcategories') }}">Sub Categories</a></li>
                            <li class="breadcrumb-item active">Edit Sub Category</li>
                        </ol>
                    </div>

                    
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit sub category here</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                <form id="edit-tool-subcategory-form" action="{{ route('update_tool_subcategory', ['id' => $toolSubCategory->id]) }}" method="post">
    @csrf
    @method('PUT') {{-- Use the PUT method for updates --}}

    <div class="row">
        <div class="col-xl-10">
            <!-- Existing display title -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="display_title">Display Title <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="display_title" name="display_title" placeholder="Enter Display Title" value="{{ old('display_title', $toolSubCategory->display_title) }}">
                </div>
            </div>

            <!-- Existing display description -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="display_description">Display Description <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="display_description" name="display_description" placeholder="Enter Display Description" value="{{ old('display_description', $toolSubCategory->display_description) }}">
                </div>
            </div>

            <!-- Existing route -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="route">Route <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="route" name="route" placeholder="Enter Route" value="{{ old('route', $toolSubCategory->route) }}">
                </div>
            </div>

            <!-- Existing meta title -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="meta_title">Meta Title <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title" value="{{ old('meta_title', $toolSubCategory->meta_title) }}">
                </div>
            </div>

            <!-- Existing meta description -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="meta_description">Meta Description <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description" value="{{ old('meta_description', $toolSubCategory->meta_description) }}">
                </div>
            </div>

            <!-- Existing category (tool_category_id) -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="tool_category_id">Category <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <select class="form-control" name="tool_category_id">
                        <option value="" selected disabled>Select Category</option>
                        @foreach ($toolCategories as $toolCategory)
                            <option value="{{ $toolCategory->id }}" {{ $toolSubCategory->tool_category_id == $toolCategory->id ? 'selected' : '' }}>
                                {{ $toolCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Existing home page visibility -->
            <div class="form-group row">
                <label class="col-lg-4 col-form-label"><a href="javascript:void()">Home Page Visibility</a> <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <label class="css-control css-control-primary css-checkbox" for="home_page_visibility">
                        <input type="checkbox" class="css-control-input mr-2" id="home_page_visibility" name="home_page_visibility" value="1" {{ $toolSubCategory->home_page_visibility ? 'checked' : '' }}>
                        <span class="css-control-indicator"></span> Sub Category will be visible on Home Page
                    </label>
                </div>
            </div>

            <!-- Submit button -->
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

      
        @endsection

        
