<!doctype html>
<html lang="en">
  <head>
    <title>AdminLTE 3 | Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <form action="/admin" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-6 m-auto">
                    <div class="card shadow">
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
                                <label for="name">Firstname <span class="text-danger"> * </span> </label>
                                    <input type="text" name="firstname" class="form-control" value="{{old('name')}}" />
                                    {!!$errors->first("firstname", "<span class='text-danger'>:message</span>")!!}
                            </div>
							<div class="form-group">
                                <label for="name">Lastname <span class="text-danger"> * </span> </label>
                                    <input type="text" name="lastname" class="form-control" value="{{old('name')}}" />
                                    {!!$errors->first("lastname", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="form-group">
                                <label for="email"> Email <span class="text-danger"> * </span> </label>
                                    <input type="text" name="email" class="form-control" value="{{old('email')}}" />
                                    {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="form-group">
                                <label for="password"> Password <span class="text-danger"> * </span></label>
                                    <input type="password" name="password" class="form-control" value="{{old('password')}}" />
                                    {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="form-group">
                                <label for="confirm_password"> Confirm Password <span class="text-danger"> * </span></label>
                                    <input type="password" name="confirm_password" class="form-control" value="{{old('confirm_password')}}" />
                                    {!!$errors->first("confirm_password", "<span class='text-danger'>:message</span>")!!}
                            </div>
							<div class="form-group">
                                <label for="status"> Status <span class="text-danger"> * </span></label>
                                   <ul>
								<li><input type="radio" class="radio" id="residence1" name="radio" /><label class="radio-label" for="residence1">Active</label></li>
								<li><input type="radio" class="radio" id="residence2" name="radio" /><label class="radio-label" for="residence2">Inactive</label></li>
							</ul>	
                                    {!!$errors->first("confirm_password", "<span class='text-danger'>:message</span>")!!}
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
								<li><input type="checkbox" class="checkbox" id="role"  name="role" value="{{$role->role_name}}" /> <label class="css-label" for="checkbox_sample18">{{$role->role_name}}</label></li>
								 @endforeach
							</ul>
                                    {!!$errors->first("role", "<span class='text-danger'>:message</span>")!!}
                            </div>
							<a href="/admin" class="text-center">I already have a membership</a>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Register </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>