@extends('fontend.layouts.main')
@section('content')
<!--main-->
	<div class="main" role="main">
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">


				<!--package_tour three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						@if(sizeof($package_tour->image)>0)
						@php $i =0; @endphp
						@foreach($package_tour->image as $key=>$value)
						@php $i++; @endphp
						<img src="{{get_tour_package_image($value->image_path)}}" alt="" width="850" height="531" />
						@endforeach
						@if($i < 4 && $i > 0)
						@for(; $i < 4;$i++)
						<img src="{{get_tour_package_image($package_tour->image[0]->image_path)}}" alt="" width="850" height="531" />
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
							<form class="" action="" method="get">
								<div class="text-wrap" style="display:flex;">
										<div class="col-md-5" style="width:39%;">
											<div class="f-item datepicker">
						            <label for="datepicker2">Total Quantity</label>
						            <div ><input type="number" name="quantity"  @if(Session::has('total_package_tour_ticket')) value="{{Session::get('total_package_tour_ticket')}}" @else value="1" @endif/></div>
						          </div>
										</div>
										<div class="col-md-5" style="width: 40%;margin-top: 3.5%;">
											<button type="submit" class="gradient-button right" >Change Quantity</button>
										</div>
								</div>
							</form>
							<div class="text-wrap">
								<a href="{{url('book_now/'.$package_tour->id.'/package_tour')}}" class="gradient-button right" title="Change dates">Book Now</a>
								<p>Package Cost: {{$package_tour->package_cost}}</p>
								@if($package_tour->discount != 0)
								<p>Discount: {{$package_tour->discount}}</p>
								@endif
							</div>
						</article>
					</section>
					<!--//availability-->

					<!--description-->
					<section id="description" class="tab-content">
						<article>
							{!! $package_tour->details !!}
						</article>
					</section>
					<!--//description-->


				</section>
				<!--//package_tour content-->

				<!--sidebar-->
				<aside class="right-sidebar">
					<!--package_tour details-->
					<article class="package_tour-details clearfix">
						<h1>{{$package_tour->package_name}}
							<!-- <span class="stars">
                @if($package_tour->package_tour_category >0)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($package_tour->package_tour_category >1)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($package_tour->package_tour_category >2)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($package_tour->package_tour_category >3)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($package_tour->package_tour_category >4)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
							</span> -->
						</h1>
						<span class="address">Package Valid Till {{$package_tour->valid_till}}</span>
						<!-- <span class="rating"> 8 /10</span> -->
						<div class="description">
							<p>{!! substr($value->details, 0, 200) !!} </p>
						</div>
						<!-- <div class="tags">
							<ul>
								<li><a href="#" title="Wellness">Wellness</a></li>
								<li><a href="#" title="Last minute">Last minute</a></li>
								<li><a href="#" title="Thailand">Thailand</a></li>
								<li><a href="#" title="SPA">SPA</a></li>
								<li><a href="#" title="Romantic">Romantic</a></li>
							</ul>
						</div> -->
					</article>
					<!--//package_tour details-->

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
						<p>140,000+ package_tours worldwide<br />130+ airlines<br />Over 3 million guest reviews</p>
						<h3>We’re Always Here</h3>
						<p>Call or email us, anytime<br />Get 24-hour support before, during, and after your trip</p>
					</article>
					<!--//Why Book with us?-->

					<!--Popular package_tours in the area-->
					<!-- <article class="default clearfix">
						<h2>Popular package_tours in the area</h2>
						<ul class="popular-package_tours">
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
					<!--//Popular package_tours in the area-->

					<!--Deal of the day-->
					<!-- <article class="default clearfix">
						<h2>Deal of the day</h2>
						<div class="deal-of-the-day">
							<a href="package_tour.html">
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
