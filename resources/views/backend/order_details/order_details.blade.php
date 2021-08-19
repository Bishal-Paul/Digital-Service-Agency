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
                    <h4 class="header-title mb-4"></h4>

                    @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif

                    <form>

                        <input type="hidden" name="id" value="{{$billings->id}}">
                        <h3>Shiiping Details</h3>
                        <hr>
                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">First Name :</label>
                            <div class="col-9">
                                <p>{{$billings->shipping->first_name}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">Last Name :</label>
                            <div class="col-9">
                                <p>{{$billings->shipping->last_name}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">Email :</label>
                            <div class="col-9">
                                <p>{{$billings->shipping->email}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">Address :</label>
                            <div class="col-9">
                                <p>{{$billings->shipping->address}} , {{$billings->shipping->address2}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">Zip Code :</label>
                            <div class="col-9">
                                <p>{{$billings->shipping->zip}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">Payment Method :</label>
                            <div class="col-9">
                                <p>{{$billings->shipping->payment}}</p>
                            </div>
                        </div>
                        <br><br>
                        <h3>Billing Details</h3>
                        <hr>
                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">Service Name :</label>
                            <div class="col-9">
                                <p>{{$billings->service_name}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">Price :</label>
                            <div class="col-9">
                                <p>{{$billings->price}}</p>
                            </div>
                        </div>

                        <div class="form-group mb-0 justify-content-end row text-center">
                            <div class="col-12">
                                <button type="button" class="btn btn-success waves-effect waves-light"> <a href="{{ url('admin-dashboard') }}" style="color: #fff;">Back to dashboard</a> </button>
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