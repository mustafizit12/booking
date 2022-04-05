@extends('fontend.layouts.main')
@section('content')
<!--main-->
<div class="main" role="main">
  <div class="wrap clearfix">
    <!--main content-->
    <div class="content clearfix">

      <!--three-fourth content-->
        <section class="full">
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
          @php $i=4;@endphp
          <div class="deals clearfix">
            @if(sizeof($package_tour)>0)
            @foreach($package_tour as $key=>$value)
            @php
            $image = App\Models\Admin\TourPackageImage::where('package_id',$value->id)->get();
            @endphp
            <!--deal-->
            <article class="one-fourth @if($key+1 == $i) last {{$i+=4}} @endif">
              <figure><a href="{{url('package_tour_details/'.$value->id)}}" title="">
                <img src="@if(sizeof($image)>0){{ get_tour_package_image($image[0]->image_path)}}@endif" alt="" width="270" height="152" /></a></figure>
              <div class="details">
                <h1>{{$value->package_name}}</h1>
                <span class="address">Valid On {{date('d F Y',strtotime($value->valid_till))}}</span>
                <span class="price">Package Amount  <em>{{$value->package_cost}}</em> </span>
                @if($value->discount >0)
                <span class="price">Package Discount  <em>{{$value->discount}}</em> </span>
                @endif
                <div class="description">
                  @if(strlen($value->details)>200)
                  <p>{!! substr($value->details, 0, 200) !!} <a href="{{url('package_tour_details/'.$value->id)}}">More info</a></p>
                  @else
                  <p>{!! $value->details !!} </p>
                  @endif
                </div>
                <a href="{{url('package_tour_details/'.$value->id)}}" title="Book now" class="gradient-button">Book now</a>
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

$(window).load(function () {
var maxHeight = 0;

$(".full .one-fourth").each(function(){
if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
});
$(".full .one-fourth").height(maxHeight);
});

</script>
@endsection
