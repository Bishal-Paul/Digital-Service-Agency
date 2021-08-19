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
                    <h4 class="header-title mb-4">Edit Blog Post</h4>

                    @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif

                    <form method="post" action="{{url('update-blog')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$blog->id}}">
                        <div class="form-group row">
                            <label for="title" class="col-3 col-form-label">Title *</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$blog->title}}" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-3 col-form-label">Category *</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$blog->category}}" name="category">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="summary" class="col-3 col-form-label">Short Summary *</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$blog->summary}}" name="summary">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-3 col-form-label">Description *</label>
                            <div class="col-9">
                                <textarea name="description" id="my-editor" class="my-editor form-control">{{$blog->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-3 col-form-label">Preview Image</label>
                            <div class="col-9">
                                <img src="{{ asset('thumbnail/'.$blog->image) }}" width="200px" alt="{{ $blog->title }}">
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

@section('footer_js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace('my-editor', options);
</script>
@endsection