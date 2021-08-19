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
                    <h4 class="header-title mb-4">Edit Information</h4>

                    @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif

                    <form method="post" action="{{url('update-info')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$info->id}}">
                        <div class="form-group row">
                            <label for="email" class="col-3 col-form-label">Email *</label>
                            <div class="col-9">
                                <input type="email" class="form-control" value="{{$info->email}}" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-3 col-form-label">Phone *</label>
                            <div class="col-9">
                                <input type="phone" class="form-control" value="{{$info->phone}}" name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-3 col-form-label">Address *</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$info->address}}" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-3 col-form-label">Website *</label>
                            <div class="col-9">
                                <input type="website" class="form-control" value="{{$info->website}}" name="website">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="site_logo" class="col-3 col-form-label">Preview Logo</label>
                            <div class="col-9">
                                <img src="{{ asset('thumbnail/'.$info->site_logo) }}" width="200px" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site_logo" class="col-3 col-form-label">Upload Logo *</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="site_logo">
                                @error('site_logo')
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