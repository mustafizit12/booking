@extends('fontend.layouts.main')
@section('content')
<!--slider-->
<section class="slider clearfix">
  <div id="sequence">
    <ul>
      @if(sizeof($sliders)>0)
      @foreach($sliders as $key=>$value)
      <li>
        <div class="info animate-in">
          <h2>{{$value->title}}</h2><br />
          @if($value->details != null)<p>{!! $value->details !!}</p>@endif
        </div>
        <img class="main-image animate-in" src="{{ get_slider_image($value->image)}}" alt="" />
      </li>
      @endforeach
      @endif
      <!-- <li>
        <div class="info animate-in">
          <h2>Check out our top weekly deals</h2><br />
          <p>Save Now. Book Later.</p>
        </div>
        <img class="main-image animate-in" src="{{ asset('frontend/images/slider/img.jpg')}}" alt="" />
      </li>
      <li>
        <div class="info animate-in">
          <h2>Check out last minute flight, hotel &amp; vacation offers!</h2><br />
          <p>Save up to 50%!</p>
        </div>
        <img class="main-image animate-in" src="{{ asset('frontend/images/slider/img.jpg')}}" alt="" />
      </li> -->
    </ul>
  </div>
</section>
<!--//slider-->

<!--search-->
<div class="main-search">
  <form id="main-search" method="post" action="{{route('search_result')}}">
    {{ csrf_field() }}
    <!--column-->
    <div class="column radios">
      <h4><span>01</span> What?</h4>
      <div class="f-item" >
        <input type="radio" name="radio" id="hotel" value="form1" />
        <label for="hotel">Hotel</label>
      </div>
      <div class="f-item">
        <input type="radio" name="radio" id="package_tour" value="form2" />
        <label for="package_tour">Package Tour</label>
      </div>
      <div class="f-item">
        <input type="radio" name="radio" id="rent_a_car" value="form3" />
        <label for="rent_a_car">Rent A Car</label>
      </div>
      <div class="f-item" >
        <input type="radio" name="radio" id="bus" value="form4" />
        <label for="bus">Bus</label>
      </div>
      <div class="f-item">
        <input type="radio" name="radio" id="venue" value="form5" />
        <label for="venue">Venue</label>
      </div>
    </div>
    <!--//column-->
    <input type="hidden" name="select_type" id="select_type" value="hotel">
    <div class="forms">
      <!--form hotel-->
      <div class="form" id="form1">
        <!--column-->
        <div class="column">
          <h4><span>02</span> Where?</h4>
          <div class="f-item">
            <label for="search_keyword">Your destination</label>
            <input type="text" placeholder="City, region, district or specific hotel" id="search_keyword" name="search_keyword" />
            <div id="hotelList" class="item-div">
            </div>
          </div>
        </div>
        <!--//column-->

        <!--column-->
        <div class="column twins">
          <h4><span>03</span> When?</h4>
          <div class="f-item datepicker">
            <label for="datepicker1">Check-in date</label>
            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker1" name="check_in_date" value="@if(Session::has('total_days') && Session::get('total_days') != 0) {{date('m/d/Y',strtotime(Session::get('check_in_date')))}} @endif" /></div>
          </div>
          <div class="f-item datepicker">
            <label for="datepicker2">Check-out date</label>
            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker2" name="check_out_date" value="@if(Session::has('total_days') && Session::get('total_days') != 0) {{date('m/d/Y',strtotime(Session::get('check_out_date')))}} @endif"/></div>
          </div>
        </div>
        <!--//column-->

        <!--column-->
        <div class="column triplets">
          <h4><span>04</span> Who?</h4>
          <div class="f-item spinner">
            <label for="spinner1">Rooms</label>
            <input type="text" placeholder="" id="spinner1" name="rooms" value="@if(Session::has('total_days') && Session::get('total_days') != 0) {{Session::get('rooms')}} @else 1 @endif" />
          </div>
          <div class="f-item spinner">
            <label for="spinner2">Adults</label>
            <input type="text" placeholder="" id="spinner2" name="adults_member" value="@if(Session::has('total_days') && Session::get('total_days') != 0) {{Session::get('adult')}} @else 2 @endif" />
          </div>
          <div class="f-item spinner">
            <label for="spinner3">Children</label>
            <input type="text" placeholder="" id="spinner3" name="child_member" value="@if(Session::has('total_days') && Session::get('total_days') != 0) {{Session::get('child')}} @else 0 @endif" />
          </div>
        </div>
        <!--//column-->
      </div>
      <!--//form hotel-->

      <!--form package tour-->
      <div class="form" id="form2">
        <!--column-->
        <div class="column">
          <h4><span>02</span> Where?</h4>
          <div class="f-item">
            <label for="package-tour">Package Name</label>
            <input type="text" placeholder="Search specific Package" id="package-tour" name="package_tour" />
            <div id="package_list" class="item-div">
            </div>
          </div>
        </div>
        <!--//column-->

        <!--column-->
        <div class="column twins">
          <h4><span>03</span> When?</h4>
          <div class="f-item datepicker">
            <label for="datepicker1">Validity date</label>
            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker4" name="validaty_date" /></div>
          </div>
        </div>
        <!--//column-->


      </div>
      <!--//form self catering-->

      <!--form rent a car-->
      <div class="form" id="form3">
        <!--column-->
        <div class="column">
          <h4><span>02</span> Where?</h4>
          <div class="f-item">
            <label for="from_where">Leaving from</label>
            <input type="text" placeholder="City, region, district or specific area" id="from_where" name="from_where" />
            <div id="from_area_list" class="item-div">
            </div>
          </div>
          <div class="f-item">
            <label for="going_to">Going to</label>
            <input type="text" placeholder="City, region, district or specific area" id="going_to" name="going_to" />
            <div id="going_area_list" class="item-div">
            </div>
          </div>
        </div>
        <!--//column-->

        <!--column-->
        <div class="column two-childs">
          <h4><span>03</span> When?</h4>
          <div class="f-item datepicker">
            <label for="datepicker6">Departing on</label>
            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker6" name="rent_car_date" /></div>
          </div>
        </div>
        <!--//column-->

        <!--column-->
        <div class="column triplets">
          <h4><span>04</span> Who?</h4>
          <div class="f-item" style="width:100%;">
            <label for="datepicker6">Car Model</label>
            <select name="car_model">
              <option value="">Select Car Model</option>
              @if(sizeof($all_rent_a_car)>0)
              @foreach($all_rent_a_car as $key=>$car)
              <option value="{{$car->car_model}}">{{$car->car_model}}</option>
              @endforeach
              @endif
            </select>
          </div>

        </div>
        <!--//column-->
      </div>
      <!--//form flight-->

      <!--form cruise-->
      <div class="form" id="form4">
        <!--column-->
        <div class="column">
          <h4><span>02</span> Where?</h4>
          <div class="f-item">
            <label for="starting_point">Starting Point</label>
            <input type="text" placeholder="City, region, district or specific starting point" id="starting_point" name="starting_point" />
            <div id="starting_point_list" class="item-div">
            </div>
          </div>
          <div class="f-item">
            <label for="ending_point">Ending Point</label>
            <input type="text" placeholder="City, region, district or specific ending point" id="ending_point" name="ending_point" />
            <div id="ending_point_list" class="item-div">
            </div>
          </div>
        </div>
        <div class="column twins">
          <h4><span>03</span> When?</h4>
          <div class="f-item datepicker">
							<label for="datepicker11">Departure Time</label>
							<select style="opacity: 0;" name="departure_time">
                <option value="">Select Time</option>
								<option value="00:00">00:00</option>
								<option value="01:00">01:00</option>
								<option value="02:00">02:00</option>
								<option value="03:00">03:00</option>
								<option value="04:00">04:00</option>
								<option value="05:00">05:00</option>
								<option value="06:00">06:00</option>
								<option value="07:00">07:00</option>
								<option value="08:00">08:00</option>
								<option value="09:00">09:00</option>
								<option  value="10:00">10:00</option>
								<option value="11:00">11:00</option>
								<option value="12:00">12:00</option>
								<option value="13:00">13:00</option>
								<option value="14:00">14:00</option>
								<option value="15:00">15:00</option>
								<option value="16:00">16:00</option>
								<option value="17:00">17:00</option>
								<option value="18:00">18:00</option>
								<option value="19:00">19:00</option>
								<option value="20:00">20:00</option>
								<option value="21:00">21:00</option>
								<option value="22:00">22:00</option>
								<option value="23:00">23:00</option>
							</select>
            </div>
        </div>
      </div>
      <!--//form cruise-->

      <!--form flight+hotel-->
      <div class="form" id="form5">
        <!--column-->
        <div class="column" style="height:px;">
          <h4><span>02</span> Where?</h4>
          <div class="f-item">
            <label for="venue_area">Venue Area</label>
            <input type="text" placeholder="City, region, district or specific Venue" id="venue_area" name="venue_area" />
            <div id="venue_list" class="item-div">
            </div>
          </div>
        </div>
        <!--//column-->

        <!--column-->
        <div class="column two-childs">
          <h4><span>03</span> When?</h4>
          <div class="f-item datepicker">
            <label for="datepicker9">Booking Date</label>
            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker9" name="booking_date" /></div>
          </div>
        </div>
        <!--//column-->
      </div>
    </div>
    <input type="submit" value="Proceed to results" class="search-submit" id="search-submit" />
  </form>
</div>
<!--//search-->

<!--main-->
<div class="main" role="main">
  <div class="wrap clearfix">
    <!--latest offers-->
    <section class="offers clearfix full">
      <h1>Explore our latest Hotels</h1>
      @if(sizeof($hotels)>0)
      @foreach($hotels as $key=>$value)
      <!--column-->
      <article class="one-fourth @if(($key+1) == 4 ) last @endif">
        <figure><a href="#" title="">
          <img src="@if(sizeof($value->image)>0){{ get_hotel_image($value->image[0]->image_path)}}@endif" alt="" width="270" height="152" /></a></figure>
        <div class="details">
          <h4>{{$value->name}}</h4>
          <a href="{{url('hotel_details/'.$value->id)}}" title="Explore our deals" class="gradient-button">More info</a>
        </div>
      </article>
      <!--//column-->
      @endforeach
      @endif

    </section>
    <!--//latest offers-->

    <!--top destinations-->
    <section class="destinations clearfix full">
      <h1>Top Tour Package around the world</h1>
      @if(sizeof($package_tour)>0)
      @foreach($package_tour as $key=>$value)
      <!--column-->
      <article class="one-fourth @if(($key+1) == 4 ) last @endif">
        <figure><a href="#" title=""><img src="@if(sizeof($value->image)>0){{ get_tour_package_image($value->image[0]->image_path)}}@endif" alt="" width="270" height="152" /></a></figure>
        <div class="details">
          <h4>{{$value->package_name}}</h4>
          <a href="{{url('package_tour_details/'.$value->id)}}" title="Explore our deals" class="gradient-button">More info</a>
        </div>
      </article>
      <!--//column-->
      @endforeach
      @endif

      <!--//column-->
    </section>
    <!--//top destinations-->

    <!--top destinations-->
    <section class="destinations clearfix full">
      <h1>Explore our latest Bus</h1>
      @if(sizeof($bus)>0)
      @foreach($bus as $key=>$value)
      <!--column-->
      <article class="one-fourth @if(($key+1) == 4 ) last @endif">
        <figure><a href="#" title=""><img src="@if(sizeof($value->image)>0){{ get_bus_image($value->image[0]->image_path)}}@endif" alt="" width="270" height="152" /></a></figure>
        <div class="details">
          <h4>{{$value->company_name}}-{{$value->bus_model}}</h4>
          <a href="{{url('bus_details/'.$value->id)}}" title="Explore our deals" class="gradient-button">More info</a>
        </div>
      </article>
      <!--//column-->
      @endforeach
      @endif

      <!--//column-->
    </section>
    <!--//top destinations-->

    <!--top destinations-->
    <section class="destinations clearfix full">
      <h1>Explore our latest Venue</h1>
      @if(sizeof($venue)>0)
      @foreach($venue as $key=>$value)
      <!--column-->
      <article class="one-fourth @if(($key+1) == 4 ) last @endif">
        <figure><a href="#" title=""><img src="@if(sizeof($value->image)>0){{ get_venue_image($value->image[0]->image_path)}}@endif" alt="" width="270" height="152" /></a></figure>
        <div class="details">
          <h4>{{$value->venue_name}}</h4>
          <a href="{{url('venue_details/'.$value->id)}}" title="Explore our deals" class="gradient-button">More info</a>
        </div>
      </article>
      <!--//column-->
      @endforeach
      @endif


      <!--//column-->
    </section>
    <!--//top destinations-->
    <!--top destinations-->
    <section class="destinations clearfix full">
      <h1>Explore our latest Rent A Car</h1>
      @if(sizeof($rent_a_car)>0)
      @foreach($rent_a_car as $key=>$value)
      <!--column-->
      <article class="one-fourth @if(($key+1) == 4 ) last @endif">
        <figure><a href="#" title=""><img src="@if(sizeof($value->image)>0){{ get_rent_car_image($value->image[0]->image_path)}}@endif" alt="" width="270" height="152" /></a></figure>
        <div class="details">
          <h4>{{$value->car_model}}</h4>
          <a href="{{url('rent_a_car_details/'.$value->id)}}" title="Explore our deals" class="gradient-button">More info</a>
        </div>
      </article>
      <!--//column-->
      @endforeach
      @endif

      <!--//column-->
    </section>
    <!--//top destinations-->
    <!--top destinations-->
    <section class="destinations clearfix full">
      <h1>Explore our latest Visa</h1>
      @if(sizeof($visa)>0)
      @foreach($visa as $key=>$value)
      <!--column-->
      <article class="one-fourth @if(($key+1) == 4 ) last @endif">
        <figure><a href="#" title=""><img src="@if(sizeof(explode(',',$value->image))>0){{ get_visa_image(explode(',',$value->image)[0])}}@endif" alt="" width="270" height="152" /></a></figure>
        <div class="details">
          <h4>{{$value->title}}</h4>
          <a href="{{url('visa_details/'.$value->id)}}" title="Explore our deals" class="gradient-button">More info</a>
        </div>
      </article>
      <!--//column-->
      @endforeach
      @endif

      <!--//column-->
    </section>
    <!--//top destinations-->
    <!--info boxes-->
    <section class="boxes clearfix">
      <!--column-->
      <article class="one-fourth">
        <h2>Handpicked Hotels</h2>
        <p>All Book Your Travel Hotels fulfil strict selection criteria. Each hotel is chosen individually and inclusion cannot be bought. </p>
      </article>
      <!--//column-->

      <!--column-->
      <article class="one-fourth">
        <h2>Detailed Descriptions</h2>
        <p>To give you an accurate impression of the hotel, we endeavor to publish transparent, balanced and precise hotel descriptions. </p>
      </article>
      <!--//column-->

      <!--column-->
      <article class="one-fourth">
        <h2>Exclusive Knowledge</h2>
        <p>We’ve done our research. Our scouts are always busy finding out more about our hotels, the surroundings and activities on offer nearby.</p>
      </article>
      <!--//column-->

      <!--column-->
      <article class="one-fourth last">
        <h2>Passionate Service</h2>
        <p>Book Your Travels’s team will cater to your special requests. We offer expert and passionate advice for finding the right hotel. </p>
      </article>
      <!--//column-->

      <!--column-->
      <article class="one-fourth">
        <h2>Best Price Guarantee</h2>
        <p>We offer the best hotels at the best prices. If you find the same room category on the same dates cheaper elsewhere, we will refund the difference. Guaranteed, and quickly. </p>
      </article>
      <!--//column-->

      <!--column-->
      <article class="one-fourth">
        <h2>Secure Booking</h2>
        <p>Book Your Travel reservation system is secure and your credit card and personal information is encrypted.<br />We work to high standards and guarantee your privacy. </p>
      </article>
      <!--//column-->

      <!--column-->
      <article class="one-fourth">
        <h2>Benefits for Hoteliers</h2>
        <p>We provide a cost-effective model, a network of over 5000 partners and a personalised account management service to help you optimise your revenue.</p>
      </article>
      <!--//column-->

      <!--column-->
      <article class="one-fourth last">
        <h2>Any Questions?</h2>
        <p>Call us on <em>1-555-555-555</em> for individual, tailored advice for your perfect stay or <a href="contact.html" title="Contact">send us a message</a> with your hotel booking query.<br /><br /></p>
      </article>
      <!--//column-->
    </section>
    <!--//info boxes-->
  </div>
</div>

<!--//main-->
@endsection
@section('script')
<script>
$(document).ready(function(){
  //hotel
    $('#search_keyword').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         //var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"GET",
          data:{keyword:query},
          success:function(data){
           $('#hotelList').fadeIn();
           $('#hotelList').html(data);
          }
         });
        }
    });

    $(document).on('click', '.hotel_name_list', function(){
        $('#search_keyword').val($(this).text());
        $('#hotelList').fadeOut();
    });
    //package Tour
    $('#package-tour').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         //var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.package_tour') }}",
          method:"GET",
          data:{keyword:query},
          success:function(data){
           $('#package_list').fadeIn();
           $('#package_list').html(data);
          }
         });
        }
    });
    $(document).on('click', '.package_tour_list', function(){
        $('#package-tour').val($(this).text());
        $('#package_list').fadeOut();
    });
    //from where area rent a car
    $('#from_where').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         //var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.from_where_area') }}",
          method:"GET",
          data:{keyword:query},
          success:function(data){
           $('#from_area_list').fadeIn();
           $('#from_area_list').html(data);
          }
         });
        }
    });
    $(document).on('click', '.from_area_list', function(){
        $('#from_where').val($(this).text());
        $('#from_area_list').fadeOut();
    });
    //going to area rent a car
    $('#going_to').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         //var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.going_to_area') }}",
          method:"GET",
          data:{keyword:query},
          success:function(data){
           $('#going_area_list').fadeIn();
           $('#going_area_list').html(data);
          }
         });
        }
    });
    $(document).on('click', '.going_area_list', function(){
        $('#going_to').val($(this).text());
        $('#going_area_list').fadeOut();
    });
    //Starting POINT BUS
    $('#starting_point').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         //var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.starting_point_bus') }}",
          method:"GET",
          data:{keyword:query},
          success:function(data){
           $('#starting_point_list').fadeIn();
           $('#starting_point_list').html(data);
          }
         });
        }
    });
    $(document).on('click', '.starting_point_list', function(){
        $('#starting_point').val($(this).text());
        $('#starting_point_list').fadeOut();
    });
    //ending point bus
    $('#ending_point').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         //var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.ending_point_bus') }}",
          method:"GET",
          data:{keyword:query},
          success:function(data){
           $('#ending_point_list').fadeIn();
           $('#ending_point_list').html(data);
          }
         });
        }
    });
    $(document).on('click', '.ending_point_list', function(){
        $('#ending_point').val($(this).text());
        $('#ending_point_list').fadeOut();
    });
    //venue area
    $('#venue_area').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         //var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.venue_search') }}",
          method:"GET",
          data:{keyword:query},
          success:function(data){
           $('#venue_list').fadeIn();
           $('#venue_list').html(data);
          }
         });
        }
    });

    $(document).on('click', '.venue_list', function(){
        $('#venue_area').val($(this).text());
        $('#venue_list').fadeOut();
    });
    $( "input:radio[name=radio]" ).on( "change", function() {
         var item = $(this).val();
         if(item == 'form1'){
           $('#select_type').val('hotel');
         }else if (item == 'form2') {
           $('#select_type').val('package_tour');
         }else if (item == 'form3') {
           $('#select_type').val('rent_a_car');
         }else if (item == 'form4') {
           $('#select_type').val('bus');
         }else if (item == 'form5') {
           $('#select_type').val('venue');
         }
    });

});
</script>
@endsection
