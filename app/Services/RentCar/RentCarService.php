<?php

namespace App\Services\RentCar;
use App\Repositories\RentCarInfo\Interfaces\RentCarInfoInterface;
use App\Repositories\RentCarImage\Interfaces\RentCarImageInterface;
use App\Http\Requests\RentCar\RentCarRequest;
use App\Services\Core\FileUploadService;
use Auth;
use App\Services\Core\DataListService;
class RentCarService
{
    protected $repository;

    public function __construct(RentCarInfoInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $searchFields = [
            ['owner_name', __('Owner Name')],
            ['car_model', __('Car Model')],
            ['owner_contact', __('Owner Contact')],
            ['owner_address', __('Owner Address')],

        ];
        $orderFields = [
            ['id', __('Serial')],
            ['owner_name', __('Owner Name')],
            ['car_model', __('Car Model')],
            ['owner_contact', __('Owner Contact')],
            ['owner_address', __('Owner Address')],
        ];
        $query = $this->repository->paginateWithFilters($searchFields, $orderFields);
        return app(DataListService::class)->dataList($query, $searchFields, $orderFields);
    }

    public function create(RentCarRequest $request)
    {
      if(isset($request->owner_address)){
        $owner_address = $request->owner_address;
      }else{
        $owner_address = '';
      }
      if(isset($request->description)){
        $description = $request->description;
      }else{
        $description = '';
      }

        $parameters = [
            'owner_name' => $request->owner_name,
            'car_model' => $request->car_model,
            'owner_contact' => $request->owner_contact,
            'owner_address' =>$owner_address,
            'description' => $description,
            'created_by' => Auth::id()
        ];
        if ($rentCar = $this->repository->create($parameters)) {
          if(!empty($request->file('image'))){
              foreach ($request->file('image') as $key => $value) {
                  $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_rent_car_image'), 'image', 'rent_car_image', uniqid(), 'public', '', '');
                  if($upload1){
                    $parameter = [
                        'car_id' => $rentCar->id,
                        'image_path' => $upload1,
                    ];
                    app(RentCarImageInterface::class)->create($parameter);
                  }
              }
          }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Rent Car has been created successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to create Rent Car.')
        ];
    }

    public function update(RentCarRequest $request, $id)
    {
      if(isset($request->owner_address)){
        $owner_address = $request->owner_address;
      }else{
        $owner_address = '';
      }
      if(isset($request->description)){
        $description = $request->description;
      }else{
        $description = '';
      }

        $parameters = [
            'owner_name' => $request->owner_name,
            'car_model' => $request->car_model,
            'owner_contact' => $request->owner_contact,
            'owner_address' =>$owner_address,
            'description' => $description,
            'updated_by' => Auth::id()
        ];
        if ($rentCar = $this->repository->update($parameters, $id)) {
            if(isset($request->remove_image) && sizeof($request->remove_image)>0){
              foreach ($request->remove_image as $key1 => $value1) {
                $model = app(RentCarImageInterface::class)->getByConditions(['id'=>$value1])->first();
                //unlink(get_hotel_image($model->image_path));
                //dd('ok');
                app(RentCarImageInterface::class)->deleteById($value1);
              }
            }
            if(!empty($request->file('image'))){
                foreach ($request->file('image') as $key => $value) {
                    $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_rent_car_image'), 'image', 'rent_car_image', uniqid(), 'public', '', '');
                    if($upload1){
                      $parameter = [
                          'car_id' => $rentCar->id,
                          'image_path' => $upload1,
                      ];
                      app(RentCarImageInterface::class)->create($parameter);
                    }
                }
            }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Rent Car has been updated successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to update Rent Car.')
        ];
    }

    public function delete($id)
    {
        if ($this->repository->deleteById($id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Rent Car has been deleted successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('This Rent Car cannot be deleted.')
        ];
    }

    public function getRentCar($id)
    {
        return $this->repository->findOrFailById($id);
    }

    public function getActiveList()
    {
        $condition = ['is_active' => ACTIVE_STATUS_ACTIVE];
        return $this->repository->getByConditions($condition, '', ['id'=>'desc']);
    }
}
