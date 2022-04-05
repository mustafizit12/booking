@extends('fontend.layouts.main')
@section('content')
<!--main-->
<div class="main" role="main">
  <div class="wrap clearfix">
    <!--main content-->
    <div class="content clearfix">
      <!--sidebar-->
      <aside class="left-sidebar">
        <article class="refine-search-results">
          <h2>Refine search results</h2>
          <form class="" action="" method="get">
          <dl>
            <!--Price (per night)-->
            <dt>Price (per night)</dt>
            <dd>
              <div class="checkbox">
                <input type="checkbox" id="ch1" value="0 - 4999" name="price[]" />
                <label for="ch1">0 - 4999</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch2" value="5000 - 9999" name="price[]" />
                <label for="ch2">5000 - 9999</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch3" value="10000 - 14999" name="price[]" />
                <label for="ch3">10000 - 14999</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch4" value="15000 - 20000" name="price[]" />
                <label for="ch4">15000 - 20000</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch5" value="20000" name="price[]" />
                <label for="ch5">20000 +</label>
              </div>
            </dd>
            <!--//Price (per night)-->

            <!--Star rating-->
            <dt>Star rating</dt>
            <dd>
              <div id="star" ></div>
            </dd>
            <!--//Star rating-->

            <!--Hotel facilities-->
            <dt>Hotel facilities</dt>
            <dd>
              <div class="checkbox">
                <input type="checkbox" id="ch15" value="Wi-Fi" name="facilities[]" />
                <label for="ch15">Wi-Fi</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch16" value="Parking" name="facilities[]" />
                <label for="ch16">Parking</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch17" value="Airport Shuttle" name="facilities[]" />
                <label for="ch17">Airport Shuttle</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch18" value="Meeting / Banquet Facilities" name="facilities[]" />
                <label for="ch18">Meeting / Banquet Facilities</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch19" value="Swimming pool" name="facilities[]" />
                <label for="ch19">Swimming pool</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch20" value="Restaurant" name="facilities[]" />
                <label for="ch20">Restaurant</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch21" value="Fitness Centre" name="facilities[]" />
                <label for="ch21">Fitness Centre</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch22" value="SPA And Wellness Centre" name="facilities[]" />
                <label for="ch22">SPA &amp; Wellness Centre</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch23" value="Pets allowed" name="facilities[]" />
                <label for="ch23">Pets allowed</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch24" value="Lift" name="facilities[]" />
                <label for="ch24">Lift</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch25" value="Air condition" name="facilities[]" />
                <label for="ch25">Air condition</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch26" value="Family rooms" name="facilities[]" />
                <label for="ch26">Family rooms</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch27" value="Non - smoking rooms" name="facilities[]" />
                <label for="ch27">Non - smoking rooms</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch28" value="Rooms/facilities for disabled guests" name="facilities[]" />
                <label for="ch28">Rooms/facilities for disabled guests</label>
              </div>
            </dd>
            <!--//Hotel facilities-->

            <!--Room facilites-->
            <dt>Room facilites</dt>
            <dd>
              <div class="checkbox">
                <input type="checkbox" id="ch29" value="Bathroom" name="room_facilities[]" />
                <label for="ch29">Bathroom</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch30" value="Cable TV" name="room_facilities[]" />
                <label for="ch30">Cable TV</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch31" value="Air conditioning" name="room_facilities[]" />
                <label for="ch31">Air conditioning</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch32" value="Mini bar" name="room_facilities[]" />
                <label for="ch32">Mini bar</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch33" value="WiFi" name="room_facilities[]" />
                <label for="ch33">WiFi</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch34" value="Wheelchair - friendly room" name="room_facilities[]" />
                <label for="ch34">Wheelchair - friendly room</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch35" value="Pay TV" name="room_facilities[]" />
                <label for="ch35">Pay TV</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch36" value="Desk" name="room_facilities[]" />
                <label for="ch36">Desk</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ch37" value="Room safe" name="room_facilities[]" />
                <label for="ch37">Room safe</label>
              </div>
            </dd>
            <!--//Room facilites-->

          </dl>
          <button style="margin-top:5%;" type="submit" class="gradient-button">Search</button>
          </form>
        </article>
      </aside>
      <!--//sidebar-->

      <!--three-fourth content-->
        <section class="three-fourth">
          <div class="sort-by">
            <!-- <h3>Sort by</h3>
            <ul class="sort">
              <li>Price <a href="?orderbyprice=ascending" title="ascending" id="orderasc" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
              <li>Stars <a href="?orderbystar=ascending" title="ascending" id="starasc" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
            </ul> -->

            <ul class="view-type">
              <li class="grid-view"><a href="#" title="grid view">grid view</a></li>
              <li class="list-view"><a href="#" title="list view">list view</a></li>
              <!-- <li class="location-view"><a href="#" title="location view">location view</a></li> -->
            </ul>
          </div>

          <div class="deals clearfix">
            @if(isset($search_hotel) && !empty($search_hotel))
            @php
            $image = App\Models\Admin\HotelImage::where('hotel_id',$search_hotel->id)->get();
            @endphp
            <!--deal-->
            <article class="one-fourth">
              <figure><a href="{{url('hotel_details/'.$search_hotel->id)}}" title="">
                <img src="@if(sizeof($image)>0){{ get_hotel_image($image[0]->image_path)}}@endif" alt="" width="270" height="152" /></a></figure>
              <div class="details">
                <h1>{{$search_hotel->name}}
                  <span class="stars">
                    @if($search_hotel->hotel_category >0)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                    @if($search_hotel->hotel_category >1)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                    @if($search_hotel->hotel_category >2)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                    @if($search_hotel->hotel_category >3)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                    @if($search_hotel->hotel_category >4)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                  </span>
                </h1>
                <span class="address">{{$search_hotel->area_name}}</span>
                @if(Session::has('total_days') && Session::get('total_days') != 0)
                <span class="price">{{Session::get('total_days')}} Nights {{Session::get('adult')}} Adult  <em>BDT {{Session::get('total_days') * $search_hotel->min_room_cost}}</em> </span>
                @else
                <span class="price">Price per room per night from  <em>{{$search_hotel->min_room_cost}}</em> </span>
                @endif
                <div class="description">
                  @if(strlen($search_hotel->description)>200)
                  <p>{!! substr($search_hotel->description, 0, 200) !!} <a href="{{url('hotel_details/'.$search_hotel->id)}}">More info</a></p>
                  @else
                  <p>{!! $search_hotel->description !!} </p>
                  @endif
                </div>
                <a href="{{url('hotel_details/'.$search_hotel->id)}}" title="Book now" class="gradient-button">Book now</a>
              </div>
            </article>
            <!--//deal-->

            @endif
            @if(sizeof($hotels)>0)
            @foreach($hotels as $key=>$value)
            @php
            $image = App\Models\Admin\HotelImage::where('hotel_id',$value->id)->get();
            @endphp
            <!--deal-->
            <article class="one-fourth">
              <figure><a href="{{url('hotel_details/'.$value->id)}}" title="">
                <img src="@if(sizeof($image)>0){{ get_hotel_image($image[0]->image_path)}}@endif" alt="" width="270" height="152" /></a></figure>
              <div class="details">
                <h1>{{$value->name}}
                  <span class="stars">
                    @if($value->hotel_category >0)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                    @if($value->hotel_category >1)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                    @if($value->hotel_category >2)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                    @if($value->hotel_category >3)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                    @if($value->hotel_category >4)
                    <img src="{{ asset('frontend/images/ico/star.png')}}" alt="" />
                    @endif
                  </span>
                </h1>
                <span class="address">{{$value->area_name}}</span>
                @if(Session::has('total_days') && Session::get('total_days') != 0)
                <span class="price">{{Session::get('total_days')}} Nights {{Session::get('adult')}} Adult @if(Session::get('child')) {{Session::get('child')}} Child @endif  <em>BDT {{Session::get('total_days') * $value->min_room_cost}}</em> </span>
                @else
                <span class="price">Price per room per night from  <em>{{$value->min_room_cost}}</em> </span>
                @endif
                <div class="description">
                  @if(strlen($value->description)>200)
                  <p>{!! substr($value->description, 0, 200) !!} <a href="{{url('hotel_details/'.$value->id)}}">More info</a></p>
                  @else
                  <p>{!! $value->description !!} </p>
                  @endif
                </div>
                <a href="{{url('hotel_details/'.$value->id)}}" title="Book now" class="gradient-button">Book now</a>
              </div>
            </article>
            <!--//deal-->
            @endforeach
            @endif

            <!--bottom navigation-->
            <div class="bottom-nav">
              <!--back up button-->
              <a href="#" class="scroll-to-top" title="Back up">Back up</a>
              <!--//back up button-->

              <!--pager-->
              <!-- <div class="pager">
                <span><a href="#">First page</a></span>
                <span><a href="#">&lt;</a></span>
                <span class="current">1</span>
                <span><a href="#">2</a></span>
                <span><a href="#">3</a></span>
                <span><a href="#">4</a></span>
                <span><a href="#">5</a></span>
                <span><a href="#">6</a></span>
                <span><a href="#">7</a></span>
                <span><a href="#">8</a></span>
                <span><a href="#">&gt;</a></span>
                <span><a href="#">Last page</a></span>
              </div> -->
              <!--//pager-->
            </div>
            <!--//bottom navigation-->
          </div>
        </section>
      <!--//three-fourth content-->
    </div>
    <!--//main content-->
  </div>
</div>
<!--//main-->
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {

  $('dt').each(function() {
    var tis = $(this), state = false, answer = tis.next('dd').hide().css('height','auto').slideUp();
    tis.click(function() {
      state = !state;
      answer.slideToggle(state);
      tis.toggleClass('active',state);
    });
  });

  $('.view-type li:first-child').addClass('active');

  $('#star').raty({
  //  score    : 3,
    click: function(score, evt) {
  //  alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
    }
  });


});

$(window).load(function () {
var maxHeight = 0;

$(".three-fourth .one-fourth").each(function(){
if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
});
$(".three-fourth .one-fourth").height(maxHeight);
});

</script>
@endsection
