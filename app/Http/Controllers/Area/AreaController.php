<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use App\Http\Requests\Area\AreaRequest;
use App\Services\Area\AreaService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class AreaController extends Controller
{
    public $service;

    public function __construct(AreaService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['list'] = $this->service->getList();
        $data['title'] = __('Area Management');
        return view('Area.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Area');
        return view('Area.create', $data);
    }

    public function store(AreaRequest $request)
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
        $data['area'] = $this->service->getArea($id);
        $data['title'] = __('Edit Area');
        return view('Area.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param AreaRequest $request
     * @param $id
     * @return Response
     * @throws Exception
     */
    public function update(AreaRequest $request, $id)
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
        $data['area'] = $this->service->getArea($id);
        $data['title'] = __('View Area');

        return view('Area.show', $data);
    }
}
