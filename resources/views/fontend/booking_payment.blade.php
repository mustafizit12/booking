@extends('fontend.layouts.main')
@section('content')
<!--main-->
	<div class="main" role="main">
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<?php
				$class = '';
				$message = '';
				if(session()->has('success')){
				$class = ' flash-success';
				$message = session('success');
				}
				elseif(session()->has('error')){
				$class = ' flash-error';
				$message = session('error');
				}
				elseif(session()->has('warning')){
				$class = ' flash-warning';
				$message = session('warning');
				}elseif(isset($errors) && $errors->any()){
				$class = ' flash-error';
				$message = __('Invalid data in field(s)');
				}
				?>

				<!--three-fourth content-->
					<section class="three-fourth">

            <form id="booking" method="post" action="{{route('confirm_booking')}}" class="booking">
							@csrf
							<input type="hidden" name="id" value="{{$id}}">
							<input type="hidden" name="type" value="{{$type}}">
							<fieldset>
								<h3><span>02 </span>Payment</h3>
								<div class="row twins">
									<div class="f-item">
										<label>Payment type</label>
										<select name="payment_type" required>
											<option value="" selected="selected">Select payment type</option>
											<option value="0">Offline Payment</option>
											<option value="1">Online Payment</option>
										</select>
									</div>
									<div class="f-item">
										<label for="card_number">Online Payment</label>

									</div>
								</div>
								<div class="row">
									<div class="f-item">
										<label>Special requirements: <span>(Not Guaranteed)</span></label>
										<textarea rows="10" cols="10" value="{{old('spical_requirment')}}" name="spical_requirment"></textarea>
									</div>
									<span class="info">Please write your requests.</span>
								</div>
								<div class="row">
									<div class="f-item checkbox">
										<input type="checkbox" name="aggred" required id="check" value="aggred" />
										<label>Yes, I have read and I agree to the <a href="#">booking conditions</a>.</label>
									</div>
								</div>
								<hr />
								<input type="submit" class="gradient-button" value="Submit booking" id="next-step" />
							</fieldset>
						</form>
					</section>
				<!--//three-fourth content-->

				<!--right sidebar-->
				<aside class="right-sidebar">
          @if($type == 'room')
					<!--Booking details-->
					<article class="booking-details clearfix">
						<h1>{{$details->hotel->name}}
							<span class="stars">
                @if($details->hotel->hotel_category >0)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($details->hotel->hotel_category >1)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($details->hotel->hotel_category >2)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($details->hotel->hotel_category >3)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($details->hotel->hotel_category >4)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
							</span>
						</h1>
						<span class="address">{{$details->hotel->area->name}}</span>
						<!-- <span class="rating"> 8 /10</span> -->
						<div class="booking-info">
							<h6>Rooms</h6>
							<p>{{$details->room_name}}</p>
							<h6>Room Description</h6>
							<p>{!! substr($details->room_details, 0, 200) !!}</p>
							<h6>Check-in Date</h6>
							<p>@if(Session::has('total_days') && Session::get('total_days') != 0) {{date('D d M Y',strtotime(Session::get('check_in_date')))}} @else {{date('D d M Y',strtotime(date('Y-m-d')))}} @endif</p>
							<h6>Check-out Date</h6>
							<p>@if(Session::has('total_days') && Session::get('total_days') != 0) {{date('D d M Y',strtotime(Session::get('check_out_date')))}} @else {{date('D d M Y',strtotime(date('Y-m-d').' +1 day'))}} @endif</p>
							<h6>Room(s)</h6>
							<p>@if(Session::has('total_days') && Session::get('total_days') != 0)  {{Session::get('total_days')}} Nights, {{Session::get('rooms')}} room @else 1 Nights, 1 room. @endif</p>
						</div>
						@php
						$price = 0;
						if(Session::has('total_days') && Session::get('total_days') != 0){
							$price +=(Session::get('total_days') * $details->room_rent_adult);
							if(Session::get('child') >0){
								$price +=(Session::get('total_days') * $details->room_rent_child);
							}
						}else{
							$price = $details->room_rent_adult;
						}
						@endphp
						<div class="price">
							<p class="total">Total Price: {{$price}}</p>
							<!-- <p>VAT (20%) included</p> -->
						</div>
					</article>
					<!--//Booking details-->
          @elseif($type == 'package_tour')
          <article class="booking-details clearfix">
						<h1>{{$details->package_name}}</h1>
						<span class="address">Package Valid Till {{$details->valid_till}}</span><br>
						<span class="address">Total Quantity  @if(Session::has('total_package_tour_ticket')) {{Session::get('total_package_tour_ticket')}} @else 1 @endif</span>

						<!-- <span class="rating"> 8 /10</span> -->
						<div class="booking-info">
							<h6>Description</h6>
							<p>{!! substr($details->details, 0, 200) !!}</p>
						</div>
						<div class="price">
							<p class="total">Package Cost: @if(Session::has('total_package_tour_ticket')) {{$details->package_cost * Session::get('total_package_tour_ticket')}} @else $details->package_cost @endif</p>
							<!-- <p>VAT (20%) included</p> -->
						</div>
					</article>
          @elseif($type == 'venue')
          <article class="booking-details clearfix">
						<h1>{{$details->venue_name}}</h1>
            <span class="address">{{$details->area->name}}</span>
            <span class="address">{{$details->address}}</span>
            <span class="address">{{$details->contact_info}}</span>
						<div class="booking-info">
							<h6>From Date</h6>
							<p>@if(Session::has('total_days_venue') && Session::get('total_days_venue') != 0) {{date('D d M Y',strtotime(Session::get('from_date')))}} @else {{date('D d M Y',strtotime(date('Y-m-d')))}} @endif</p>
							<h6>To Date</h6>
							<p>@if(Session::has('total_days_venue') && Session::get('total_days_venue') != 0) {{date('D d M Y',strtotime(Session::get('to_date')))}} @else {{date('D d M Y',strtotime(date('Y-m-d').' +1 day'))}} @endif</p>
						</div>
						<div class="booking-info">
							<h6>Description</h6>
							<p>{!! substr($details->description, 0, 200) !!}</p>
						</div>
						<div class="price">
							<p class="total">Venue Rent : @if(Session::has('total_days_venue') && Session::get('total_days_venue') != 0) {{Session::get('total_days_venue') * $details->rent}} @else {{$details->rent}} @endif</p>
							<!-- <p>VAT (20%) included</p> -->
						</div>
					</article>
          @elseif($type == 'rent_a_car')
          <article class="booking-details clearfix">
            <h1>{{$details->car_model}}</h1>
            <span class="address">{{$details->owner_name}}</span>
            <span class="address">{{$details->owner_contact}}</span>
            <span class="address">{{$details->owner_address}}</span>
            <!-- <span class="rating"> 8 /10</span> -->
            <div class="booking-info">
              <h6>Description</h6>
              <p>{!! substr($details->description, 0, 200) !!}</p>
            </div>
            <!-- <div class="price">
              <p class="total">Venue Rent : {{$details->rent}}</p>

            </div> -->
          </article>
          @elseif($type == 'bus')
          <article class="booking-details clearfix">
            <h1>{{$details->bus_model}}</h1>
            <span class="address">Company Name : {{$details->company_name}}</span><br>
            <span class="address">Bus Quality : @if($details->bus_quality == 1) Ac @else Non-Ac @endif</span><br>
            <span class="address">Starting Point : {{$details->starting_point}}</span><br>
            <span class="address">End Point : {{$details->end_point}}</span><br>
            <span class="address">Departure Time :{{$details->departure_time}}</span><br>
            <span class="address">Arrival Time : {{$details->arrival_time}}</span><br>
            <span class="address">Ticket Quantity : @if(Session::has('total_bus_ticket')) {{Session::get('total_bus_ticket')}} @else 1 @endif</span><br>
            <div class="booking-info">
              <h6>Description</h6>
              <p>{!! substr($details->description, 0, 200) !!}</p>
            </div>
            <div class="price">
              <p class="total">Ticket Price: @if(Session::has('total_bus_ticket')) {{$details->price * Session::get('total_bus_ticket')}} @else $details->price @endif</p>
            </div>
          </article>
          @elseif($type == 'visa')
          <article class="booking-details clearfix">
            <h1>{{$details->title}}</h1>
            <span class="address">Company Name : {{$details->visa_country}}</span>
            <span class="address">Visa Duration : {{$details->visa_duration}}</span>
            <div class="booking-info">
              <h6>Description</h6>
              <p>{!! substr($details->details, 0, 200) !!}</p>
            </div>
            <div class="price">
              <p class="total">Cost: {{$details->cost}}</p>
              <!-- <p>VAT (20%) included</p> -->
            </div>
          </article>
          @endif
					<!--Need Help Booking?-->
					<article class="default clearfix">
						<h2>Need Help Booking?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
						<p class="number">1- 555 - 555 - 555</p>
					</article>
					<!--//Need Help Booking?-->
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
@endsection
@section('script')
<script type="text/javascript">
$('#verify_phone').click(function(){
	var phone = $('#phone').val();
	if(phone != ''){
		$.ajax({
				url: "{{route('generate_otp')}}",
				type: 'GET',
				data: {},
				success: function (data) {
					if(data != 'ok'){
						alert('please send opt again');
					}else{
						alert('Otp send successfully to you number');
					}
				}
		});
	}else{
		alert('Please enter phone number');
	}
})
</script>
@endsection
