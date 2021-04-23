@extends('admin.layout.app')

@section('content')
    
	
				<ul>
					<li><a href="coupons/create" title="Create a product">Create Record</a></li>
				</ul>

   @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert" style="color:white;">
		{{session('success')}}
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
			<th>No</th>
            <th>Coupon</th>
			<th>Coupon Expiry Date</th>
			<th>Value</th>
			<th>Status</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($coupons as $coupon)
            <tr>
                <td>{{$coupon->id}}</td>
                <td>{{$coupon->coupon}}</td>
				<td>{{$coupon->coupon_expiry_date}}</td>
				<td>{{$coupon->value}}</td>
				<td>{{$coupon->status}}</td>
                <td>{{$coupon->created_at}}</td>
                <td>
				<form action="{{route('coupons.destroy',$coupon->id)}}" method="POST" >
                    <form action="" method="PUT">

                        <a href="coupons/{{$coupon->id}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
						 <a class="btn btn_edit" href="coupons/{{$coupon->id}}/edit">Edit</a>
						 
						 @csrf
                        @method('DELETE')
						
						
                        <button class="btn btn_delete" type="submit" value="delete" title="delete" >Delete</button>
                           
                        </button>
						 </form>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
	
 {!! $coupons->links('pagination::bootstrap-4') !!}

@endsection
