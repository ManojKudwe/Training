@extends('admin.layout.app')

@section('content')
 <form action="/coupons" method="POST">
            @csrf
            
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{Session::get('failed')}}
                            </div>
                        @endif

                        <div class="card-header">
                            <h4 class="card-title font-weight-bold"><b>Admin</b>LTE</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="coupon"> Coupon <span class="text-danger"> * </span> </label>
                                    <input type="text" name="coupon" class="form-control" value="{{$coupon}}" />
                                    {!!$errors->first("coupon", "<span class='text-danger'>:message</span>")!!}
                            </div>
							<div class="form-group">
                                <label for="coupon_expiry_date"> Coupon_Expiry_Date <span class="text-danger"> * </span> </label>
                                    <input type="date" name="coupon_expiry_date" class="form-control" value="" />
                                    {!!$errors->first("coupon_expiry_date", "<span class='text-danger'>:message</span>")!!}
                            </div>
							<div class="form-group">
                                <label for="value"> Value <span class="text-danger"> * </span> </label>
                                    <input type="number" name="value" class="form-control" value="" />
                                    {!!$errors->first("value", "<span class='text-danger'>:message</span>")!!}
                            </div>
							<div class="form-group">
                                <label for="status"> Status <span class="text-danger"> * </span></label>
                                   <ul>
								<li><input type="radio" class="radio" id="status" name="status" value="Active" /><label class="radio-label" for="residence1">Active</label></li>
								<li><input type="radio" class="radio" id="status" name="status" value="Inactive" /><label class="radio-label" for="residence2">Inactive</label></li>
							</ul>	
                                    {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
                            </div>
							
							
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Submit </button>
                        </div>
                    
               
        </form>

@endsection
