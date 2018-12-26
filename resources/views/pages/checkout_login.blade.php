@extends('layout')

@section('content')
<div class="col-sm-9 padding-right">
	<section id="form"><!--form-->
		<div class="">
			<div class="row">
				<div style="margin-left: 10px;" class="col-sm-5 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<?php 
							$msg = Session::get('login_message');
							if($msg){
								echo "<p style='color:red'>  $msg</p>";
								Session::put('message',null);
							}
						?>
						<form action="{{URL::to('/customer-login')}}" method="post">
							@csrf
							<input type="email" placeholder="Email Address" name="customer_email" required>
							<input type="password" name="customer_password" placeholder="Enter Password" required>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-5">
					<div class="signup-form"><!--sign up form-->
						@if(count($errors)>0)
					        @foreach($errors->all() as $error)
					          <div style="color: red;" class="alert alert danger">{{$error}}</div>
					        @endforeach
					      @endif
						<h2>New Customer Signup!</h2>
						<form action="{{URL::to('/customer-registration')}}" method="post">
							@csrf
							<input type="text" placeholder="Name" name="customer_name" required="">
							<input type="email" placeholder="Email Address" name="customer_email" required>
							<input type="text" name="customer_cell_no" placeholder="Cell No" required>
							<input type="password" placeholder="Password" name="customer_password" required>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
