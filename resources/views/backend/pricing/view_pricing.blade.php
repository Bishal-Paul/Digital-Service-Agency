@extends('backend.master')

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <!-- end col -->
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">View Pricing</h4>
                        @if(session('success'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">Price</th>
                                <th scope="col">Validity</th>
                                <th scope="col">title</th>
                                <th scope="col">users</th>
                                <th scope="col">storage</th>
                                <th scope="col">support</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pricing as $key => $item)
                                <tr>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->users }}</td>
                                    <td>{{ $item->storage }}</td>
                                    <td>{{ $item->support }}</td>
                                    
                                    <td>
                                        <a class="btn btn-outline-primary" href="{{ url('edit-pricing')}}/{{$item->id}} ">Edit</a>
                                        <a class="btn btn-outline-danger" href="{{url('delete-pricing')}}/{{$item->id}}">Delete</a>
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