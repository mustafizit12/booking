<?php

namespace App\Services\Bus;
use App\Repositories\BusInfo\Interfaces\BusInfoInterface;
use App\Repositories\BusImage\Interfaces\BusImageInterface;
use App\Http\Requests\Bus\BusRequest;
use App\Services\Core\FileUploadService;
use Auth;
use App\Services\Core\DataListService;
class BusService
{
    protected $repository;

    public function __construct(BusInfoInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $searchFields = [
            ['company_name', __('Company Name')],
            ['bus_model', __('Bus Model')],
            ['bus_quality', __('Bus Quantity')],
            ['starting_point', __('Staring Point')],
            ['end_point', __('End Point')],
            ['seat_quantity', __('Seat Quantity')],
            ['price', __('Price')],
        ];
        $orderFields = [
            ['id', __('Serial')],
            ['company_name', __('Company Name')],
            ['bus_model', __('Bus Model')],
            ['bus_quality', __('Bus Quantity')],
            ['starting_point', __('Staring Point')],
            ['end_point', __('End Point')],
            ['seat_quantity', __('Seat Quantity')],
            ['price', __('Price')],
        ];
        $query = $this->repository->paginateWithFilters($searchFields, $orderFields);
        return app(DataListService::class)->dataList($query, $searchFields, $orderFields);
    }

    public function create(BusRequest $request)
    {
      if(isset($request->bus_model)){
        $bus_model = $request->bus_model;
      }else{
        $bus_model = null;
      }
      if(isset($request->bus_quality)){
        $bus_quality = $request->bus_quality;
      }else{
        $bus_quality = 0;
      }
        $parameters = [
            'company_name' => $request->company_name,
            'bus_model' => $bus_model,
            'bus_quality' => $bus_quality,
            'starting_point' => $request->starting_point,
            'end_point' => $request->end_point,
            // 'departure_time' => $departure_time,
            // 'arrival_time' =>$arrival_time,
            'seat_quantity' => $request->seat_quantity,
            'price' => $request->price,
            'created_by' => Auth::id()
        ];
        if(isset($request->departure_time) && $request->departure_time != ''){
          $parameters['departure_time'] = $request->departure_time;
        }
        if(isset($request->arrival_time) && $request->arrival_time != ''){
          $parameters['arrival_time'] = $request->arrival_time;
        }
        if ($bus = $this->repository->create($parameters)) {
          if(!empty($request->file('image'))){
              foreach ($request->file('image') as $key => $value) {
                  $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_bus_image'), 'image', 'bus_image', uniqid(), 'public', '', '');
                  if($upload1){
                    $parameter = [
                        'bus_id' => $bus->id,
                        'image_path' => $upload1,
                    ];
                    app(BusImageInterface::class)->create($parameter);
                  }
              }
          }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Bus has been created successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to create Bus.')
        ];
    }

    public function update(BusRequest $request, $id)
    {
      if(isset($request->bus_model)){
        $bus_model = $request->bus_model;
      }else{
        $bus_model = null;
      }
      if(isset($request->bus_quality)){
        $bus_quality = $request->bus_quality;
      }else{
        $bus_quality = 0;
      }

        $parameters = [
            'company_name' => $request->company_name,
            'bus_model' => $bus_model,
            'bus_quality' => $bus_quality,
            'starting_point' => $request->starting_point,
            'end_point' => $request->end_point,
            // 'departure_time' => $departure_time,
            // 'arrival_time' =>$arrival_time,
            'seat_quantity' => $request->seat_quantity,
            'price' => $request->price,
            'updated_by' => Auth::id()
        ];
        if(isset($request->departure_time) && $request->departure_time != ''){
          $parameters['departure_time'] = $request->departure_time;
        }
        if(isset($request->arrival_time) && $request->arrival_time != ''){
          $parameters['arrival_time'] = $request->arrival_time;
        }
        if ($bus = $this->repository->update($parameters, $id)) {
            if(isset($request->remove_image) && sizeof($request->remove_image)>0){
              foreach ($request->remove_image as $key1 => $value1) {
                $model = app(BusImageInterface::class)->getByConditions(['id'=>$value1])->first();
                //unlink(get_hotel_image($model->image_path));
                //dd('ok');
                app(BusImageInterface::class)->deleteById($value1);
              }
            }
            if(!empty($request->file('image'))){
                foreach ($request->file('image') as $key => $value) {
                    $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_bus_image'), 'image', 'bus_image', uniqid(), 'public', '', '');
                    if($upload1){
                      $parameter = [
                          'bus_id' => $bus->id,
                          'image_path' => $upload1,
                      ];
                      app(BusImageInterface::class)->create($parameter);
                    }
                }
            }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Bus has been updated successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to update Bus.')
        ];
    }

    public function delete($id)
    {
        if ($this->repository->deleteById($id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Bus has been deleted successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('This Bus cannot be deleted.')
        ];
    }

    public function getBus($id)
    {
        return $this->repository->findOrFailById($id);
    }

    public function getActiveList()
    {
        $condition = ['is_active' => ACTIVE_STATUS_ACTIVE];
        return $this->repository->getByConditions($condition, '', ['id'=>'desc']);
    }
}
