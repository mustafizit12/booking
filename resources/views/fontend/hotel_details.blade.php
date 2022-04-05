@extends('fontend.layouts.main')
@section('content')
<!--main-->
	<div class="main" role="main">
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">


				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						@if(sizeof($hotel->image)>0)
            @php $i =0; @endphp
            @foreach($hotel->image as $key=>$value)
            @php $i++; @endphp
						<img src="{{get_hotel_image($value->image_path)}}" alt="" width="850" height="531" />
            @endforeach
            @if($i < 4 && $i > 0)
            @for(; $i < 4;$i++)
            <img src="{{get_hotel_image($hotel->image[0]->image_path)}}" alt="" width="850" height="531" />
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
							<!-- <div class="text-wrap">
								<a href="#" class="gradient-button right" title="Change dates">Change dates</a>
								@if(Session::has('total_days') && Session::get('total_days') != 0)
								<p>Available rooms from <span class="date">{{date('D d M Y',strtotime(Session::get('check_in_date')))}}</span> to <span class="date">{{date('D d M Y',strtotime(Session::get('check_out_date')))}}</span>.</p>
								@else
								<p>Available rooms from <span class="date">{{date('D d M Y',strtotime(date('Y-m-d')))}}</span> to <span class="date">{{date('D d M Y',strtotime(date('Y-m-d').' +1 day'))}}</span>.</p>
								@endif
							</div> -->
							<form class="" action="" method="get">
							<div class="text-wrap" style="display:flex;">

									<div class="col-md-5" style="width:39%;">
										<div class="f-item datepicker">
					            <label for="datepicker1">Check-in date</label>
					            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker1" name="check_in_date" value="@if(Session::has('total_days') && Session::get('total_days') != 0) {{date('m/d/Y',strtotime(Session::get('check_in_date')))}} @else {{date('m/d/Y',strtotime(date('Y-m-d')))}} @endif"  /></div>
					          </div>
									</div>
									<div class="col-md-5" style="width:39%;">
										<div class="f-item datepicker">
					            <label for="datepicker2">Check-out date</label>
					            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker2" name="check_out_date" value="@if(Session::has('total_days') && Session::get('total_days') != 0) {{date('m/d/Y',strtotime(Session::get('check_out_date')))}} @else {{date('m/d/Y',strtotime(date('Y-m-d').' +1 day'))}} @endif"/></div>
					          </div>
									</div>
									<div class="col-md-2" style="width: 21%;margin-top: 3.5%;">
										<button type="submit" class="gradient-button right" >Change dates</button>
									</div>

							</div>
							</form>
							<div class="text-wrap">
								<h1 style="width:50%;">Room types</h1>
								<h1 style="width:50%;float:right;text-align:right;">@if(Session::has('total_days') && Session::get('total_days') != 0)  {{Session::get('total_days')}} Nights @else 1 Nights @endif</h1>
							</div>

							<ul class="room-types">
								<!--room-->
                @if(sizeof($hotel->rooms)>0)
                @foreach($hotel->rooms as $key=>$value)
								<li>
									<figure class="left">
                    <img src="@if(sizeof($value->image)>0) {{get_room_image($value->image[0]->image_path)}} @endif" alt="" width="270" height="152" />
                    <a href="@if(sizeof($value->image)>0) {{get_room_image($value->image[0]->image_path)}} @endif" class="image-overlay" rel="prettyPhoto[gallery1]"></a></figure>
									<div class="meta">
										<h2>{{$value->room_name}}</h2>
										<!-- <p>Prices are per room<br />20 % VAT Included in price</p> -->
										<!-- <p>Non-refundable<br />Full English breakfast $ 24.80 </p> -->
										<a href="javascript:void(0)" title="more info" class="more-info">+ more info</a>
									</div>
									<div class="room-information">
										<!-- <div class="row">
											<span class="first">Max:</span>
											<span class="second"><img src="images/ico/person.png" alt="" /><img src="images/ico/person.png" alt="" /></span>
										</div> -->
										<div class="row">
											<span class="first">Price:</span>
											@php
											$price = 0;
											if(Session::has('total_days') && Session::get('total_days') != 0){
												$price +=(Session::get('total_days') * $value->room_rent_adult);
												if(Session::get('child') >0){
													$price +=(Session::get('total_days') * $value->room_rent_child);
												}
											}else{
												$price = $value->room_rent_adult;
											}
											@endphp
											<span class="second">{{$price}}</span>
										</div>
										<div class="row">
											<span class="first">Rooms:</span>
											<span class="second">{{$value->quantity}}</span>
										</div>
										<a href="{{url('book_now/'.$value->id.'/room')}}" class="gradient-button" title="Book">Book</a>
									</div>
									<div class="more-information">
										{!! $value->room_details !!}
									</div>
								</li>
								<!--//room-->
                @endforeach
                @endif
							</ul>
						</article>
					</section>
					<!--//availability-->

					<!--description-->
					<section id="description" class="tab-content">
						<article>
							{!! $hotel->description !!}
						</article>
					</section>
					<!--//description-->

					<!--facilities-->
					<section id="facilities" class="tab-content">
						<article>
							{!! $hotel->features !!}
						</article>
					</section>
					<!--//facilities-->
				</section>
				<!--//hotel content-->

				<!--sidebar-->
				<aside class="right-sidebar">
					<!--hotel details-->
					<article class="hotel-details clearfix">
						<h1>{{$hotel->name}}
							<span class="stars">
                @if($hotel->hotel_category >0)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($hotel->hotel_category >1)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($hotel->hotel_category >2)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($hotel->hotel_category >3)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($hotel->hotel_category >4)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
							</span>
						</h1>
						<span class="address">{{$hotel->area->name}}</span>
						<!-- <span class="rating"> 8 /10</span> -->
						<div class="description">
							<p>{!! substr($value->description, 0, 200) !!} </p>
						</div>
						<div class="tags">
							<ul>
								@if(sizeof($hotel->keywords)>0)
								@foreach($hotel->keywords as $key=>$value)
								<li><a href="#" title="{{$value->keyword}}">{{$value->keyword}}</a></li>
								@endforeach
								@endif
								<!-- <li><a href="#" title="Last minute">Last minute</a></li>
								<li><a href="#" title="Thailand">Thailand</a></li>
								<li><a href="#" title="SPA">SPA</a></li>
								<li><a href="#" title="Romantic">Romantic</a></li> -->
							</ul>
						</div>
					</article>
					<!--//hotel details-->

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
						<p>140,000+ hotels worldwide<br />130+ airlines<br />Over 3 million guest reviews</p>
						<h3>We’re Always Here</h3>
						<p>Call or email us, anytime<br />Get 24-hour support before, during, and after your trip</p>
					</article>
					<!--//Why Book with us?-->

					<!--Popular hotels in the area-->
					<!-- <article class="default clearfix">
						<h2>Popular hotels in the area</h2>
						<ul class="popular-hotels">
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
					<!--//Popular hotels in the area-->

					<!--Deal of the day-->
					<!-- <article class="default clearfix">
						<h2>Deal of the day</h2>
						<div class="deal-of-the-day">
							<a href="hotel.html">
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
