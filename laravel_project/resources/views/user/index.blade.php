@extends('user.layout.app')

@section('content')
    
	
				<ul>
					<li><a href="users/create" title="Create a product">Create Record</a></li>
				</ul>

   @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert" style="color:white;">
		{{session('success')}}
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
			<th>Id</th>
            <th>Firstname</th>
            <th>LastName</th>
			<th>Email</th>
            <th>Role</th>
			<th>status</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td width=10%>{{$user->id}}</td>
				<td width=10%>{{$user->firstname}}</td>
                <td width=10%>{{$user->lastname}}</td>
                <td width=15%>{{$user->email}}</td>
                <td width=10%>{{$user->role}}</td>
				<td width=10%>{{$user->status}}</td>
                <td width=15%>{{$user->created_at}}</td>
                <td width=20%>
				<form action="{{ route('users.destroy',$user->id) }}" method="POST" >
                    <form action="" method="PUT">

                        <a href="users/{{$user->id}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

						 <a class="btn btn_edit"  href="users/{{$user->id}}/edit">Edit</a>
                        @csrf
                        @method('DELETE')

                        <button class="btn btn_delete" type="submit" value="delete" title="delete" >Delete</button>
						</form>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

    {!! $users->links('pagination::bootstrap-4') !!}

@endsection
