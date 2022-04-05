<?php

namespace App\Http\Controllers\Visa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visa\VisaRequest;
use App\Services\Visa\VisaService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Repositories\VisaReservation\Interfaces\VisaReservationInterface;
use App\Services\Core\DataListService;
class VisaController extends Controller
{
    public $service;

    public function __construct(VisaService $service)
    {
        $this->service = $service;
    }

    public function visa_pending_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['total_amount', __('Total Amount')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['total_amount', __('Total Amount')],
      ];
      $query = app(VisaReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>0]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Visa Pending Reservation');
      return view('Visa.pending_reservation', $data);
    }
    public function visa_approved_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['total_amount', __('Total Amount')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['total_amount', __('Total Amount')],
      ];
      $query = app(VisaReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>1]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Visa Approved Reservation');
      return view('Visa.approved_reservation', $data);
    }
    public function visa_complete_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['total_amount', __('Total Amount')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['total_amount', __('Total Amount')],
      ];
      $query = app(VisaReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>2]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Visa Complete Reservation');
      return view('Visa.complete_reservation', $data);
    }
    public function visa_rejected_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['total_amount', __('Total Amount')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['total_amount', __('Total Amount')],
      ];
      $query = app(VisaReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>3]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Visa Rejected Reservation');
      return view('Visa.rejected_reservation', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['list'] = $this->service->getList();
        $data['title'] = __('Visa Management');
        return view('Visa.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Visa');
        return view('Visa.create', $data);
    }

    public function store(VisaRequest $request)
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
        $data['visa'] = $this->service->getVisa($id);
        $data['title'] = __('Edit Visa');
        return view('Visa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param VisaRequest $request
     * @param $id
     * @return Response
     * @throws Exception
     */
    public function update(VisaRequest $request, $id)
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
        $data['visa'] = $this->service->getVisa($id);
        $data['title'] = __('View Visa');

        return view('Visa.show', $data);
    }
}
