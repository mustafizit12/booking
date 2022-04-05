<?php

namespace App\Http\Controllers\RentCar;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentCar\RentCarRequest;
use App\Services\RentCar\RentCarService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Repositories\RentCarReservation\Interfaces\RentCarReservationInterface;
use App\Services\Core\DataListService;
class RentCarController extends Controller
{
    public $service;

    public function __construct(RentCarService $service)
    {
        $this->service = $service;
    }

    public function rentCars_pending_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['total_rent', __('Total Rent')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['total_rent', __('Total Rent')],
      ];
      $query = app(RentCarReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>0]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Rent Car Pending Reservation');
      return view('RentCar.pending_reservation', $data);
    }
    public function rentCars_approved_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['total_rent', __('Total Rent')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['total_rent', __('Total Rent')],
      ];
      $query = app(RentCarReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>1]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Rent Car Approved Reservation');
      return view('RentCar.approved_reservation', $data);
    }
    public function rentCars_complete_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['total_rent', __('Total Rent')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['total_rent', __('Total Rent')],
      ];
      $query = app(RentCarReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>2]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Rent Car Complete Reservation');
      return view('RentCar.complete_reservation', $data);
    }
    public function rentCars_rejected_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['total_rent', __('Total Rent')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['total_rent', __('Total Rent')],
      ];
      $query = app(RentCarReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>3]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Rent Car Rejected Reservation');
      return view('RentCar.rejected_reservation', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['list'] = $this->service->getList();
        $data['title'] = __('Rent Car Management');
        return view('RentCar.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Rent Car');
        return view('RentCar.create', $data);
    }

    public function store(RentCarRequest $request)
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
        $data['rentCars'] = $this->service->getRentCar($id);
        $data['title'] = __('Edit Rent Car');
        return view('RentCar.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param RentCarRequest $request
     * @param $id
     * @return Response
     * @throws Exception
     */
    public function update(RentCarRequest $request, $id)
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
        $data['rentCars'] = $this->service->getRentCar($id);
        $data['title'] = __('View Rent Car');

        return view('RentCar.show', $data);
    }
}
