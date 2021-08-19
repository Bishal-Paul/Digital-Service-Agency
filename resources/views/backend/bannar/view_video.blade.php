@extends('backend.master')

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <!-- end col -->
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">View Video</h4>
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
                                <th scope="col">Video</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($video as $key => $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <video width="150" height="150" controls data-full="{{ asset('thumbnail/video/'.$item->video) }}">
                                        <source src="{{ asset('thumbnail/video/'.$item->video) }}" type="video/mp4">
                                    </video>
                                </td>

                                <td>
                                    <a class="btn btn-outline-danger" href="{{url('delete-video')}}/{{$item->id}}">Delete Video</a>
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