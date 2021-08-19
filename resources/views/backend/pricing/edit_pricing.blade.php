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
                        <h4 class="header-title mb-4">Edit Pricing</h4>
                        
                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif

                        <form method="post" action="{{url('update-pricing')}}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id" value="{{$pricing->id}}">
                            
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Price *</label>
                                <div class="col-9">
                                    <input type="text" id="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$pricing->price}}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time" class="col-3 col-form-label">Validity *</label>
                                <div class="col-9">
                                    <input type="text" id="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{$pricing->time}}">
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-3 col-form-label">Title *</label>
                                <div class="col-9">
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$pricing->title}}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="users" class="col-3 col-form-label">Users *</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="users" value="{{$pricing->users}}">
                                    @error('users')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="storage" class="col-3 col-form-label">Storage *</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="storage" value="{{$pricing->storage}}">
                                    @error('storage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="support" class="col-3 col-form-label">Support *</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="support" value="{{$pricing->support}}">
                                    @error('support')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="others" class="col-3 col-form-label">Other</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="other1" value="{{$pricing->other1}}">
                                    @error('other1')
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