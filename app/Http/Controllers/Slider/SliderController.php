<?php
namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequest;
use App\Services\Slider\SliderService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SliderController extends Controller
{
    public $service;

    public function __construct(SliderService $service)
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
        $data['title'] = __('Slider Management');
        return view('Slider.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Slider');
        return view('Slider.create', $data);
    }

    public function store(SliderRequest $request)
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
        $data['slider'] = $this->service->getSlider($id);
        $data['title'] = __('Edit Slider');
        return view('Slider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param SliderRequest $request
     * @param $id
     * @return Response
     * @throws Exception
     */
    public function update(SliderRequest $request, $id)
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
        $data['slider'] = $this->service->getSlider($id);
        $data['title'] = __('View Slider');

        return view('Slider.show', $data);
    }
}
