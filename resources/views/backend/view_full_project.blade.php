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
                        <h4 class="header-title mb-4">Change project Role</h4>
                        
                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif

                        <form>
                        
                            <input type="hidden" name="id" value="{{$project->id}}">
                            
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Name :</label>
                                <div class="col-9">
                                    <p>{{$project->name}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Email :</label>
                                <div class="col-9">
                                    <p>{{$project->email}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Phone :</label>
                                <div class="col-9">
                                    <p>{{$project->phone}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Company Name :</label>
                                <div class="col-9">
                                    <p>{{$project->company}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Project Type :</label>
                                <div class="col-9">
                                    <p>{{$project->project_type}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Budget :</label>
                                <div class="col-9">
                                    <p>{{$project->budget}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">About Project :</label>
                                <div class="col-9">
                                    <p>{{$project->about_project}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-3 col-form-label">Hear From :</label>
                                <div class="col-9">
                                    <p>{{$project->hear_about}}</p>
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