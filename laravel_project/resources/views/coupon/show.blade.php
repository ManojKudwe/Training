@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/coupons" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
           
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Coupon:</strong>
				{{$coupon->coupon}}

            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Coupon_Expiry_Date:</strong>
				{{$coupon->coupon_expiry_date}}

            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Value:</strong>
				{{$coupon->value}}

            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
				{{$coupon->status}}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Created at:</strong>
				{{$coupon->created_at}}

            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Updated at:</strong>
				{{$coupon->updated_at}}
            </div>
        </div>
    </div>
@endsection