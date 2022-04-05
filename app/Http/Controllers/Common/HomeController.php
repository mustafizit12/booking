<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core\PasswordUpdateRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserSettingRequest;
use App\Http\Requests\User\UserAvatarRequest;
use App\Repositories\User\Interfaces\ProfileInterface;
use App\Repositories\User\Interfaces\UserInterface;
use App\Repositories\User\Interfaces\UserSettingInterface;
use App\Repositories\PhoneOtp\Interfaces\PhoneOtpInterface;
use Illuminate\Support\Facades\Auth;
use App\Services\User\ProfileService;
use Illuminate\Http\Request;
use App\Services\Hotel\HotelService;
use App\Services\Bus\BusService;
use App\Services\RentCar\RentCarService;
use App\Services\TourPackage\TourPackageService;
use App\Services\Venue\VenueService;
use App\Services\Visa\VisaService;
use App\Services\Slider\SliderService;
use App\Repositories\HotelReservation\Interfaces\HotelReservationInterface;
use App\Repositories\RentCarReservation\Interfaces\RentCarReservationInterface;
use App\Repositories\BusTicketReservation\Interfaces\BusTicketReservationInterface;
use App\Repositories\TourPackageReservation\Interfaces\TourPackageReservationInterface;
use App\Repositories\VenueReservation\Interfaces\VenueReservationInterface;
use App\Repositories\VisaReservation\Interfaces\VisaReservationInterface;
use App\Services\Room\RoomService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
class HomeController extends Controller
{
    private $service;

    public function __construct()
    {

    }

    public function index()
    {
      // dd('ss');
        $data['hotels'] = app(HotelService::class)->getActiveList()->take(4);
        $data['package_tour'] = app(TourPackageService::class)->getActiveList()->take(4);
        $data['rent_a_car'] = app(RentCarService::class)->getActiveList()->take(4);
        $data['all_rent_a_car'] = app(RentCarService::class)->getActiveList();
        $data['bus'] = app(BusService::class)->getActiveList()->take(4);
        $data['venue'] = app(VenueService::class)->getActiveList()->take(4);
        $data['visa'] = app(VisaService::class)->getActiveList()->take(4);
        $data['sliders'] = app(SliderService::class)->getActiveList();
        return view('fontend.index',$data);
    }

    private function generateUniqueOtp(){
      $otp = mt_rand(1000,9999);
      $check = app(PhoneOtpInterface::class)->getByConditions(['otp'=>$otp])->first();
      if($check){
        return $this->generateUniqueOtp();
      }else{
        return $otp;
      }
    }
    public function generate_otp(Request $request){
      $parameters = ['otp' => $this->generateUniqueOtp(),'phone'=>$request->phone];
      $data = app(PhoneOtpInterface::class)->create($parameters);
      return 'ok';
    }
    public function fetch(Request $request)
    {
       if($request->keyword)
       {

        $data = DB::table('hotels')
          ->leftjoin('areas','hotels.area_id','=','areas.id')
          ->where('hotels.name', 'LIKE', "%{$request->keyword}%")
          ->orWhere('hotels.address', 'LIKE', "%{$request->keyword}%")
          ->orWhere('areas.name', 'LIKE', "%{$request->keyword}%")
          ->select('hotels.name as name')
          ->get();
        $output = '<ul class="dropdown-menu sb-autocomplete__list" style="display:block; position:relative;margin-top:12%;border-radius: 15px;">';
        foreach($data as $row)
        {
         $output .= '<li class="hotel_name_list c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city sb-autocomplete__item--with-title " role="option" data-list-item="" data-i="0" data-value="" data-label="'.$row->name.'">';
         $output .= '<span class="sb-autocomplete--photo"><svg fill="#349f98" height="24" width="24" viewBox="0 0 128 128" class="bk-icon -iconset-geo_pin"><path d="M98.5 42.5a34.5 34.5 0 1 0-64.3 17.2L64 120l29.8-60.3a34.2 34.2 0 0 0 4.7-17.2zM64 59.7a17.2 17.2 0 1 1 17-17 17.2 17.2 0 0 1-17 17z"></path></svg></span><span><span class="search_hl_name">'.$row->name.'</span></span></li>';
        }
        $output .= '</ul>';
        return $output;
       }
    }

    public function package_tour(Request $request)
    {
       if($request->keyword)
       {

        $data = DB::table('tour_package_infos')->where('package_name', 'LIKE', "%{$request->keyword}%")
          ->orWhere('details', 'LIKE', "%{$request->keyword}%")
          ->get();
        $output = '<ul class="dropdown-menu sb-autocomplete__list" style="display:block; position:relative;margin-top:12%;border-radius: 15px;">';
        foreach($data as $row)
        {
         $output .= '<li class="package_tour_list c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city sb-autocomplete__item--with-title " role="option" data-list-item="" data-i="0" data-value="" data-label="'.$row->package_name.'">';
         $output .= '<span class="sb-autocomplete--photo"><svg fill="#349f98" height="24" width="24" viewBox="0 0 128 128" class="bk-icon -iconset-geo_pin"><path d="M98.5 42.5a34.5 34.5 0 1 0-64.3 17.2L64 120l29.8-60.3a34.2 34.2 0 0 0 4.7-17.2zM64 59.7a17.2 17.2 0 1 1 17-17 17.2 17.2 0 0 1-17 17z"></path></svg></span><span><span class="search_hl_name">'.$row->package_name.'</span></span></li>';
        }
        $output .= '</ul>';
        return $output;
       }
    }
    public function from_where_area(Request $request)
    {
       if($request->keyword)
       {

        $data = DB::table('areas')->where('name', 'LIKE', "%{$request->keyword}%")
          ->get();
        $output = '<ul class="dropdown-menu sb-autocomplete__list" style="display:block; position:relative;margin-top:12%;border-radius: 15px;">';
        foreach($data as $row)
        {
         $output .= '<li class="from_area_list c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city sb-autocomplete__item--with-title " role="option" data-list-item="" data-i="0" data-value="" data-label="'.$row->name.'">';
         $output .= '<span class="sb-autocomplete--photo"><svg fill="#349f98" height="24" width="24" viewBox="0 0 128 128" class="bk-icon -iconset-geo_pin"><path d="M98.5 42.5a34.5 34.5 0 1 0-64.3 17.2L64 120l29.8-60.3a34.2 34.2 0 0 0 4.7-17.2zM64 59.7a17.2 17.2 0 1 1 17-17 17.2 17.2 0 0 1-17 17z"></path></svg></span><span><span class="search_hl_name">'.$row->name.'</span></span></li>';
        }
        $output .= '</ul>';
        return $output;
       }
    }
    public function going_to_area(Request $request)
    {
       if($request->keyword)
       {

        $data = DB::table('areas')->where('name', 'LIKE', "%{$request->keyword}%")
          ->get();
        $output = '<ul class="dropdown-menu sb-autocomplete__list" style="display:block; position:relative;margin-top:12%;border-radius: 15px;">';
        foreach($data as $row)
        {
         $output .= '<li class="going_area_list c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city sb-autocomplete__item--with-title " role="option" data-list-item="" data-i="0" data-value="" data-label="'.$row->name.'">';
         $output .= '<span class="sb-autocomplete--photo"><svg fill="#349f98" height="24" width="24" viewBox="0 0 128 128" class="bk-icon -iconset-geo_pin"><path d="M98.5 42.5a34.5 34.5 0 1 0-64.3 17.2L64 120l29.8-60.3a34.2 34.2 0 0 0 4.7-17.2zM64 59.7a17.2 17.2 0 1 1 17-17 17.2 17.2 0 0 1-17 17z"></path></svg></span><span><span class="search_hl_name">'.$row->name.'</span></span></li>';
        }
        $output .= '</ul>';
        return $output;
       }
    }
    public function starting_point_bus(Request $request)
    {
       if($request->keyword)
       {

        $data = DB::table('bus_infos')->where('company_name', 'LIKE', "%{$request->keyword}%")
        ->orWhere('company_name', 'LIKE', "%{$request->keyword}%")
        ->orWhere('bus_model', 'LIKE', "%{$request->keyword}%")
        ->orWhere('starting_point', 'LIKE', "%{$request->keyword}%")
        ->orWhere('seat_quantity', 'LIKE', "%{$request->keyword}%")
          ->get();
        $output = '<ul class="dropdown-menu sb-autocomplete__list" style="display:block; position:relative;margin-top:12%;border-radius: 15px;">';
        foreach($data as $row)
        {
         $output .= '<li class="starting_point_list c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city sb-autocomplete__item--with-title " role="option" data-list-item="" data-i="0" data-value="" data-label="'.$row->starting_point.'">';
         $output .= '<span class="sb-autocomplete--photo"><svg fill="#349f98" height="24" width="24" viewBox="0 0 128 128" class="bk-icon -iconset-geo_pin"><path d="M98.5 42.5a34.5 34.5 0 1 0-64.3 17.2L64 120l29.8-60.3a34.2 34.2 0 0 0 4.7-17.2zM64 59.7a17.2 17.2 0 1 1 17-17 17.2 17.2 0 0 1-17 17z"></path></svg></span><span><span class="search_hl_name">'.$row->starting_point.'</span></span></li>';
        }
        $output .= '</ul>';
        return $output;
       }
    }
    public function ending_point_bus(Request $request)
    {
       if($request->keyword)
       {

        $data = DB::table('bus_infos')->where('company_name', 'LIKE', "%{$request->keyword}%")
        ->orWhere('company_name', 'LIKE', "%{$request->keyword}%")
        ->orWhere('bus_model', 'LIKE', "%{$request->keyword}%")
        ->orWhere('end_point', 'LIKE', "%{$request->keyword}%")
        ->orWhere('seat_quantity', 'LIKE', "%{$request->keyword}%")
          ->get();
        $output = '<ul class="dropdown-menu sb-autocomplete__list" style="display:block; position:relative;margin-top:12%;border-radius: 15px;">';
        foreach($data as $row)
        {
         $output .= '<li class="ending_point_list c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city sb-autocomplete__item--with-title " role="option" data-list-item="" data-i="0" data-value="" data-label="'.$row->end_point.'">';
         $output .= '<span class="sb-autocomplete--photo"><svg fill="#349f98" height="24" width="24" viewBox="0 0 128 128" class="bk-icon -iconset-geo_pin"><path d="M98.5 42.5a34.5 34.5 0 1 0-64.3 17.2L64 120l29.8-60.3a34.2 34.2 0 0 0 4.7-17.2zM64 59.7a17.2 17.2 0 1 1 17-17 17.2 17.2 0 0 1-17 17z"></path></svg></span><span><span class="search_hl_name">'.$row->end_point.'</span></span></li>';
        }
        $output .= '</ul>';
        return $output;
       }
    }
    public function venue_search(Request $request)
    {
       if($request->keyword)
       {

         $data = DB::table('venue_infos')
           ->leftjoin('areas','venue_infos.area_id','=','areas.id')
           ->where('venue_infos.venue_name', 'LIKE', "%{$request->keyword}%")
           ->orWhere('venue_infos.address', 'LIKE', "%{$request->keyword}%")
           ->orWhere('areas.name', 'LIKE', "%{$request->keyword}%")
           ->select('areas.name as name')
           ->get();
        $output = '<ul class="dropdown-menu sb-autocomplete__list" style="display:block; position:relative;margin-top:12%;border-radius: 15px;">';
        foreach($data as $row)
        {
         $output .= '<li class="venue_list c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city sb-autocomplete__item--with-title " role="option" data-list-item="" data-i="0" data-value="" data-label="'.$row->name.'">';
         $output .= '<span class="sb-autocomplete--photo"><svg fill="#349f98" height="24" width="24" viewBox="0 0 128 128" class="bk-icon -iconset-geo_pin"><path d="M98.5 42.5a34.5 34.5 0 1 0-64.3 17.2L64 120l29.8-60.3a34.2 34.2 0 0 0 4.7-17.2zM64 59.7a17.2 17.2 0 1 1 17-17 17.2 17.2 0 0 1-17 17z"></path></svg></span><span><span class="search_hl_name">'.$row->name.'</span></span></li>';
        }
        $output .= '</ul>';
        return $output;
       }
    }
    public function search_result(Request $request){
      if($request->select_type == 'hotel'){
        Session::put('rooms', $request->rooms);
        Session::put('adult', $request->adults_member);
        Session::put('child', $request->child_member);
        if($request->check_in_date != '' && $request->check_out_date != '' ){
          Session::put('check_in_date', date('Y-m-d',strtotime($request->check_in_date)));
          Session::put('check_out_date', date('Y-m-d',strtotime($request->check_out_date)));
          $date1 = new \DateTime(date('Y-m-d',strtotime($request->check_in_date)));
          $date2 = new \DateTime(date('Y-m-d',strtotime($request->check_out_date)));
          $days  = $date2->diff($date1)->format('%a');
          Session::put('total_days', $days);
        }else{
          Session::put('check-in_date', '');
          Session::put('check_out_date', '');
          Session::put('total_days', 0);
        }
        if($request->search_keyword != ''){
          $data = DB::table('hotels')
            ->leftjoin('areas','hotels.area_id','=','areas.id')
            ->where('hotels.name',$request->search_keyword)
            ->select('hotels.*','areas.name as area_name')
            ->first();
        }else{
          $data = [];
        }
        Session::put('search_hotel', json_encode($data));
        return redirect()->route('hotel_search_list')->with([ 'data' => $data ]);
      }elseif ($request->select_type == 'package_tour') {
        $data = DB::table('tour_package_infos');
        $i =0;
        if (isset($request->package_tour) && $request->package_tour != ''){
          $data->where('package_name', 'LIKE', "%{$request->package_tour}%");
          $i=1;
        }
        if (isset($request->validaty_date) && $request->validaty_date != ''){
          $data->where('valid_till', '<=', date('Y-m-d',strtotime($request->validaty_date)));
          $i=1;
        }
        if($i== 1){
          $data1 = $data->orderBy('id','desc')->get();
        }else{
          $data1 = DB::table('tour_package_infos')->orderBy('id','desc')->get();
        }
        return redirect()->route('package_tour_list')->with([ 'data' => $data1 ]);
      }elseif ($request->select_type == 'rent_a_car') {
        $data = DB::table('rent_car_infos');
        $i =0;
        if (isset($request->car_model) && $request->car_model != ''){
          $data->where('car_model', 'LIKE', "%{$request->car_model}%");
          $i=1;
        }
        if($i== 1){
          $data1 = $data->orderBy('id','desc')->get();
        }else{
          $data1 = DB::table('rent_car_infos')->orderBy('id','desc')->get();
        }
        return redirect()->route('rent_a_car_list')->with([ 'data' => $data1 ]);
      }elseif ($request->select_type == 'bus') {
        $data = DB::table('bus_infos');
        $i =0;
        if (isset($request->starting_point) && $request->starting_point != ''){
          $data->where('starting_point', 'LIKE', "%{$request->starting_point}%");
          $i=1;
        }
        if (isset($request->ending_point) && $request->ending_point != ''){
          $data->where('end_point', 'LIKE', "%{$request->ending_point}%");
          $i=1;
        }
        if (isset($request->departure_time) && $request->departure_time != ''){
          $data->where('departure_time', 'LIKE', "%{$request->departure_time}%");
          $i=1;
        }
        if($i== 1){
          $data1 = $data->orderBy('id','desc')->get();
        }else{
          $data1 = DB::table('bus_infos')->orderBy('id','desc')->get();
        }
        return redirect()->route('bus_list')->with([ 'data' => $data1 ]);
      }elseif ($request->select_type == 'venue') {
        $data = DB::table('venue_infos')->leftjoin('areas','venue_infos.area_id','=','areas.id');
        $i =0;
        if (isset($request->venue_area) && $request->venue_area != ''){
          $data->where('areas.name', 'LIKE', "%{$request->venue_area}%");
          $i=1;
        }
        if($i== 1){
          $data1 = $data->orderBy('venue_infos.id','desc')->get();

        }else{
          $data1 = DB::table('venue_infos')->orderBy('id','desc')->get();
        }
        return redirect()->route('venue_list')->with([ 'data' => $data1 ]);
      }
    }
    public function hotel_search_list(Request $request){
      if(null != session()->get( 'data' )){
        $data['search_hotel'] = session()->get( 'data' );
        if($data['search_hotel']){
          $data['hotels'] = \DB::table('hotels')
          ->leftjoin('areas','hotels.area_id','=','areas.id')
          ->where('hotels.id','!=',$data['search_hotel']->id)
          ->where('hotels.area_id',$data['search_hotel']->area_id)
          ->select('hotels.*','areas.name as area_name')->get();
        }else{
          $data['hotels'] = \DB::table('hotels')
          ->leftjoin('areas','hotels.area_id','=','areas.id')
          ->select('hotels.*','areas.name as area_name')->get();
        }
      }else{
        if(Session::has('search_hotel')){
          $data['search_hotel'] = json_decode(Session::get('search_hotel'));
          if($data['search_hotel']){
            if(isset($request->price) || isset($request->score) || isset($request->facilities) || isset($request->room_facilities)){
              $min_price = '';
              $max_price = '';
              if(isset($request->price)){
                foreach ($request->price as $key => $value) {
                  $price = explode(" - ", $value);
                  if(isset($price[0])){
                    if($min_price != '' && $min_price > $price[0]){
                      $min_price = $price[0];
                    }elseif ($min_price == '') {
                      $min_price = $price[0];
                    }
                  }
                  if($value != '20000 +' && isset($price[1])){
                    if($max_price != '' && $max_price < $price[1]){
                      $max_price = $price[1];
                    }elseif ($max_price == '') {
                      $max_price = $price[1];
                    }
                  }else{
                    $max_price = '';
                  }
                }
              }

              $query = \DB::table('hotels')
              ->leftjoin('areas','hotels.area_id','=','areas.id')
              ->leftjoin('hotel_keywords','hotel_keywords.hotel_id','=','hotels.id')
              ->leftjoin('room_keywords','room_keywords.hotel_id','=','hotels.id')
              ->where('hotels.id','!=',$data['search_hotel']->id)
              ->where('hotels.area_id',$data['search_hotel']->area_id)
              ->select('hotels.*','areas.name as area_name');
              if (isset($request->score) && $request->score != ''){
                $query->where('hotels.hotel_category',$request->score);
              }
              if ($min_price !='' && $max_price != ''){
                $query->whereRaw('hotels.min_room_cost >='. $min_price);
                $query->whereRaw('hotels.max_room_cost <='. $max_price);
              }elseif ($min_price !='' && $max_price == '') {
                $query->whereRaw('hotels.min_room_cost >='. $min_price);
              }

              if(isset($request->facilities)){
                $tearms = $request->facilities;
                $query->WhereIn('hotel_keywords.keyword',$tearms);
              }

              if(isset($request->room_facilities)){
                $rfac = $request->room_facilities;
                $query->WhereIn('room_keywords.keyword',$rfac);
              }
              $query->groupBy('hotels.id');
              //echo $query->toSql();die;
              $result = $query->get();
              if(sizeof($result) == 0){
                $query1 = \DB::table('hotels')
                ->leftjoin('areas','hotels.area_id','=','areas.id')
                ->leftjoin('hotel_keywords','hotel_keywords.hotel_id','=','hotels.id')
                ->leftjoin('room_keywords','room_keywords.hotel_id','=','hotels.id')
                ->where('hotels.id',$data['search_hotel']->id)
                ->select('hotels.*','areas.name as area_name');
                if (isset($request->score) && $request->score != ''){
                  $query1->where('hotels.hotel_category',$request->score);
                }
                if ($min_price !='' && $max_price != ''){
                  $query1->whereRaw('hotels.min_room_cost >='. $min_price);
                  $query1->whereRaw('hotels.max_room_cost <='. $max_price);
                }elseif ($min_price !='' && $max_price == '') {
                  $query1->whereRaw('hotels.min_room_cost >='. $min_price);
                }

                if(isset($request->facilities)){
                  $tearms = $request->facilities;
                  $query1->WhereIn('hotel_keywords.keyword',$tearms);
                }

                if(isset($request->room_facilities)){
                  $rfac = $request->room_facilities;
                  $query1->WhereIn('room_keywords.keyword',$rfac);
                }
                $data['search_hotel'] = $query1->first();
              }
              $data['hotels'] = $result;
            }else{
              $data['hotels'] = \DB::table('hotels')
              ->leftjoin('areas','hotels.area_id','=','areas.id')
              ->where('hotels.id','!=',$data['search_hotel']->id)
              ->where('hotels.area_id',$data['search_hotel']->area_id)
              ->select('hotels.*','areas.name as area_name')->get();
            }

          }else{
            $data['hotels'] = \DB::table('hotels')
            ->leftjoin('areas','hotels.area_id','=','areas.id')
            ->select('hotels.*','areas.name as area_name')->get();
          }
        }else{
          $data['hotels'] = \DB::table('hotels')
          ->leftjoin('areas','hotels.area_id','=','areas.id')
          ->select('hotels.*','areas.name as area_name')->get();
        }

      }
      return view('fontend.hotel_list',$data);
    }
    public function hotel_list(Request $request){
      Session::forget('rooms');
      Session::forget('adult');
      Session::forget('child');
      Session::forget('check_in_date');
      Session::forget('check_out_date');
      Session::forget('total_days');
      Session::forget('search_hotel');
      if(isset($request->price) || isset($request->score) || isset($request->facilities) || isset($request->room_facilities)){
        $min_price = '';
        $max_price = '';
        if(isset($request->price)){
          foreach ($request->price as $key => $value) {
            $price = explode(" - ", $value);
            if(isset($price[0])){
              if($min_price != '' && $min_price > $price[0]){
                $min_price = $price[0];
              }elseif ($min_price == '') {
                $min_price = $price[0];
              }
            }
            if($value != '20000 +' && isset($price[1])){
              if($max_price != '' && $max_price < $price[1]){
                $max_price = $price[1];
              }elseif ($max_price == '') {
                $max_price = $price[1];
              }
            }else{
              $max_price = '';
            }
          }
        }

        $query = \DB::table('hotels')
        ->leftjoin('areas','hotels.area_id','=','areas.id')
        ->leftjoin('hotel_keywords','hotel_keywords.hotel_id','=','hotels.id')
        ->leftjoin('room_keywords','room_keywords.hotel_id','=','hotels.id')
        ->select('hotels.*','areas.name as area_name');
        if (isset($request->score) && $request->score != ''){
          $query->where('hotels.hotel_category',$request->score);
        }
        if ($min_price !='' && $max_price != ''){
          $query->whereRaw('hotels.min_room_cost >='. $min_price);
          $query->whereRaw('hotels.max_room_cost <='. $max_price);
        }elseif ($min_price !='' && $max_price == '') {
          $query->whereRaw('hotels.min_room_cost >='. $min_price);
        }

        if(isset($request->facilities)){
          $tearms = $request->facilities;
          $query->WhereIn('hotel_keywords.keyword',$tearms);
        }

        if(isset($request->room_facilities)){
          $rfac = $request->room_facilities;
          $query->WhereIn('room_keywords.keyword',$rfac);
        }
        $query->groupBy('hotels.id');
        //echo $query->toSql();die;
        $result = $query->get();
        //dd($result);
        $data['hotels'] = $result;
      }else{
        if(null != session()->get( 'data' )){
          $data['search_hotel'] = session()->get( 'data' );
          if($data['search_hotel']){
            $data['hotels'] = \DB::table('hotels')
            ->leftjoin('areas','hotels.area_id','=','areas.id')
            ->where('hotels.id','!=',$data['search_hotel']->id)
            ->where('hotels.area_id',$data['search_hotel']->area_id)
            ->select('hotels.*','areas.name as area_name')->get();
          }else{
            $data['hotels'] = \DB::table('hotels')
            ->leftjoin('areas','hotels.area_id','=','areas.id')
            ->select('hotels.*','areas.name as area_name')->get();
          }
        }else{
          if(Session::has('search_hotel')){
            $data['search_hotel'] = json_decode(Session::get('search_hotel'));
            if($data['search_hotel']){
              $data['hotels'] = \DB::table('hotels')
              ->leftjoin('areas','hotels.area_id','=','areas.id')
              ->where('hotels.id','!=',$data['search_hotel']->id)
              ->where('hotels.area_id',$data['search_hotel']->area_id)
              ->select('hotels.*','areas.name as area_name')->get();
            }else{
              $data['hotels'] = \DB::table('hotels')
              ->leftjoin('areas','hotels.area_id','=','areas.id')
              ->select('hotels.*','areas.name as area_name')->get();
            }
          }else{
            $data['hotels'] = \DB::table('hotels')
            ->leftjoin('areas','hotels.area_id','=','areas.id')
            ->select('hotels.*','areas.name as area_name')->get();
          }

        }
      }
      return view('fontend.hotel_list',$data);
    }
    public function hotel_details($id){
      $request = Request();
      if(isset($request->check_in_date) && $request->check_in_date != '' && isset($request->check_out_date) && $request->check_out_date != ''){
        Session::put('check_in_date', date('Y-m-d',strtotime($request->check_in_date)));
        Session::put('check_out_date', date('Y-m-d',strtotime($request->check_out_date)));
        $date1 = new \DateTime(date('Y-m-d',strtotime($request->check_in_date)));
        $date2 = new \DateTime(date('Y-m-d',strtotime($request->check_out_date)));
        $days  = $date2->diff($date1)->format('%a');
        Session::put('total_days', $days);
        Session::put('rooms', 1);
        return redirect()->back();
      }
      $data['hotel'] = app(HotelService::class)->getHotel($id);
      return view('fontend.hotel_details',$data);
    }
    public function package_tour_list(){
      if(null != session()->get( 'data' )){
        $data['package_tour'] = session()->get( 'data' );
      }else{
        $data['package_tour'] = DB::table('tour_package_infos')->orderBy('id','desc')->get();
      }
      return view('fontend.package_tour_list',$data);
    }
    public function package_tour_details($id){
      $data['package_tour'] = app(TourPackageService::class)->getTourPackage($id);
      $request = Request();
      if(isset($request->quantity) && $request->quantity != '' ){
        Session::put('total_package_tour_ticket', $request->quantity);
        return redirect()->back();
      }
      return view('fontend.package_tour_details',$data);
    }
    public function venue_list(){
      if(null != session()->get( 'data' )){
        $data['venue'] = session()->get( 'data' );
      }else{
        $data['venue'] = DB::table('venue_infos')->orderBy('id','desc')->get();
      }
      return view('fontend.venue_list',$data);
    }
    public function venue_details($id){
      $data['venue'] = app(VenueService::class)->getVenue($id);
      $request = Request();
      if(isset($request->from_date) && $request->from_date != '' && isset($request->to_date) && $request->to_date != ''){
        Session::put('from_date', date('Y-m-d',strtotime($request->from_date)));
        Session::put('to_date', date('Y-m-d',strtotime($request->to_date)));
        $date1 = new \DateTime(date('Y-m-d',strtotime($request->from_date)));
        $date2 = new \DateTime(date('Y-m-d',strtotime($request->to_date)));
        $days  = $date2->diff($date1)->format('%a');
        Session::put('total_days_venue', $days);
        return redirect()->back();
      }
      return view('fontend.venue_details',$data);
    }
    public function rent_a_car_list(){
      if(null != session()->get( 'data' )){
        $data['rent_a_car'] = session()->get( 'data' );
      }else{
        $data['rent_a_car'] = DB::table('rent_car_infos')->orderBy('id','desc')->get();
      }
      return view('fontend.rent_a_car_list',$data);
    }
    public function rent_a_car_details($id){
      $data['rent_a_car'] = app(RentCarService::class)->getRentCar($id);
      return view('fontend.rent_a_car_details',$data);
    }
    public function bus_list(){
      if(null != session()->get( 'data' )){
        $data['bus_list'] = session()->get( 'data' );
      }else{
        $data['bus_list'] = DB::table('bus_infos')->orderBy('id','desc')->get();
      }
      return view('fontend.bus_list',$data);
    }
    public function bus_details($id){
      $data['bus'] = app(BusService::class)->getBus($id);
      $request = Request();
      if(isset($request->quantity) && $request->quantity != '' ){
        Session::put('total_bus_ticket', $request->quantity);
        return redirect()->back();
      }
      return view('fontend.bus_details',$data);
    }
    public function visa_list(){
      $data['visa_list'] = app(VisaService::class)->getActiveList();
      return view('fontend.visa_list',$data);
    }
    public function visa_details($id){
      $data['visa'] = app(VisaService::class)->getVisa($id);
      return view('fontend.visa_details',$data);
    }
    public function book_now($id,$type){
      if($type == 'room'){
        $data['details'] = app(RoomService::class)->getRoom($id);
      }elseif ($type == 'package_tour') {
        $data['details'] = app(TourPackageService::class)->getTourPackage($id);
      }elseif ($type == 'venue') {
        $data['details'] = app(VenueService::class)->getVenue($id);
      }elseif ($type == 'rent_a_car') {
        $data['details'] = app(RentCarService::class)->getRentCar($id);
      }elseif ($type == 'bus') {
        $data['details'] = app(BusService::class)->getBus($id);
      }elseif ($type == 'visa') {
        $data['details'] = app(VisaService::class)->getVisa($id);
      }
      $data['type'] =$type;
      $data['id'] = $id;
      return view('fontend.booking',$data);
    }
    public function register_user(Request $request){
      if($request->first_name == '' || $request->last_name == '' || $request->phone == ''){
        return redirect()->back()->with('error','please enter mandotory field');
      }else{
        if(!isset($request->user_id) && isset($request->otp) && $request->otp == ''){
          return redirect()->back()->withInput()->with('error','please verify phone number');
        }elseif(!Auth::check() && $request->otp != '') {
          $check = app(PhoneOtpInterface::class)->getByConditions(['otp'=>$request->otp,'phone'=>$request->phone,'is_used'=>0])->first();
          if($check){
            $check->is_used = 1;
            $check->save();
            $check_unique_phone = app(UserInterface::class)->getByConditions(['username'=>$request->phone])->first();
            if($check_unique_phone){
              return redirect()->back()->withInput()->with('error','phone number must be unique');
            }
            $userParams['password'] = Hash::make('123456');
            $userParams['is_email_verified'] = 1;
            $userParams['username'] = $request->phone;
            $userParams['email'] = $request->email;
            $userParams['role_id'] = USER_ROLE_USER;
            DB::beginTransaction();
            $user = app(UserInterface::class)->create($userParams);

            if (empty($user)) {
                DB::rollBack();
                return redirect()->back()->withInput()->with('error','Registration faild try again');
            }

            $profileParams = Arr::only($request->all(), ['first_name', 'last_name', 'address', 'phone']);
            $profileParams['user_id'] = $user->id;
            //$profileParams['member_id'] = 'F2S-'.(sizeof(app(UserInterface::class)->getAll()));
            $profile = app(ProfileInterface::class)->create($profileParams);

            if (empty($profile)) {
                DB::rollBack();
                return redirect()->back()->withInput()->with('error','Registration faild try again');
            }
            DB::commit();
            if (Auth::attempt(['username' => $user->username, 'password' => '123456'])) {
                $user = Auth::user();
                return redirect()->route('booking_payment',['id'=>$request->id,'type'=>$request->type]);
            }else{
              return redirect()->back()->withInput()->with('error','Registration complete login faild please login and try again');
            }
          }else{
            return redirect()->back()->withInput()->with('error','please enter correct otp');
          }
        }else {
          if(Auth::check()){
          //  dd('here');
            return redirect()->route('booking_payment',['id'=>$request->id,'type'=>$request->type]);
          }else{
            return redirect()->back()->withInput()->with('error','please login');
          }

        }
      }
    }
    public function booking_payment(Request $request){
      //dd($request->all());
      if(Auth::check()){
        $type = $request->type;
        $id = $request->id;
        if($type == 'room'){
          $data['details'] = app(RoomService::class)->getRoom($id);
        }elseif ($type == 'package_tour') {
          $data['details'] = app(TourPackageService::class)->getTourPackage($id);
        }elseif ($type == 'venue') {
          $data['details'] = app(VenueService::class)->getVenue($id);
        }elseif ($type == 'rent_a_car') {
          $data['details'] = app(RentCarService::class)->getRentCar($id);
        }elseif ($type == 'bus') {
          $data['details'] = app(BusService::class)->getBus($id);
        }elseif ($type == 'visa') {
          $data['details'] = app(VisaService::class)->getVisa($id);
        }
        $data['type'] =$type;
        $data['id'] = $id;
        return view('fontend.booking_payment',$data);
      }else{
        return redirect()->route('user_login');
      }
    }
    public function confirm_booking(Request $request){
      if(Auth::check()){
        $type = $request->type;
        $id = $request->id;
        if($type == 'room'){
          $details = app(RoomService::class)->getRoom($id);
          $params['hotel_id'] = $details->hotel_id;
          $params['room_id'] = $details->id;
          if(Session::has('total_days') && Session::get('total_days') != 0){
            $params['from_date'] = date('Y-m-d',strtotime(Session::get('check_in_date')));
          }else{
            $params['from_date'] = date('Y-m-d',strtotime(date('Y-m-d')));
          }
          if(Session::has('total_days') && Session::get('total_days') != 0){
            $params['to_date'] = date('Y-m-d',strtotime(Session::get('check_out_date')));
            $price = 0;
						if(Session::has('total_days') && Session::get('total_days') != 0){
							$price +=(Session::get('total_days') * $details->room_rent_adult);
							if(Session::get('child') >0){
								$price +=(Session::get('total_days') * $details->room_rent_child);
							}
						}else{
							$price = $details->room_rent_adult;
						}
            $params['total_rent'] = $price;
            $params['adult_quantity'] = Session::get('adult');
            if(Session::get('adult') == null){
              $params['adult_quantity'] = 2;
            }
            $params['child_quantity'] = Session::get('child');
            if(Session::get('child') == null){
              $params['child_quantity'] = 0;
            }
            $params['room'] = Session::get('room');
            if(Session::get('room') == null){
              $params['room'] = 1;
            }
            $params['days'] = Session::get('total_days');
          }else{
            $params['to_date'] = date('Y-m-d',strtotime(date('Y-m-d').' +1 day'));
            $params['total_rent'] = $details->room_rent_adult;
            $params['adult_quantity'] = 2;
            $params['child_quantity'] = 0;
            $params['room'] = 1;
            $params['days'] = 1;
          }
          $params['order_by'] = Auth::id();
          $params['order_status'] = 0;
          $params['spical_requirment'] = $request->spical_requirment;
          $params['payment_type'] = $request->payment_type;
          $data['details'] = app(HotelReservationInterface::class)->create($params);
          Session::forget('rooms');
          Session::forget('adult');
          Session::forget('child');
          Session::forget('check_in_date');
          Session::forget('check_out_date');
          Session::forget('total_days');
          Session::forget('search_hotel');
        }elseif ($type == 'package_tour') {
          $details = app(TourPackageService::class)->getTourPackage($id);
          $params['package_id'] = $details->id;
          if(Session::has('total_package_tour_ticket')){
            $params['order_quantity'] = Session::get('total_package_tour_ticket');
            $params['total_cost'] = Session::get('total_package_tour_ticket') * $details->package_cost;
          }else{
            $params['order_quantity'] = 1;
            $params['total_cost'] = $details->package_cost;
          }
          $params['order_by'] = Auth::id();
          $params['order_status'] = 0;
          $params['spical_requirment'] = $request->spical_requirment;
          $params['payment_type'] = $request->payment_type;
          $data['details'] = app(TourPackageReservationInterface::class)->create($params);
          Session::forget('total_package_tour_ticket');
        }elseif ($type == 'venue') {
          $details = app(VenueService::class)->getVenue($id);
          $params['venue_id'] = $details->id;
          if(Session::has('from_date')){
            $params['from_date'] = date('Y-m-d',strtotime(Session::get('from_date')));
          }else{
            $params['from_date'] = date('Y-m-d',strtotime(date('Y-m-d')));
          }
          if(Session::has('to_date')){
            $params['to_date'] = date('Y-m-d',strtotime(Session::get('to_date')));
          }else{
            $params['to_date'] = date('Y-m-d',strtotime(date('Y-m-d').' +1 day'));
          }
          if(Session::has('total_days_venue')){
            $params['total_rent'] = $details->rent * Session::get('total_days_venue');
          }else{
            $params['total_rent'] = $details->rent;
          }
          $params['order_by'] = Auth::id();
          $params['order_status'] = 0;
          $params['spical_requirment'] = $request->spical_requirment;
          $params['payment_type'] = $request->payment_type;
          $data['details'] = app(VenueReservationInterface::class)->create($params);
          Session::forget('from_date');
          Session::forget('to_date');
          Session::forget('total_days_venue');
        }elseif ($type == 'rent_a_car') {
          $details = app(RentCarService::class)->getRentCar($id);
          $params['rent_id'] = $details->id;
          $params['total_rent'] = 0;
          $params['order_by'] = Auth::id();
          $params['order_status'] = 0;
          $params['spical_requirment'] = $request->spical_requirment;
          $params['payment_type'] = $request->payment_type;
          $data['details'] = app(RentCarReservationInterface::class)->create($params);
        }elseif ($type == 'bus') {
          $details = app(BusService::class)->getBus($id);
          $params['bus_id'] = $details->id;
          if(Session::has('total_bus_ticket')){
            $params['seat_quantity'] = Session::get('total_bus_ticket');
            $params['total_rent'] = Session::get('total_bus_ticket') * $details->price;
          }else{
            $params['seat_quantity'] = 1;
            $params['total_rent'] = $details->price;
          }
          $params['order_by'] = Auth::id();
          $params['order_status'] = 0;
          $params['spical_requirment'] = $request->spical_requirment;
          $params['payment_type'] = $request->payment_type;
          $data['details'] = app(BusTicketReservationInterface::class)->create($params);
          Session::forget('total_bus_ticket');
        }elseif ($type == 'visa') {
          $details = app(VisaService::class)->getVisa($id);
          $params['visa_id'] = $details->id;
          $params['total_amount'] = $details->cost;
          $params['order_by'] = Auth::id();
          $params['order_status'] = 0;
          $params['spical_requirment'] = $request->spical_requirment;
          $params['payment_type'] = $request->payment_type;
          $data['details'] = app(VisaReservationInterface::class)->create($params);
        }
        $data['type'] =$type;
        return redirect()->route('booking_confirm',['id'=>$data['details']->id,'type'=>$request->type]);
      }else{
        return redirect()->route('user_login');
      }
    }
    public function booking_confirm(Request $request){
      //dd($request->all());
      if(Auth::check()){
        $type = $request->type;
        $id = $request->id;
        if($type == 'room'){
          $data['details'] = app(HotelReservationInterface::class)->getByConditions(['id'=>$id])->first();
        }elseif ($type == 'package_tour') {
          $data['details'] = app(TourPackageReservationInterface::class)->getByConditions(['id'=>$id])->first();
        }elseif ($type == 'venue') {
          $data['details'] = app(VenueReservationInterface::class)->getByConditions(['id'=>$id])->first();
        }elseif ($type == 'rent_a_car') {
          $data['details'] = app(RentCarReservationInterface::class)->getByConditions(['id'=>$id])->first();
        }elseif ($type == 'bus') {
          $data['details'] = app(BusTicketReservationInterface::class)->getByConditions(['id'=>$id])->first();
        }elseif ($type == 'visa') {
          $data['details'] = app(VisaReservationInterface::class)->getByConditions(['id'=>$id])->first();
        }
        $data['type'] =$type;
        $data['id'] = $id;
        return view('fontend.booking_confirm',$data);
      }else{
        return redirect()->route('user_login');
      }
    }
    public function bookings(){
      //dd($request->all());
      if(Auth::check()){
        $data['rooms'] = app(HotelReservationInterface::class)->getByConditions(['order_by'=>Auth::id()],'',['id'=>'desc']);
        $data['tour_package'] = app(TourPackageReservationInterface::class)->getByConditions(['order_by'=>Auth::id()],'',['id'=>'desc']);
        $data['venue'] = app(VenueReservationInterface::class)->getByConditions(['order_by'=>Auth::id()],'',['id'=>'desc']);
        $data['rent_a_car'] = app(RentCarReservationInterface::class)->getByConditions(['order_by'=>Auth::id()],'',['id'=>'desc']);
        $data['bus_ticket'] = app(BusTicketReservationInterface::class)->getByConditions(['order_by'=>Auth::id()],'',['id'=>'desc']);
        $data['visa'] = app(VisaReservationInterface::class)->getByConditions(['order_by'=>Auth::id()],'',['id'=>'desc']);
        return view('fontend.bookings',$data);
      }else{
        return redirect()->route('user_login');
      }
    }
}
