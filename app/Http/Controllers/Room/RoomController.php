<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\RoomRequest;
use App\Services\Room\RoomService;
use App\Services\Hotel\HotelService;
use App\Services\User\UserService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class RoomController extends Controller
{
    public $service;

    public function __construct(RoomService $service)
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
        $data['title'] = __('Room Management');
        return view('Room.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Room');
        $data['hotels'] = app(HotelService::class)->getActiveList()->pluck('name','id');
        return view('Room.create', $data);
    }

    public function store(RoomRequest $request)
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
        $data['room'] = $this->service->getRoom($id);
        $data['hotels'] = app(HotelService::class)->getActiveList()->pluck('name','id');
        $data['title'] = __('Edit Room');
        return view('Room.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param RoomRequest $request
     * @param $id
     * @return Response
     * @throws Exception
     */
    public function update(RoomRequest $request, $id)
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
        $data['room'] = $this->service->getRoom($id);
        $data['title'] = __('View Room');

        return view('Room.show', $data);
    }
}
