<?php

namespace App\Services\Venue;
use App\Repositories\VenueInfo\Interfaces\VenueInfoInterface;
use App\Repositories\VenueImage\Interfaces\VenueImageInterface;
use App\Http\Requests\Venue\VenueRequest;
use App\Services\Core\FileUploadService;
use Auth;
use App\Services\Core\DataListService;
class VenueService
{
    protected $repository;

    public function __construct(VenueInfoInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $searchFields = [
            ['area_id', __('Area')],
            ['venue_name', __('Venue Name')],
            ['contact_info', __('Contact Info')],
            ['rent', __('Rent')],
            ['discount', __('Discount')],
        ];
        $orderFields = [
            ['id', __('Serial')],
            ['area_id', __('Area')],
            ['venue_name', __('Venue Name')],
            ['contact_info', __('Contact Info')],
            ['rent', __('Rent')],
            ['discount', __('Discount')],
        ];
        $query = $this->repository->paginateWithFilters($searchFields, $orderFields);
        return app(DataListService::class)->dataList($query, $searchFields, $orderFields);
    }

    public function create(VenueRequest $request)
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
      if(isset($request->discount) && $request->discount != ''){
        $discount = $request->discount;
      }else{
        $discount = 0;
      }
        $parameters = [
            'area_id' => $request->area_id,
            'venue_name' => $request->venue_name,
            'contact_info' => $request->contact_info,
            'rent' => $request->rent,
            'description' => $description,
            'address' =>$address,
            'features' => $features,
            'discount' => $discount,
            'created_by' => Auth::id()
        ];
        if ($venue = $this->repository->create($parameters)) {
          if(!empty($request->file('image'))){
              foreach ($request->file('image') as $key => $value) {
                  $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_venue_image'), 'image', 'venue_image', uniqid(), 'public', '', '');
                  if($upload1){
                    $parameter = [
                        'venue_id' => $venue->id,
                        'image_path' => $upload1,
                    ];
                    app(VenueImageInterface::class)->create($parameter);
                  }
              }
          }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Venue has been created successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to create Venue.')
        ];
    }

    public function update(VenueRequest $request, $id)
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
      if(isset($request->discount) && $request->discount != ''){
        $discount = $request->discount;
      }else{
        $discount = 0;
      }
        $parameters = [
            'area_id' => $request->area_id,
            'venue_name' => $request->venue_name,
            'contact_info' => $request->contact_info,
            'rent' => $request->rent,
            'description' => $description,
            'address' =>$address,
            'features' => $features,
            'discount' => $discount,
            'created_by' => Auth::id()
        ];
        if ($venue = $this->repository->update($parameters, $id)) {
            if(isset($request->remove_image) && sizeof($request->remove_image)>0){
              foreach ($request->remove_image as $key1 => $value1) {
                $model = app(VenueImageInterface::class)->getByConditions(['id'=>$value1])->first();
                //unlink(get_hotel_image($model->image_path));
                //dd('ok');
                app(VenueImageInterface::class)->deleteById($value1);
              }
            }
            if(!empty($request->file('image'))){
                foreach ($request->file('image') as $key => $value) {
                    $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_venue_image'), 'image', 'venue_image', uniqid(), 'public', '', '');
                    if($upload1){
                      $parameter = [
                          'venue_id' => $venue->id,
                          'image_path' => $upload1,
                      ];
                      app(VenueImageInterface::class)->create($parameter);
                    }
                }
            }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Venue has been updated successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to update Venue.')
        ];
    }

    public function delete($id)
    {
        if ($this->repository->deleteById($id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Venue has been deleted successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('This Venue cannot be deleted.')
        ];
    }

    public function getVenue($id)
    {
        return $this->repository->findOrFailById($id);
    }

    public function getActiveList()
    {
        $condition = ['is_active' => ACTIVE_STATUS_ACTIVE];
        return $this->repository->getByConditions($condition, '', ['id'=>'desc']);
    }
}
