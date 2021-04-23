@extends('admin.layout.app')

@section('content')
    
	
				<ul>
					<li><a href="categorys/create" title="Create a product">Create Record</a></li>
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
            <th>category</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($categorys as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->category}}</td>
                <td>{{$category->created_at}}</td>
                <td>
				<form action="{{route('categorys.destroy',$category->id)}}" method="POST" >
                    <form action="" method="PUT">

                        <a href="categorys/{{$category->id}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
						 <a class="btn btn_edit" href="categorys/{{$category->id}}/edit">Edit</a>
						 
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
	
 {!! $categorys->links('pagination::bootstrap-4') !!}

@endsection
