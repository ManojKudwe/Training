@extends('admin.layout.app')

@section('content')
    
	
				<ul>
					<li><a href="banners/create" title="Create a banner">Create Record</a></li>
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
            <th>Title</th>
			<th>image</th>
            <th>Description</th>
            <th>Status</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($banners as $banner)
            <tr>
                <td width=10%>{{$banner->id}}</td>
				<td width=10%>{{$banner->title}}</td>
                <td width=10%><img height=50px; width=50px; src="{{asset('banner_img/'.$banner->image)}}"></td>
                <td width=15%>{{$banner->description}}</td>
                <td width=10%>{{$banner->status}}</td>
                <td width=15%>{{$banner->created_at}}</td>
                <td width=20%>
				<form action="{{ route('banners.destroy',$banner->id) }}" method="POST" >
                    <form action="" method="PUT">

                        <a href="banners/{{$banner->id}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
						 <a class="btn btn_edit" href="banners/{{$banner->id}}/edit">Edit</a>
						 
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
	
 {!!  $banners->links('pagination::bootstrap-4') !!}

@endsection
