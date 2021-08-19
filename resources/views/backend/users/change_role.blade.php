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
                        <h4 class="header-title mb-4">Change User Role</h4>
                        
                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif

                        <form method="post" action="{{url('update-user-role')}}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Name :</label>
                                <div class="col-9">
                                    <p>{{$user->name}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Email :</label>
                                <div class="col-9">
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Current Role :</label>
                                <div class="col-9">
                                    <p>{{$user->type}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Change Role :</label>
                                <div class="col-9">
                                    <select name="user_type" class="form-control">
                                    <option value="ADMIN">Admin</option>
                                    <option value="VENDOR">Vendor</option>
                                    <option value="USER">User</option>
                                    </select>
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