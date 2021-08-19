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
                    <h4 class="header-title mb-4">Add Coupon</h4>

                    @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif

                    <form method="post" action="{{url('post-coupon')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="plan" class="col-3 col-form-label">Choose Plan/Service *</label>
                            <div class="col-9">
                                <select name="plan_id" class="form-control">
                                    <option value="">Selet One</option>
                                    @foreach($plan as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                                @error('coupon_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coupon_name" class="col-3 col-form-label">Coupon Name *</label>
                            <div class="col-9">
                                <input type="text" id="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" name="coupon_name">
                                @error('coupon_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coupon_code" class="col-3 col-form-label">Coupon Code *</label>
                            <div class="col-9">
                                <input type="text" id="coupon_code" class="form-control @error('coupon_code') is-invalid @enderror" name="coupon_code">
                                @error('coupon_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coupon_discount" class="col-3 col-form-label">Coupon Discount (%)</label>
                            <div class="col-9">
                                <input type="text" id="coupon_discount" class="form-control @error('coupon_discount') is-invalid @enderror" name="coupon_discount">
                                @error('coupon_discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coupon_validity" class="col-3 col-form-label">Coupon Validity *</label>
                            <div class="col-9">
                                <input type="date" id="coupon_validity" class="form-control @error('coupon_validity') is-invalid @enderror" name="coupon_validity">
                                @error('coupon_validity')
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