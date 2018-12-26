

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Dashboard Login</title>
	<meta name="description" content="Elaravel">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Made by Ruhul amin">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{URL::to('public/backend/img/favicon.ico')}}">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url({{URL::to('public/backend/img/bg-login.jpg')}}) !important; }
		</style>
		
		
		
</head>

<body>
	<div class="container-fluid-full">
		<div class="row-fluid">	
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a><i class="halflings-icon home"></i></a>
						<a><i class="halflings-icon cog"></i></a>
					</div>
					<?php  
						$message = Session::get('message');
						if($message){
							echo "<div class='alert alert-danger'>$message</div>";
							Session::put('message', null);
						}

					?>
					<h2>Login to Dashboard</h2>
					<form class="form-horizontal" action="{{url('/admin-dashboard')}}" method="post">
						<fieldset>
							<!-- {{csrf_field()}} -->
							@csrf
							<div class="input-prepend" title="Email">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="admin_email" id="admin_email" required type="email" placeholder="Type Admin Email"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="admin_password" id="password" type="password" placeholder="Enter Password" required="" />
							</div>
							<div class="clearfix"></div>
				
							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3>Forgot Password?</h3>	
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->
		<script src="{{asset('public/backend/js/jquery-1.9.1.min.js')}}"></script>
		<script src="{{asset('public/backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
		<script src="{{asset('public/backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
		<script src="{{asset('public/backend/js/jquery.ui.touch-punch.js')}}"></script>
		<script src="{{asset('public/backend/js/modernizr.js')}}"></script>
		<script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('public/backend/js/jquery.cookie.js')}}"></script>
		<script src="{{asset('public/backend/js/custom.js')}}"></script>
	<!-- end: JavaScript-->
	
</body>

</html>
