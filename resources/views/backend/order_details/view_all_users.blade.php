@extends('backend.master')

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <!-- end col -->
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">View Orders</h4>
                    @if(session('success'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Order Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($billings as $key => $item)
                            <tr>
                                <td>{{ $item->service_name }}</td>
                                <td>{{ $item->price}}</td>
                                <td>{{ $item->shipping->first_name}} {{ $item->shipping->last_name ?? ""}}</td>
                                <td>{{ $item->shipping->address}}</td>
                                <td>{{ $item->shipping->created_at->format('d-M-Y')}}</td>

                                <td>
                                    <a class="btn btn-outline-info" href="{{url('order-details')}}/{{$item->id}}">View Details</a>
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