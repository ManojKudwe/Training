@extends('admin.layout.app')

@section('content')
    
	
				<ul>
					<li><a href="products/create" title="Create a product">Create Record</a></li>
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
            <th>Product Name</th>
			<th>image</th>
            <th>category</th>
            <th>Price</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td width=10%>{{$product->id}}</td>
				<td width=10%>{{$product->pname}}</td>
                <td width=10%><img height=50px width=50px src="{{asset('pimg/'.$product->pimage)}}"></td>
                <td width=15%>{{$product->category}}</td>
                <td width=10%>{{$product->price}}</td>
                <td width=15%>{{$product->created_at}}</td>
                <td width=20%>
				<form action="{{ route('products.destroy',$product->id) }}" method="POST" >
                    <form action="" method="PUT">

                        <a href="products/{{$product->id}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
						 <a class="btn btn_edit" href="products/{{$product->id}}/edit">Edit</a>
						 
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
	
 {!!  $products->links('pagination::bootstrap-4') !!}

@endsection
