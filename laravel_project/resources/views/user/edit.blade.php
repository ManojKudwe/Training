@extends('user.layout.app')

@section('content')
 <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
			@method('PUT')
            
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">�</button>
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">�</button>
                                {{Session::get('failed')}}
                            </div>
                        @endif

                        <div class="card-header">
                            <h4 class="card-title font-weight-bold"><b>Admin</b>LTE</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="firstname"> Firstname <span class="text-danger"> * </span> </label>
                                    <input type="text" name="firstname" class="form-control" value="{{$user->firstname}}" />
                                    {!!$errors->first("firstname", "<span class='text-danger'>:message</span>")!!}
                            </div>

							<div class="form-group">
                                <label for="lastname">Lastname <span class="text-danger"> * </span> </label>
                                    <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}" />
                                    {!!$errors->first("lastname", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="form-group">
                                <label for="email"> Email <span class="text-danger"> * </span> </label>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}" />
                                    {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                            </div>

							<div class="form-group">
                                <label for="status"> Status <span class="text-danger"> * </span></label>
                                   <ul>
								<li><input type="radio" class="radio" id="status" name="status" value="Active" /><label class="radio-label" for="residence1">Active</label></li>
								<li><input type="radio" class="radio" id="status" name="status" value="Inactive" /><label class="radio-label" for="residence2">Inactive</label></li>
							</ul>	
                                    {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
                            </div>

							<div class="form-group">
                                <label for="Role"> Status <span class="text-danger"> * </span></label>
                                   <ul>
								 @foreach ($data as $role)
								<li><input type="checkbox" class="checkbox" id="role"  name="role" value="{{$role->role_name}}" {{$user->role == $role->role_name ? 'checked' : ''}}/> <label class="css-label" for="checkbox_sample18">{{$role->role_name}}</label></li>
								 @endforeach
							</ul>
                                    {!!$errors->first("role", "<span class='text-danger'>:message</span>")!!}
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Update </button>
                        </div>
                    
               
        </form>

@endsection
