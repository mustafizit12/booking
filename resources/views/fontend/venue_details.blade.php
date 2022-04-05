@extends('fontend.layouts.main')
@section('content')
<!--main-->
	<div class="main" role="main">
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">


				<!--venue three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						@if(sizeof($venue->image)>0)
            @php $i =0; @endphp
            @foreach($venue->image as $key=>$value)
            @php $i++; @endphp
						<img src="{{get_venue_image($value->image_path)}}" alt="" width="850" height="531" />
            @endforeach
            @if($i < 4 && $i > 0)
            @for(; $i < 4;$i++)
            <img src="{{get_venue_image($venue->image[0]->image_path)}}" alt="" width="850" height="531" />
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
							<li class="facilities"><a href="#facilities" title="Facilities">Facilities</a></li>
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
					            <label for="datepicker1">From date</label>
					            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker1" name="from_date" value="@if(Session::has('total_days_venue') && Session::get('total_days_venue') != 0) {{date('m/d/Y',strtotime(Session::get('from_date')))}} @else {{date('m/d/Y',strtotime(date('Y-m-d')))}} @endif"  /></div>
					          </div>
									</div>
									<div class="col-md-5" style="width:39%;">
										<div class="f-item datepicker">
					            <label for="datepicker2">To date</label>
					            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker2" name="to_date" value="@if(Session::has('total_days_venue') && Session::get('total_days_venue') != 0) {{date('m/d/Y',strtotime(Session::get('to_date')))}} @else {{date('m/d/Y',strtotime(date('Y-m-d').' +1 day'))}} @endif"/></div>
					          </div>
									</div>
									<div class="col-md-2" style="width: 21%;margin-top: 3.5%;">
										<button type="submit" class="gradient-button right" >Change dates</button>
									</div>

							</div>
							</form>
							<div class="text-wrap">
								<a href="{{url('book_now/'.$venue->id.'/venue')}}" class="gradient-button right" title="Change dates">Book Now</a>
								<p>Venue Rent : @if(Session::has('total_days_venue') && Session::get('total_days_venue') != 0) {{Session::get('total_days_venue') * $venue->rent}} @else {{$venue->rent}} @endif</p>
                @if($venue->discount != 0)
                <p>Discount : {{$venue->discount}}</p>
                @endif
                <p>Address : {{$venue->address}}</p>
                <p>Contact Info : {{$venue->contact_info}}</p>
							</div>
						</article>
					</section>
					<!--//availability-->

					<!--description-->
					<section id="description" class="tab-content">
						<article>
							{!! $venue->description !!}
						</article>
					</section>
					<!--//description-->

					<!--facilities-->
					<section id="facilities" class="tab-content">
						<article>
							{!! $venue->features !!}
						</article>
					</section>
					<!--//facilities-->
				</section>
				<!--//venue content-->

				<!--sidebar-->
				<aside class="right-sidebar">
					<!--venue details-->
					<article class="venue-details clearfix">
						<h1>{{$venue->venue_name}}
						</h1>
						<span class="address">{{$venue->area->name}}</span>
						<!-- <span class="rating"> 8 /10</span> -->
						<div class="description">
							<p>{!! substr($value->description, 0, 200) !!} </p>
						</div>

					</article>
					<!--//venue details-->

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
						<p>140,000+ venues worldwide<br />130+ airlines<br />Over 3 million guest reviews</p>
						<h3>We’re Always Here</h3>
						<p>Call or email us, anytime<br />Get 24-hour support before, during, and after your trip</p>
					</article>
					<!--//Why Book with us?-->

					<!--Popular venues in the area-->
					<!-- <article class="default clearfix">
						<h2>Popular venues in the area</h2>
						<ul class="popular-venues">
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
					<!--//Popular venues in the area-->

					<!--Deal of the day-->
					<!-- <article class="default clearfix">
						<h2>Deal of the day</h2>
						<div class="deal-of-the-day">
							<a href="venue.html">
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
