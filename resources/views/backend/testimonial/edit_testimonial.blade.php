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
                        <h4 class="header-title mb-4">Edit Testimonial</h4>
                        
                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif

                        <form method="post" action="{{url('update-testimonial')}}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id" value="{{$items->id}}">
                            <div class="form-group row">
                                <label for="name" class="col-3 col-form-label">Name *</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="{{ $items->name }}" name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-3 col-form-label">Username *</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="{{ $items->username }}" name="username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-3 col-form-label">Text *</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="{{ $items->text }}" name="text">
                                    @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-3 col-form-label">Preview Image</label>
                                <div class="col-9">
                                    <img src="{{ asset('thumbnail/'.$items->image) }}" width="200px" alt="{{ $items->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-3 col-form-label">Image *</label>
                                <div class="col-9">
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group mb-0 justify-content-end row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
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