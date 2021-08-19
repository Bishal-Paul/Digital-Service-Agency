@extends('frontend.master')

@section('title')
Add Your Work | Digital Service Agency
@endsection

@section('content')
<style>
    @media (min-width: 577px) and (max-width: 767px) {

        .main-menu-area {
            width: 100% !important;
            padding-left: -28px !important;
            z-index: 999999;
            padding-top: 22px ​ !important;
            padding-right: 91px !important;
        }

        .content {
            padding: 180px 0px !important;
        }
    }

    .main-menu-area {
        background-color: #30398d !important;
    }

    .main-menu-area .start-btn-area a.project-btn {
        padding: 10px 20px !important;
    }

    h1 span {
        color: #30398d !important;
    }

    #full-body #form-container form fieldset h6 {
        color: #30398d !important;
    }

    #full-body #form-container form button {
        background-color: #30398d !important;
    }

    #full-body #form-container form button:hover {
        background-color: #ffb545 !important;
    }
</style>

<div class="content" style="padding: 180px 200px;">
    <!-- Start Content-->
    <div class="container-fluid" style="background: #f1f1f147;padding: 50px 50px;">
        <div class="row">
            <!-- end col -->
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">Add Your Work</h4>

                    <form method="post" action="{{url('submit-work')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="cat" class="col-3 col-form-label">Select Category *</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('category') is-invalid @enderror " name="category">
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-3 col-form-label">Title *</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('title') is-invalid @enderror " name="title">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-3 col-form-label">Service Image *</label>
                            <div class="col-9">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-3 col-form-label">Description *</label>
                            <div class="col-9">
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror " cols="30" rows="10"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0 justify-content-end row text-center">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
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