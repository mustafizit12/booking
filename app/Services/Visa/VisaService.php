<?php

namespace App\Services\Visa;
use App\Repositories\VisaInfo\Interfaces\VisaInfoInterface;
use App\Repositories\VisaImage\Interfaces\VisaImageInterface;
use App\Http\Requests\Visa\VisaRequest;
use App\Services\Core\FileUploadService;
use Auth;
use App\Services\Core\DataListService;
class VisaService
{
    protected $repository;

    public function __construct(VisaInfoInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $searchFields = [
            ['title', __('Title')],
            ['visa_country', __('Visa Country')],
            ['cost', __('Cost')],
        ];
        $orderFields = [
            ['id', __('Serial')],
            ['title', __('Title')],
            ['visa_country', __('Visa Country')],
            ['cost', __('Cost')],
        ];
        $query = $this->repository->paginateWithFilters($searchFields, $orderFields);
        return app(DataListService::class)->dataList($query, $searchFields, $orderFields);
    }

    public function create(VisaRequest $request)
    {
      if(isset($request->details)){
        $details = $request->details;
      }else{
        $details = '';
      }
      if(isset($request->visa_duration)){
        $visa_duration = $request->visa_duration;
      }else{
        $visa_duration = '';
      }
      $images_array = [];
      $image= '';
      if(!empty($request->file('image'))){
          foreach ($request->file('image') as $key => $value) {
              $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_visa_image'), 'image', 'visa_image', uniqid(), 'public', '', '');
              if($upload1){
                array_push($images_array,$upload1);
              }
          }
          $image = implode(',',$images_array);
      }
        $parameters = [
            'title' => $request->title,
            'visa_country' => $request->visa_country,
            'cost' => $request->cost,
            'details' => $details,
            'visa_duration' => $visa_duration,
            'image' =>$image,
            'created_by' => Auth::id()
        ];
        if ($visa = $this->repository->create($parameters)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Visa has been created successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to create Visa.')
        ];
    }

    public function update(VisaRequest $request, $id)
    {
      if(isset($request->details)){
        $details = $request->details;
      }else{
        $details = '';
      }
      if(isset($request->visa_duration)){
        $visa_duration = $request->visa_duration;
      }else{
        $visa_duration = '';
      }
      $images_array = [];
      $image= $this->getVisa($id)->image;
      if(!empty($request->file('image'))){
          foreach ($request->file('image') as $key => $value) {
              $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_visa_image'), 'image', 'visa_image', uniqid(), 'public', '', '');
              if($upload1){
                array_push($images_array,$upload1);
              }
          }
          $image = implode(',',$images_array);
      }
        $parameters = [
            'title' => $request->title,
            'visa_country' => $request->visa_country,
            'cost' => $request->cost,
            'details' => $details,
            'visa_duration' => $visa_duration,
            'image' =>$image,
            'created_by' => Auth::id()
        ];
        if ($venue = $this->repository->update($parameters, $id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Visa has been updated successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to update Visa.')
        ];
    }

    public function delete($id)
    {
        if ($this->repository->deleteById($id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Visa has been deleted successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('This Visa cannot be deleted.')
        ];
    }

    public function getVisa($id)
    {
        return $this->repository->findOrFailById($id);
    }

    public function getActiveList()
    {
        $condition = ['is_active' => ACTIVE_STATUS_ACTIVE];
        return $this->repository->getByConditions($condition, '', ['id'=>'desc']);
    }
}
