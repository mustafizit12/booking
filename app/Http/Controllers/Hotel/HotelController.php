<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\HotelRequest;
use App\Services\Hotel\HotelService;
use App\Services\Area\AreaService;
use App\Services\User\UserService;
use Exception;
use Illuminate\Http\Response;
use App\Repositories\User\Interfaces\ProfileInterface;
use Illuminate\Support\Facades\Cache;
use App\Repositories\HotelReservation\Interfaces\HotelReservationInterface;
use App\Repositories\BusTicketReservation\Interfaces\BusTicketReservationInterface;
use App\Repositories\RentCarReservation\Interfaces\RentCarReservationInterface;
use App\Repositories\TourPackageReservation\Interfaces\TourPackageReservationInterface;
use App\Repositories\VenueReservation\Interfaces\VenueReservationInterface;
use App\Repositories\VisaReservation\Interfaces\VisaReservationInterface;
use App\Services\Core\DataListService;
class HotelController extends Controller
{
    public $service;

    public function __construct(HotelService $service)
    {
        $this->service = $service;
    }

    public function reservation_approved($id,$type){
      $parameters = [
          'order_status' => 1,
      ];
      if($type == 'hotel'){
        $data = app(HotelReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'bus') {
        $data = app(BusTicketReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'rent_car') {
        $data = app(RentCarReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'tour_package') {
        $data = app(TourPackageReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'venue') {
        $data = app(VenueReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'visa') {
        $data = app(VisaReservationInterface::class)->update($parameters,$id);
      }
      if($data){
        return redirect()->back()->with(SERVICE_RESPONSE_SUCCESS,'Data has been approved successfully');
      }else{
        return redirect()->back()->with(SERVICE_RESPONSE_ERROR,'Data not approved successfully');
      }
    }
    public function reservation_reject($id,$type){
      $parameters = [
          'order_status' => 3,
      ];
      if($type == 'hotel'){
        $data = app(HotelReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'bus') {
        $data = app(BusTicketReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'rent_car') {
        $data = app(RentCarReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'tour_package') {
        $data = app(TourPackageReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'venue') {
        $data = app(VenueReservationInterface::class)->update($parameters,$id);
      }elseif ($type == 'visa') {
        $data = app(VisaReservationInterface::class)->update($parameters,$id);
      }
      if($data){
        return redirect()->back()->with(SERVICE_RESPONSE_SUCCESS,'Data has been rejected successfully');
      }else{
        return redirect()->back()->with(SERVICE_RESPONSE_ERROR,'Data not rejected successfully');
      }
    }
    public function hotel_pending_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['from_date', __('From Date')],
          ['to_date', __('To Date')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['from_date', __('From Date')],
        ['to_date', __('To Date')],
      ];
      $query = app(HotelReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>0]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Hotel Pending Reservation');
      return view('Hotel.pending_reservation', $data);
    }
    public function hotel_approved_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['from_date', __('From Date')],
          ['to_date', __('To Date')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['from_date', __('From Date')],
        ['to_date', __('To Date')],
      ];
      $query = app(HotelReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>1]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Hotel Approved Reservation');
      return view('Hotel.approved_reservation', $data);
    }
    public function hotel_complete_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['from_date', __('From Date')],
          ['to_date', __('To Date')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['from_date', __('From Date')],
        ['to_date', __('To Date')],
      ];
      $query = app(HotelReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>2]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Hotel Complete Reservation');
      return view('Hotel.complete_reservation', $data);
    }
    public function hotel_rejected_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['from_date', __('From Date')],
          ['to_date', __('To Date')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['from_date', __('From Date')],
        ['to_date', __('To Date')],
      ];
      $query = app(HotelReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>3]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Hotel Rejected Reservation');
      return view('Hotel.rejected_reservation', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['list'] = $this->service->getList();
        $data['title'] = __('Hotel Management');
        return view('Hotel.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Hotel');
        $data['areas'] = app(AreaService::class)->getActiveList()->pluck('name','id');
        $data['vendor_list'] = app(UserService::class)->getActiveList(2)->pluck('profile.full_name','id');
        $data['agent_list'] = app(UserService::class)->getActiveList(3)->pluck('profile.full_name','id');
        return view('Hotel.create', $data);
    }

    public function store(HotelRequest $request)
    {
        $response = $this->service->create($request);
        return redirect()->back()->with($response[SERVICE_RESPONSE_STATUS] , $response[SERVICE_RESPONSE_MESSAGE]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $data['hotel'] = $this->service->getHotel($id);
        $data['areas'] = app(AreaService::class)->getActiveList()->pluck('name','id');
        $data['vendor_list'] = app(UserService::class)->getActiveList(2)->pluck('profile.full_name','id');
        $data['agent_list'] = app(UserService::class)->getActiveList(3)->pluck('profile.full_name','id');
        $data['title'] = __('Edit Hotel');
        return view('Hotel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param HotelRequest $request
     * @param $id
     * @return Response
     * @throws Exception
     */
    public function update(HotelRequest $request, $id)
    {
      $response = $this->service->update($request, $id);
      return redirect()->back()->with($response[SERVICE_RESPONSE_STATUS] , $response[SERVICE_RESPONSE_MESSAGE]);
    }

    public function destroy($id)
    {
      $response = $this->service->delete($id);
      return redirect()->back()->with($response[SERVICE_RESPONSE_STATUS] , $response[SERVICE_RESPONSE_MESSAGE]);
    }

    public function show($id)
    {
        $data['hotel'] = $this->service->getHotel($id);
        $data['title'] = __('View Hotel');

        return view('Hotel.show', $data);
    }

    public function getAgent($id){
      $data = app(ProfileInterface::class)->getByConditions(['area_id'=>$id]);
      return json_encode($data);
    }
}
