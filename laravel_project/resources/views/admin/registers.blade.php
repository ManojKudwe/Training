<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
	  

	  <form method="POST" action="/save">
	   @csrf
        
		<div class="input-group mb-3">
          <input type="text" id="firstname"  name="firstname" class="form-control" placeholder="firstname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		 {!!$errors->first("firstname", "<span class='text-danger'>:message</span>")!!}
		<div class="input-group mb-3">
          <input type="text" id="lastname"  name="lastname" class="form-control" placeholder="lastname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		{!!$errors->first("lastname", "<span class='text-danger'>:message</span>")!!}
        <div class="input-group mb-3">
          <input type="email" id="email"  name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
		 {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		{!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
        <div class="input-group mb-3">
          <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		{!!$errors->first("confirm_password", "<span class='text-danger'>:message</span>")!!}
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
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  name="submit" value="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
