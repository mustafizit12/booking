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
          <form id="booking" method="post" action="booking" class="booking">
            <fieldset>
              <h3><span>03 </span>Confirmation</h3>
              <div class="text-wrap">
                <!-- <a href="#" class="gradient-button print" title="Print booking" onclick="printpage()">Print booking</a> -->
                <p>Thank you. Your booking is now Processing.</p>
              </div>

              <h3>Traveller info</h3>
              <div class="text-wrap">
                <div class="output">
                  <p>Booking number:</p>
                  <p>{{$details->orderBy->profile->phone}}</p>
                  <p>Fist name: </p>
                  <p>{{$details->orderBy->profile->first_name}}</p>
                  <p>Last name: </p>
                  <p>{{$details->orderBy->profile->last_name}}</p>
                  <p>E-mail address: </p>
                  <p>{{$details->orderBy->email}}</p>
                  <p>Address:</p>
                  <p>{{$details->orderBy->profile->address}}</p>
                </div>
              </div>

              <h3>Special requirements</h3>
              <div class="text-wrap">
                <p>{{$details->spical_requirment}}</p>
              </div>
<!--
              <h3>Payment</h3>
              <div class="text-wrap">
                <p>You have now confirmed and guaranteed your booking by credit card.<br />All payments are to be made at the hotel during your stay, unless otherwise stated in the hotel policies or in the room conditions.<br />Please note that your credit card may be pre-authorised prior to your arrival. </p>
                <p><strong class="dark">This hotel accepts the following forms of payment:</strong></p>
                <p>American Express, Visa, MasterCard</p>
              </div>

              <h3>Don’t forget</h3>
              <div class="text-wrap">
                <p>You can change or cancel your booking via our online self service tool myBookYourTravel:<br />
                <a href="#" class="turqouise-link">https://secure.bookyourtravel.com/myreservations.html?tmpl=profile/myreservations;bn=904054553;pincode=6525</a></p><br />
                <p><strong>We wish you a pleasant stay</strong><br /><i>your BookYourTravel team</i></p>
              </div> -->
            </fieldset>
          </form>

        </section>
				<!--//three-fourth content-->

				<!--right sidebar-->
				<aside class="right-sidebar">
          @if($type == 'room')
          @php
          $hotel = App\Models\Admin\Room::where('id',$details->room_id)->first();
          @endphp
					<!--Booking details-->
					<article class="booking-details clearfix">
						<h1>{{$hotel->hotel->name}}
							<span class="stars">
                @if($hotel->hotel->hotel_category >0)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($hotel->hotel->hotel_category >1)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($hotel->hotel->hotel_category >2)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($hotel->hotel->hotel_category >3)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
                @if($hotel->hotel->hotel_category >4)
                <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                @endif
							</span>
						</h1>
						<span class="address">{{$hotel->hotel->area->name}}</span>
						<!-- <span class="rating"> 8 /10</span> -->
						<div class="booking-info">
							<h6>Rooms</h6>
							<p>{{$hotel->room_name}}</p>
							<h6>Room Description</h6>
							<p>{!! substr($hotel->room_details, 0, 200) !!}</p>
							<h6>Check-in Date</h6>
							<p>{{date('D d M Y',strtotime($details->from_date))}} </p>
							<h6>Check-out Date</h6>
							<p>{{date('D d M Y',strtotime($details->to_date))}} </p>
							<h6>Room(s)</h6>
							<p>{{$details->days}} Nights, {{$details->room}} room </p>
						</div>
						<div class="price">
							<p class="total">Total Price: {{$details->total_rent}} </p>
							<!-- <p>VAT (20%) included</p> -->
						</div>
					</article>
					<!--//Booking details-->
          @elseif($type == 'package_tour')
          @php
          $tour_package = App\Models\Admin\TourPackageInfo::where('id',$details->package_id)->first();
          @endphp
          <article class="booking-details clearfix">
						<h1>{{$tour_package->package_name}}</h1>
						<span class="address">Package Valid Till {{$tour_package->valid_till}}</span><br>
						<span class="address">Total Quantity  {{$details->order_quantity}}</span>
						<!-- <span class="rating"> 8 /10</span> -->
						<div class="booking-info">
							<h6>Description</h6>
							<p>{!! substr($tour_package->details, 0, 200) !!}</p>
						</div>
						<div class="price">
							<p class="total">Package Cost: {{$details->total_cost}}</p>
							<!-- <p>VAT (20%) included</p> -->
						</div>
					</article>
          @elseif($type == 'venue')
          @php
          $venue = App\Models\Admin\VenueInfo::where('id',$details->venue_id)->first();
          @endphp
          <article class="booking-details clearfix">
						<h1>{{$venue->venue_name}}</h1>
            <span class="address">{{$venue->area->name}}</span>
            <span class="address">{{$venue->address}}</span>
            <span class="address">{{$venue->contact_info}}</span>
						<div class="booking-info">
							<h6>From Date</h6>
							<p>{{date('D d M Y',strtotime($details->from_date))}}</p>
							<h6>To Date</h6>
							<p>{{date('D d M Y',strtotime($details->to_date))}} </p>
						</div>
						<div class="booking-info">
							<h6>Description</h6>
							<p>{!! substr($venue->description, 0, 200) !!}</p>
						</div>
						<div class="price">
							<p class="total">Venue Rent : {{$details->total_rent}}</p>
							<!-- <p>VAT (20%) included</p> -->
						</div>
					</article>
          @elseif($type == 'rent_a_car')
          @php
          $rent_a_car = App\Models\Admin\RentCarInfo::where('id',$details->rent_id)->first();
          @endphp
          <article class="booking-details clearfix">
            <h1>{{$rent_a_car->car_model}}</h1>
            <span class="address">{{$rent_a_car->owner_name}}</span>
            <span class="address">{{$rent_a_car->owner_contact}}</span>
            <span class="address">{{$rent_a_car->owner_address}}</span>
            <!-- <span class="rating"> 8 /10</span> -->
            <div class="booking-info">
              <h6>Description</h6>
              <p>{!! substr($rent_a_car->description, 0, 200) !!}</p>
            </div>
            <!-- <div class="price">
              <p class="total">Venue Rent : {{$details->rent}}</p>

            </div> -->
          </article>
          @elseif($type == 'bus')
          @php
          $bus = App\Models\Admin\BusInfo::where('id',$details->bus_id)->first();
          @endphp
          <article class="booking-details clearfix">
            <h1>{{$bus->bus_model}}</h1>
            <span class="address">Company Name : {{$bus->company_name}}</span><br>
            <span class="address">Bus Quality : @if($bus->bus_quality == 1) Ac @else Non-Ac @endif</span><br>
            <span class="address">Starting Point : {{$bus->starting_point}}</span><br>
            <span class="address">End Point : {{$bus->end_point}}</span><br>
            <span class="address">Departure Time :{{$bus->departure_time}}</span><br>
            <span class="address">Arrival Time : {{$bus->arrival_time}}</span><br>
            <span class="address">Ticket Quantity : {{$details->seat_quantity}}</span><br>
            <div class="booking-info">
              <h6>Description</h6>
              <p>{!! substr($bus->description, 0, 200) !!}</p>
            </div>
            <div class="price">
              <p class="total">Ticket Price: {{$details->total_rent}}</p>
              <!-- <p>VAT (20%) included</p> -->
            </div>
          </article>
          @elseif($type == 'visa')
          @php
          $visa = App\Models\Admin\VisaInfo::where('id',$details->visa_id)->first();
          @endphp
          <article class="booking-details clearfix">
            <h1>{{$visa->title}}</h1>
            <span class="address">Company Name : {{$visa->visa_country}}</span>
            <span class="address">Visa Duration : {{$visa->visa_duration}}</span>
            <div class="booking-info">
              <h6>Description</h6>
              <p>{!! substr($visa->details, 0, 200) !!}</p>
            </div>
            <div class="price">
              <p class="total">Cost: {{$visa->cost}}</p>
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

</script>
@endsection
