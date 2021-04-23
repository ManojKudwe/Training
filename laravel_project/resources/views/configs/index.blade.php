@extends('admin.layout.app')

@section('content')
    
	
				<ul>
					<li><a href="configs/create" title="Create a product">Create Record</a></li>
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
            <th>Configuration Name</th>
			<th>Configuration Value</th>
			<th>Short Code</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($configs as $config)
            <tr>
                <td>{{$config->id}}</td>
                <td>{{$config->config_name}}</td>
				<td>{{$config->config_value}}</td>
				<td>{{$config->short_code}}</td>
                <td>{{$config->created_at}}</td>
                <td>
				<form action="{{route('configs.destroy',$config->id)}}" method="POST" >
                    <form action="" method="PUT">

                        <a href="configs/{{$config->id}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
						 <a class="btn btn_edit" href="configs/{{$config->id}}/edit">Edit</a>
						 
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
	
 {!! $configs->links('pagination::bootstrap-4') !!}

@endsection
