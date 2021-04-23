@extends('frontend.Layout.app1')


@section('content')
	 
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						 <form action="/eshopper/check" method="post">
						 @csrf
							<input type="email" id="Email"  name="Email" placeholder="Email Address" />
							 {!!$errors->first("Email", "<span class='text-danger'>:message</span>")!!}
							<input type="password" id="Password" name="Password" placeholder="Password" />
							{!!$errors->first("Password", "<span class='text-danger'>:message</span>")!!}
							<br>
							<a href='/eshopper/forgot-password' alt="forgot password"> Forgot Password</a>
							<br>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="POST" action="/eshopper/save">
						@csrf
							<input type="text" id="firstname"  name="firstname" placeholder="Firstname">
							{!!$errors->first("firstname", "<span class='text-danger'>:message</span>")!!}
							<input type="text" id="lastname"  name="lastname" placeholder="Lastname">
							{!!$errors->first("lastname", "<span class='text-danger'>:message</span>")!!}
							<input type="email" id="email"  name="email" placeholder="Email Address">
							{!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
							<input type="password" id="password" name="password" placeholder="Password">
							{!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
							<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
							{!!$errors->first("confirm_password", "<span class='text-danger'>:message</span>")!!}
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	@endsection
	