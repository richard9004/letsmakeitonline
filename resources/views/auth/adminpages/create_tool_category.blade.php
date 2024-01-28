@extends('auth.adminpages.master')

@section('title', 'Create New Category')




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
                            <h4>Add New Tool Category</h4>
                           
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listing-tools-categories') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Create New Category</li>
                        </ol>
                    </div>

                    
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create new category here</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form id="create-tool-category-form" action="{{ route('save_tools_category') }}" method="post"> 
                                    @csrf
                                        <!--  action="#" method="post" -->
                                        <div class="row">
                                            <div class="col-xl-10">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="name">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Tool Name">
                                                    </div>
                                                </div>
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
                                                    <label class="col-lg-4 col-form-label" for="val-email">Tool Icon <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="tool_icon" name="tool_icon" placeholder="Tool Icon">
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
                                                    <label class="col-lg-4 col-form-label"><a
                                                            href="javascript:void()">Home Page Visibility</a> <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <label class="css-control css-control-primary css-checkbox" for="home_page_visibility">
                                                            <input type="checkbox" class="css-control-input mr-2"
                                                                id="home_page_visibility" name="home_page_visibility" value="0">
                                                            <span class="css-control-indicator"></span> Category will be visible on Home Page</label>
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

      
        @endsection

        
