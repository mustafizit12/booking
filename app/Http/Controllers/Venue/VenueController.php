<?php

namespace App\Http\Controllers\Venue;

use App\Http\Controllers\Controller;
use App\Http\Requests\Venue\VenueRequest;
use App\Services\Venue\VenueService;
use App\Services\Area\AreaService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Repositories\VenueReservation\Interfaces\VenueReservationInterface;
use App\Services\Core\DataListService;
class VenueController extends Controller
{
    public $service;

    public function __construct(VenueService $service)
    {
        $this->service = $service;
    }

    public function venue_pending_reservation(){
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
      $query = app(VenueReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>0]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Venue Pending Reservation');
      return view('Venue.pending_reservation', $data);
    }
    public function venue_approved_reservation(){
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
      $query = app(VenueReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>1]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Venue Approved Reservation');
      return view('Venue.approved_reservation', $data);
    }
    public function venue_complete_reservation(){
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
      $query = app(VenueReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>2]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Venue Complete Reservation');
      return view('Venue.complete_reservation', $data);
    }
    public function venue_rejected_reservation(){
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
      $query = app(VenueReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>3]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Venue Rejected Reservation');
      return view('Venue.rejected_reservation', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['list'] = $this->service->getList();
        $data['title'] = __('Venue Management');
        return view('Venue.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Venue');
        $data['areas'] = app(AreaService::class)->getActiveList()->pluck('name','id');
        return view('Venue.create', $data);
    }

    public function store(VenueRequest $request)
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
        $data['venue'] = $this->service->getVenue($id);
        $data['title'] = __('Edit Venue');
        $data['areas'] = app(AreaService::class)->getActiveList()->pluck('name','id');
        return view('Venue.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param VenueRequest $request
     * @param $id
     * @return Response
     * @throws Exception
     */
    public function update(VenueRequest $request, $id)
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
        $data['venue'] = $this->service->getVenue($id);
        $data['title'] = __('View Venue');

        return view('Venue.show', $data);
    }
}
