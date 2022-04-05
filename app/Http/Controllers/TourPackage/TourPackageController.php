<?php

namespace App\Http\Controllers\TourPackage;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourPackage\TourPackageRequest;
use App\Services\TourPackage\TourPackageService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Repositories\TourPackageReservation\Interfaces\TourPackageReservationInterface;
use App\Services\Core\DataListService;
class TourPackageController extends Controller
{
    public $service;

    public function __construct(TourPackageService $service)
    {
        $this->service = $service;
    }

    public function tourPackage_pending_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['order_quantity', __('From Date')],
          ['total_cost', __('To Date')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['order_quantity', __('From Date')],
        ['total_cost', __('To Date')],
      ];
      $query = app(TourPackageReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>0]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Tour Package Pending Reservation');
      return view('TourPackage.pending_reservation', $data);
    }
    public function tourPackage_approved_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['order_quantity', __('From Date')],
          ['total_cost', __('To Date')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['order_quantity', __('From Date')],
        ['total_cost', __('To Date')],
      ];
      $query = app(TourPackageReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>1]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Tour Package Approved Reservation');
      return view('TourPackage.approved_reservation', $data);
    }
    public function tourPackage_complete_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['order_quantity', __('From Date')],
          ['total_cost', __('To Date')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['order_quantity', __('From Date')],
        ['total_cost', __('To Date')],
      ];
      $query = app(TourPackageReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>2]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Tour Package Complete Reservation');
      return view('TourPackage.complete_reservation', $data);
    }
    public function tourPackage_rejected_reservation(){
      $searchFields = [
          ['id', __('Booking Id')],
          ['order_quantity', __('From Date')],
          ['total_cost', __('To Date')],
      ];
      $orderFields = [
        ['id', __('Booking Id')],
        ['order_quantity', __('From Date')],
        ['total_cost', __('To Date')],
      ];
      $query = app(TourPackageReservationInterface::class)->paginateWithFilters($searchFields, $orderFields,['order_status'=>3]);
      $data['list'] = app(DataListService::class)->dataList($query, $searchFields, $orderFields);
      $data['title'] = __('Tour Package Rejected Reservation');
      return view('TourPackage.rejected_reservation', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['list'] = $this->service->getList();
        $data['title'] = __('Tour Package Management');
        return view('TourPackage.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Tour Package');
        return view('TourPackage.create', $data);
    }

    public function store(TourPackageRequest $request)
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
        $data['tourPackage'] = $this->service->getTourPackage($id);
        $data['title'] = __('Edit Tour Package');
        return view('TourPackage.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param TourPackageRequest $request
     * @param $id
     * @return Response
     * @throws Exception
     */
    public function update(TourPackageRequest $request, $id)
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
        $data['tourPackage'] = $this->service->getTourPackage($id);
        $data['title'] = __('View Tour Package');

        return view('TourPackage.show', $data);
    }
}
