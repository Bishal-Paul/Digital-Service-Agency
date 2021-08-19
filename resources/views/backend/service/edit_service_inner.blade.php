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
                        <h4 class="header-title mb-4">Edit Service Inner Content</h4>
                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif

                        <form method="post" action="{{url('update-service-inner')}}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="service_id" value="{{$serinner->id}}">
                            <div class="form-group row">
                                <label for="title" class="col-3 col-form-label">Service Title</label>
                                <div class="col-9">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $serinner->title }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-3 col-form-label">Category</label>
                                <div class="col-9">
                                    <select name="category" class="form-control">
                                        @foreach($category as $cat)
                                            <option @if($serinner->category_id == $cat->id) selected @endif value="{{ $cat->id ?? "NULL" }}">{{ $cat->title ?? "NULL" }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-3 col-form-label">Description</label>
                                <div class="col-9">
                                   <textarea name="description" class="form-control" cols="30" rows="10">{{$serinner->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-3 col-form-label">Preview Image</label>
                                <div class="col-9">
                                    <img src="{{ asset('thumbnail/'.$serinner->image) }}" width="200px" alt="{{ $serinner->title }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-3 col-form-label">Upload New Image</label>
                                <div class="col-9">
                                    <input type="file" class=" @error('image') is-invalid @enderror" name="image">
                                    @error('image')
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