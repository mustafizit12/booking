<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bus\BusRequest;
use App\Services\Bus\BusService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Repositories\BusTicketReservation\Interfaces\BusTicketReservationInterface;
use App\Services\Core\DataListService;
class BusController extends Controller
{
    public $service;

    public function __construct(BusService $service)
    {
        $this->service = $service;
    }

    public function bus_pending_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['seat_quantity', __('Seat Quantity')],
          ['total_rent', __('Total Rent')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['seat_quantity', __('Seat Quantity')],
        ['total_rent', __('Total Rent')],
      ];
      $query = app(BusTicketReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>0]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Bus Pending Reservation');
      return view('Bus.pending_reservation', $data);
    }
    public function bus_approved_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['seat_quantity', __('Seat Quantity')],
          ['total_rent', __('Total Rent')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['seat_quantity', __('Seat Quantity')],
        ['total_rent', __('Total Rent')],
      ];
      $query = app(BusTicketReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>1]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Bus Approved Reservation');
      return view('Bus.approved_reservation', $data);
    }
    public function bus_complete_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['seat_quantity', __('Seat Quantity')],
          ['total_rent', __('Total Rent')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['seat_quantity', __('Seat Quantity')],
        ['total_rent', __('Total Rent')],
      ];
      $query = app(BusTicketReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>2]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Bus Complete Reservation');
      return view('Bus.complete_reservation', $data);
    }
    public function bus_rejected_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['seat_quantity', __('Seat Quantity')],
          ['total_rent', __('Total Rent')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['seat_quantity', __('Seat Quantity')],
        ['total_rent', __('Total Rent')],
      ];
      $query = app(BusTicketReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>3]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Bus Rejected Reservation');
      return view('Bus.rejected_reservation', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['list'] = $this->service->getList();
        $data['title'] = __('Bus Management');
        return view('Bus.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Bus');
        return view('Bus.create', $data);
    }

    public function store(BusRequest $request)
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
        $data['bus'] = $this->service->getBus($id);
        $data['title'] = __('Edit Bus');
        return view('Bus.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param BusRequest $request
     * @param $id
     * @return Response
     * @throws Exception
     */
    public function update(BusRequest $request, $id)
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
        $data['bus'] = $this->service->getBus($id);
        $data['title'] = __('View Bus');

        return view('Bus.show', $data);
    }
}
