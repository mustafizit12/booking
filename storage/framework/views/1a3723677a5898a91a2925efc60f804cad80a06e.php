<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="HandheldFriendly" content="True">
	<title>Book Your Travel</title>
	<link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>" type="text/css" media="screen,projection,print" />
	<link rel="stylesheet" href="<?php echo e(asset('frontend/css/prettyPhoto.css')); ?>" type="text/css" media="screen" />
	<link rel="shortcut icon" href="<?php echo e(asset('frontend/images/favicon.ico')); ?>" />
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery-ui.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/css3-mediaqueries.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/sequence.jquery-min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.uniform.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.prettyPhoto.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.raty.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/sequence.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/selectnav.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('frontend/js/scripts.js')); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".form").hide();
			$(".form:first").show();
			$(".f-item:first").addClass("active");
			$(".f-item:first span").addClass("checked");
		});
	</script>
</head>
<body>
	<!--header-->
	<header>
		<div class="wrap clearfix">
			<!--logo-->
			<h1 class="logo"><a href="<?php echo e(url('/')); ?>" title="Book Your Travel - home"><img src="<?php echo e(asset('frontend/images/txt/logo.png')); ?>" alt="Book Your Travel" /></a></h1>
			<!--//logo-->

			<!--ribbon-->
			<div class="ribbon">
				<nav>
					<ul class="profile-nav">
						<li class="active"><a href="#" title="My Account">My Account</a></li>

						<?php if(Auth::check()): ?>
						<li ><a href="<?php echo e(route('bookings')); ?>" title="My Bookings">My Bookings</a></li>
						<li><a href="<?php echo e(route('logout')); ?>" title="Login">Logout</a></li>
						<?php else: ?>
						<li><a href="<?php echo e(route('user_login')); ?>" title="Login">Login</a></li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
			<!--//ribbon-->



			<!--contact-->
			<div class="contact">
				<span>24/7 Support number</span>
				<span class="number">1- 555 - 555 - 555</span>
			</div>
			<!--//contact-->
		</div>

		<!--main navigation-->
		<nav class="main-nav" role="navigation" id="nav">
			<ul class="wrap">
				<li><a href="<?php echo e(url('/')); ?>" title="Home">Home</a></li>
				<li><a href="<?php echo e(url('hotel_list')); ?>" title="Hotels">Hotels</a></li>
				<li><a href="<?php echo e(url('package_tour_list')); ?>" title="Package Tour">Package Tour</a></li>
				<li><a href="<?php echo e(url('venue_list')); ?>" title="Party Center">Party Center</a></li>
				<li><a href="<?php echo e(url('rent_a_car_list')); ?>" title="Rent A Car">Rent A Car</a></li>
				<li><a href="<?php echo e(url('bus_list')); ?>" title="Bus">Bus</a></li>
				<li><a href="<?php echo e(url('visa_list')); ?>" title="Visa">Visa</a></li>
			</ul>
		</nav>
		<!--//main navigation-->
	</header>
	<!--//header-->

  <?php echo $__env->yieldContent('content'); ?>

	<!--footer-->
	<footer>
		<div class="wrap clearfix">
			<!--column-->
			<article class="one-fourth">
				<h3>Book Your Travel</h3>
				<p>1400 Pennsylvania Ave. Washington, DC</p>
				<p><em>P:</em> 24/7 customer support: 1-555-555-5555</p>
				<p><em>E:</em> <a href="#" title="booking@mail.com">booking@mail.com</a></p>
			</article>
			<!--//column-->

			<!--column-->
			<article class="one-fourth">
				<h3>Customer support</h3>
				<ul>
					<li><a href="#" title="Faq">Faq</a></li>
					<li><a href="#" title="How do I make a reservation?">How do I make a reservation?</a></li>
					<li><a href="#" title="Payment options">Payment options</a></li>
					<li><a href="#" title="Booking tips">Booking tips</a></li>
				</ul>
			</article>
			<!--//column-->

			<!--column-->
			<article class="one-fourth">
				<h3>Follow us</h3>
				<ul class="social">
					<li class="facebook"><a href="#" title="facebook">facebook</a></li>
					<li class="youtube"><a href="#" title="youtube">youtube</a></li>
					<li class="rss"><a href="#" title="rss">rss</a></li>
					<li class="linkedin"><a href="#" title="linkedin">linkedin</a></li>
					<li class="googleplus"><a href="#" title="googleplus">googleplus</a></li>
					<li class="twitter"><a href="#" title="twitter">twitter</a></li>
					<li class="vimeo"><a href="#" title="vimeo">vimeo</a></li>
					<li class="pinterest"><a href="#" title="pinterest">pinterest</a></li>
				</ul>
			</article>
			<!--//column-->

			<!--column-->
			<article class="one-fourth last">
				<h3>Don’t miss our exclusive offers</h3>
				<form id="newsletter" action="newsletter.php" method="post">
					<fieldset>
						<input type="email" id="newsletter_signup" name="newsletter_signup" placeholder="Enter your email here" />
						<input type="submit" id="newsletter_submit" name="newsletter_submit" value="Signup" class="gradient-button" />
					</fieldset>
				</form>
			</article>
			<!--//column-->

			<section class="bottom">
				<p class="copy">Copyright 2012 Book your travel ltd. All rights reserved</p>
				<nav>
					<ul>
						<li><a href="#" title="About us">About us</a></li>
						<li><a href="contact.html" title="Contact">Contact</a></li>
						<li><a href="#" title="Partners">Partners</a></li>
						<li><a href="#" title="Customer service">Customer service</a></li>
						<li><a href="#" title="FAQ">FAQ</a></li>
						<li><a href="#" title="Careers">Careers</a></li>
						<li><a href="#" title="Terms & Conditions">Terms &amp; Conditions</a></li>
						<li><a href="#" title="Privacy statement">Privacy statement</a></li>
					</ul>
				</nav>
			</section>
		</div>
	</footer>

	<!--//footer-->
	<script>
		// Initiate selectnav function
		selectnav();
	</script>
	<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/fontend/layouts/main.blade.php ENDPATH**/ ?>