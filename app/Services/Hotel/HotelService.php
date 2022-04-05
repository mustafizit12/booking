<?php

namespace App\Services\Hotel;
use App\Repositories\Hotel\Interfaces\HotelInterface;
use App\Repositories\HotelKeywords\Interfaces\HotelKeywordsInterface;
use App\Repositories\HotelImage\Interfaces\HotelImageInterface;
use App\Http\Requests\Hotel\HotelRequest;
use App\Services\Core\FileUploadService;
use Auth;
use App\Services\Core\DataListService;
class HotelService
{
    protected $repository;

    public function __construct(HotelInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $searchFields = [
            ['name', __('Hotel Name')],
            ['contact_number', __('Contact Number')],
            ['area_id', __('Area')],
            ['user_id', __('Vendor')],
            ['hotel_category', __('Hotel Category')],
        ];
        $orderFields = [
            ['id', __('Serial')],
            ['name', __('Hotel Name')],
            ['contact_number', __('Contact Number')],
            ['area_id', __('Area')],
            ['user_id', __('Vendor')],
            ['hotel_category', __('Hotel Category')],
        ];
        $query = $this->repository->paginateWithFilters($searchFields, $orderFields);
        return app(DataListService::class)->dataList($query, $searchFields, $orderFields);
    }

    public function create(HotelRequest $request)
    {
      if(isset($request->description)){
        $description = $request->description;
      }else{
        $description = '';
      }
      if(isset($request->address)){
        $address = $request->address;
      }else{
        $address = '';
      }
      if(isset($request->features)){
        $features = $request->features;
      }else{
        $features = '';
      }
      if($request->hotel_category == ''){
        $hotel_category = 0;
      }else{
        $hotel_category = $request->hotel_category;
      }
      if($request->hotel_category == ''){
        $hotel_category = 0;
      }else{
        $hotel_category = $request->hotel_category;
      }
        $parameters = [
            'user_id' => $request->user_id,
            'area_id' => $request->area_id,
            'agent_id' => $request->agent_id,
            'name' => $request->name,
            'description' => $description,
            'address' => $address,
            'features' => $features,
            'hotel_category' =>$hotel_category,
            'contact_number' => $request->contact_number,
            'vendor_commision' => $request->vendor_commision,
            'agent_commision' => $request->agent_commision,
            'created_by' => Auth::id()
        ];
        if ($hotel = $this->repository->create($parameters)) {
          if(isset($request->hotel_keywords) && sizeof($request->hotel_keywords)>0){
            foreach ($request->hotel_keywords as $key => $value) {
              $parameter = [
                  'hotel_id' => $hotel->id,
                  'keyword' => $value,
                ];
              app(HotelKeywordsInterface::class)->create($parameter);
            }
          }
          if(!empty($request->file('image'))){
              foreach ($request->file('image') as $key => $value) {
                  $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_hotel_image'), 'image', 'hotel_image', uniqid(), 'public', '', '');
                  if($upload1){
                    $parameter = [
                        'hotel_id' => $hotel->id,
                        'image_path' => $upload1,
                    ];
                    app(HotelImageInterface::class)->create($parameter);
                  }
              }
          }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Hotel has been created successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to create Hotel.')
        ];
    }

    public function update(HotelRequest $request, $id)
    {
      if(isset($request->description)){
        $description = $request->description;
      }else{
        $description = '';
      }
      if(isset($request->address)){
        $address = $request->address;
      }else{
        $address = '';
      }
      if(isset($request->features)){
        $features = $request->features;
      }else{
        $features = '';
      }
      if($request->hotel_category == ''){
        $hotel_category = 0;
      }else{
        $hotel_category = $request->hotel_category;
      }

        $parameters = [
          'user_id' => $request->user_id,
          'area_id' => $request->area_id,
          'agent_id' => $request->agent_id,
          'name' => $request->name,
          'description' => $description,
          'address' => $address,
          'features' => $features,
          'hotel_category' => $hotel_category,
          'contact_number' => $request->contact_number,
          'vendor_commision' => $request->vendor_commision,
          'agent_commision' => $request->agent_commision,
          'updated_by' => Auth::id()
        ];
        if ($hotel = $this->repository->update($parameters, $id)) {
          if(sizeof($hotel->keywords)>0){
            foreach ($hotel->keywords as $key => $value) {
              app(HotelKeywordsInterface::class)->deleteById($value->id);
            }
          }

          if(isset($request->hotel_keywords) && sizeof($request->hotel_keywords)>0){
            foreach ($request->hotel_keywords as $key => $value) {
              $parameter = [
                  'hotel_id' => $hotel->id,
                  'keyword' => $value,
                ];
              app(HotelKeywordsInterface::class)->create($parameter);
            }
          }

            if(isset($request->remove_image) && sizeof($request->remove_image)>0){
              foreach ($request->remove_image as $key1 => $value1) {
                $model = app(HotelImageInterface::class)->getByConditions(['id'=>$value1])->first();
                //unlink(get_hotel_image($model->image_path));
                //dd('ok');
                app(HotelImageInterface::class)->deleteById($value1);
              }
            }
            if(!empty($request->file('image'))){
                foreach ($request->file('image') as $key => $value) {
                    $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_hotel_image'), 'image', 'hotel_image', uniqid(), 'public', '', '');
                    if($upload1){
                      $parameter = [
                          'hotel_id' => $hotel->id,
                          'image_path' => $upload1,
                      ];
                      app(HotelImageInterface::class)->create($parameter);
                    }
                }
            }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Hotel has been updated successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to update Hotel.')
        ];
    }

    public function delete($id)
    {
        if ($this->repository->deleteById($id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Hotel has been deleted successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('This Hotel cannot be deleted.')
        ];
    }

    public function getHotel($id)
    {
        return $this->repository->findOrFailById($id);
    }

    public function getActiveList()
    {
        $condition = ['is_active' => ACTIVE_STATUS_ACTIVE];
        return $this->repository->getByConditions($condition, '', ['id'=>'desc']);
    }
}
