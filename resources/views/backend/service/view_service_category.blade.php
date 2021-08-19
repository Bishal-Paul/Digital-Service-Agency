@extends('backend.master')

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <!-- end col -->
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">View Service Categories</h4>
                        @if(session('success'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Summary</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cat as $key => $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{asset('thumbnail/'.$item->cat_image)}}" width="100px"></td>
                                    <td>{{ $item->summary }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="{{ url('edit-service-category')}}/{{$item->id}} ">Edit</a>
                                        <a class="btn btn-outline-danger" href="{{url('delete-service-category')}}/{{$item->id}}">Delete</a>
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