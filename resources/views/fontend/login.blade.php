<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 	 ]>    <html class="ie" lang="en"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="HandheldFriendly" content="True">
	<title>Book Your Travel</title>
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" type="text/css" media="screen,projection,print" />
	<link rel="stylesheet" href="{{ asset('frontend/css/prettyPhoto.css')}}" type="text/css" media="screen" />
	<link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico')}}" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/css3-mediaqueries.js')}}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/sequence.jquery-min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/jquery.uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/sequence.js')}}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/selectnav.js')}}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/scripts.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".form").hide();
			$(".form:first").show();
			$(".f-item:first").addClass("active");
			$(".f-item:first span").addClass("checked");
		});
	</script>
</head>
<body class="main">



	<div class="lightbox" style="display:block;">
		<div class="lb-wrap">
			<!-- <a href="#" class="close">x</a> -->
			<div class="lb-content">
				<form method="post" action="{{route('user_login_post')}}">
          @csrf
					<h1>Log in</h1>
					<div class="f-item">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" required/>
					</div>
					<div class="f-item">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" required/>
					</div>
					<div class="f-item checkbox">
						<input type="checkbox" id="remember_me" name="checkbox" />
						<label for="remember_me">Remember me next time</label>
					</div>
					<!-- <p><a href="#" title="Forgot password?">Forgot password?</a><br />
					Dont have an account yet? <a href="register.html" title="Sign up">Sign up.</a></p>-->
					<input type="submit" id="login" name="login" value="login" class="gradient-button"/>
				</form>
			</div>
		</div>
	</div>

	<script>
		// Initiate selectnav function
		selectnav();
	</script>

</body>
</html>
