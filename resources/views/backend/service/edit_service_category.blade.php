@extends('backend.master')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <!-- end col -->
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Edit Service Category</h4>
                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif

                        <form method="post" action="{{url('update-service-category')}}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <div class="form-group row">
                                <label for="title" class="col-3 col-form-label">Category Title</label>
                                <div class="col-9">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $category->title }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="summary" class="col-3 col-form-label">Category Summary</label>
                                <div class="col-9">
                                    <input type="text" class="form-control @error('summary') is-invalid @enderror" name="summary" value="{{ $category->summary }}">
                                    @error('summary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_image" class="col-3 col-form-label">Preview Image</label>
                                <div class="col-9">
                                    <img src="{{ asset('thumbnail/'.$category->cat_image) }}" width="200px" alt="{{ $category->title }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cat_image" class="col-3 col-form-label">Upload New Image</label>
                                <div class="col-9">
                                    <input type="file" class=" @error('cat_image') is-invalid @enderror" name="cat_image">
                                    @error('cat_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-0 justify-content-end row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- end container-fluid -->
    </div>
@endsection