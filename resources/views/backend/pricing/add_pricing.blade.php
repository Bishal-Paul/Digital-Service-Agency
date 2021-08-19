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
                        <h4 class="header-title mb-4">Add Pricing Plan</h4>
                        
                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif

                        <form method="post" action="{{url('post-pricing')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Price *</label>
                                <div class="col-9">
                                    <input type="text" id="price" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Ex: 45.5">
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
                                    <input type="text" id="time" class="form-control @error('time') is-invalid @enderror" name="time" placeholder="Ex: For 1 year">
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
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="">
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
                                    <input type="text" class="form-control" name="users" placeholder="ex: 10">
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
                                    <input type="text" class="form-control" name="storage" placeholder="ex: 25GB">
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
                                    <input type="text" class="form-control" name="support" placeholder="">
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
                                    <input type="text" class="form-control" name="other1" placeholder="">
                                    @error('other1')
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