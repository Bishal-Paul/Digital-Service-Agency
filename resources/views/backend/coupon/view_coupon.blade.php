@extends('backend.master')

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <!-- end col -->
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">View Coupons</h4>
                    @if(session('success'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Service/Plan</th>
                                <th scope="col">Coupon Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Validity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupon as $key => $item)
                            <tr>
                                <td>{{ $item->plan->title }}</td>
                                <td>{{ $item->coupon_name }}</td>
                                <td>{{ $item->coupon_code }}</td>
                                <td>{{ $item->coupon_discount }}%</td>
                                <td>{{ $item->coupon_validity }}</td>

                                <td>
                                    <a class="btn btn-outline-primary" href="{{ url('edit-coupon')}}/{{$item->id}} ">Edit</a>
                                    <a class="btn btn-outline-danger" href="{{url('delete-coupon')}}/{{$item->id}}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>

@endsection