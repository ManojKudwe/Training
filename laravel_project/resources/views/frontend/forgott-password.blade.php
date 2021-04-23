@extends('frontend.Layout.app1')


@section('content')
	 
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--Form-->
						<h2>Forgot Password</h2>
						 <form action="/eshopper/verify" method="post">
						 @csrf
							<input type="email" id="Email"  name="Email" placeholder="Email Address" />
							 {!!$errors->first("Email", "<span class='text-danger'>:message</span>")!!}
							<input type="text" id="firstname" name="firstname" placeholder="Firstname" />
							{!!$errors->first("firstname", "<span class='text-danger'>:message</span>")!!}
							
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div><!--/Form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	@endsection
	