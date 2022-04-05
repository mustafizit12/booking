@extends('fontend.layouts.main')
@section('content')
<!--main-->
	<div class="main" role="main">
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">


				<!--rent_a_car three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						@if(sizeof($rent_a_car->image)>0)
            @php $i =0; @endphp
            @foreach($rent_a_car->image as $key=>$value)
            @php $i++; @endphp
						<img src="{{get_rent_car_image($value->image_path)}}" alt="" width="850" height="531" />
            @endforeach
            @if($i < 4 && $i > 0)
            @for(; $i < 4;$i++)
            <img src="{{get_rent_car_image($rent_a_car->image[0]->image_path)}}" alt="" width="850" height="531" />
            @endfor
            @endif
            @endif
						<!-- <img src="images/slider/img.jpg" alt="" width="850" height="531" />
						<img src="images/slider/img.jpg" alt="" width="850" height="531" />
						<img src="images/slider/img.jpg" alt="" width="850" height="531" /> -->
					</section>
					<!--//gallery-->

					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li class="availability"><a href="#availability" title="Availability">Availability</a></li>
							<li class="description"><a href="#description" title="Description">Description</a></li>
							<!-- <li class="facilities"><a href="#facilities" title="Facilities">Facilities</a></li> -->
						</ul>
					</nav>
					<!--//inner navigation-->

					<!--availability-->
					<section id="availability" class="tab-content">
						<article>
							<h1>Availability</h1>
							<div class="text-wrap">
								<a href="{{url('book_now/'.$rent_a_car->id.'/rent_a_car')}}" class="gradient-button right" title="Change dates">Book Now</a>
								<p>Owner Name : {{$rent_a_car->owner_name}}</p>
                <p>Owner Contact : {{$rent_a_car->owner_contact}}</p>
                <p>Owner Address : {{$rent_a_car->owner_address}}</p>
							</div>
						</article>
					</section>
					<!--//availability-->

					<!--description-->
					<section id="description" class="tab-content">
						<article>
							{!! $rent_a_car->description !!}
						</article>
					</section>
					<!--//description-->

					<!--facilities-->
					<!-- <section id="facilities" class="tab-content">
						<article>
							{!! $rent_a_car->features !!}
						</article>
					</section> -->
					<!--//facilities-->
				</section>
				<!--//rent_a_car content-->

				<!--sidebar-->
				<aside class="right-sidebar">
					<!--rent_a_car details-->
					<article class="rent_a_car-details clearfix">
						<h1>{{$rent_a_car->car_model}}
						</h1>

						<!-- <span class="rating"> 8 /10</span> -->
						<div class="description">
							<p>{!! substr($value->description, 0, 200) !!} </p>
						</div>

					</article>
					<!--//rent_a_car details-->

					<!--testimonials-->
					<!-- <article class="testimonials clearfix">
						<blockquote>Loved the staff and the location was just amazing... Perfect!” </blockquote>
						<span class="name">- Jane Doe, Solo Traveller</span>
					</article> -->
					<!--//testimonials-->

					<!--Need Help Booking?-->
					<article class="default clearfix">
						<h2>Need Help Booking?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
						<p class="number">1- 555 - 555 - 555</p>
					</article>
					<!--//Need Help Booking?-->

					<!--Why Book with us?-->
					<article class="default clearfix">
						<h2>Why Book with us?</h2>
						<h3>Low rates</h3>
						<p>Get the best rates, or get a refund.<br />No booking fees. Save money!</p>
						<h3>Largest Selection</h3>
						<p>140,000+ rent_a_cars worldwide<br />130+ airlines<br />Over 3 million guest reviews</p>
						<h3>We’re Always Here</h3>
						<p>Call or email us, anytime<br />Get 24-hour support before, during, and after your trip</p>
					</article>
					<!--//Why Book with us?-->

					<!--Popular rent_a_cars in the area-->
					<!-- <article class="default clearfix">
						<h2>Popular rent_a_cars in the area</h2>
						<ul class="popular-rent_a_cars">
							<li>
								<a href="#">
									<h3>Plaza Resort Hotel &amp; SPA
										<span class="stars">
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
										</span>
									</h3>
									<p>From <span class="price">$ 100 <small>/ per night</small></span></p>
									<span class="rating"> 8 /10</span>
								</a>
							</li>
							<li>
								<a href="#">
									<h3>Lorem Ipsum Inn
										<span class="stars">
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
										</span>
									</h3>
									<p>From <span class="price">$ 110 <small>/ per night</small></span></p>
									<span class="rating"> 7 /10</span>
								</a>
							</li>
							<li>
								<a href="#">
									<h3>Best Eastern London
										<span class="stars">
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
										</span>
									</h3>
									<p>From <span class="price">$ 125 <small>/ per night</small></span></p>
									<span class="rating"> 8 /10</span>
								</a>
							</li>
							<li>
								<a href="#">
									<h3>Plaza Resort Hotel &amp; SPA
										<span class="stars">
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
											<img src="images/ico/star.png" alt="" />
										</span>
									</h3>
									<p>From <span class="price">$ 100 <small>/ per night</small></span></p>
									<span class="rating"> 8 /10</span>
								</a>
							</li>
						</ul>
						<a href="#" title="Show all" class="show-all">Show all</a>
					</article> -->
					<!--//Popular rent_a_cars in the area-->

					<!--Deal of the day-->
					<!-- <article class="default clearfix">
						<h2>Deal of the day</h2>
						<div class="deal-of-the-day">
							<a href="rent_a_car.html">
								<figure><img src="images/slider/img.jpg" alt="" width="230" height="130" /></figure>
								<h3>Plaza Resort Hotel &amp; SPA
									<span class="stars">
										<img src="images/ico/star.png" alt="" />
										<img src="images/ico/star.png" alt="" />
										<img src="images/ico/star.png" alt="" />
										<img src="images/ico/star.png" alt="" />
									</span>
								</h3>
								<p>From <span class="price">$ 100 <small>/ per night</small></span></p>
								<span class="rating"> 8 /10</span>
							</a>
						</div>
					</article> -->
					<!--//Deal of the day-->
				</aside>
				<!--//sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection
@section('script')
<script type="text/javascript">


</script>
@endsection
