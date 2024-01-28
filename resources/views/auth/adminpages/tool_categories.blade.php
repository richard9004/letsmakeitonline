@extends('auth.adminpages.master')

@section('title', 'Tools')




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
                            <h4>Categories</h4>
                           
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>

                    
                </div>
               


                
                <div class="row">
               
                <div class="col-lg-12">
                @if(session('success'))
    

    <div class="alert alert-success alert-dismissible alert-alt solid fade show">
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                    {{ session('success') }}
                                </div>
@endif
                        <div class="card">
                   


                            <div class="card-header">
                                <h4 class="card-title">Categories Listing</h4>
                                <a class="btn btn-primary" href="{{ route('create-tool-category') }}">Create New Category</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-text-color table table-bordered table-striped verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Route</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($toolCategories as $toolCategory)
                                            <tr>
                                                <td>{{$toolCategory->name}}</td>
                                                <td>{{$toolCategory->display_title}}</td>
                                                <td>{{$toolCategory->route}}</td>
                                                <td><a type="button" class="btn  btn-square btn-dark btn-text-color" href="{{ route('edit-tool-category',['id' => $toolCategory->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                                <a type="button" class="btn  btn-square btn-danger btn-text-color"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>
                                                
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-center">
    <nav>
        <ul class="pagination pagination-gutter">
           
            <li class="page-item page-indicator">
                {{ $toolCategories->onFirstPage() ? '' : $toolCategories->previousPageUrl() }}
                <a class="page-link" href="{{ $toolCategories->previousPageUrl() }}" aria-label="Previous">
                    <i class="icon-arrow-left"></i>
                </a>
            </li>

          
            @foreach ($toolCategories->getUrlRange(1, $toolCategories->lastPage()) as $page => $url)
                <li class="page-item{{ $page == $toolCategories->currentPage() ? ' active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

          
            <li class="page-item page-indicator">
                {{ $toolCategories->hasMorePages() ? $toolCategories->nextPageUrl() : '' }}
                <a class="page-link" href="{{ $toolCategories->nextPageUrl() }}" aria-label="Next">
                    <i class="icon-arrow-right"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>

                </div>

               



                
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        @endsection

        
