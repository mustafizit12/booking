<?php

namespace App\Services\Slider;
use App\Repositories\Slider\Interfaces\SliderInterface;
use App\Repositories\SliderImage\Interfaces\SliderImageInterface;
use App\Http\Requests\Slider\SliderRequest;
use App\Services\Core\FileUploadService;
use Auth;
use App\Services\Core\DataListService;
class SliderService
{
    protected $repository;

    public function __construct(SliderInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $searchFields = [
            ['title', __('Title')],
            ['details', __('Details')],
        ];
        $orderFields = [
            ['id', __('Serial')],
            ['title', __('Title')],
            ['details', __('Details')],
        ];
        $query = $this->repository->paginateWithFilters($searchFields, $orderFields);
        return app(DataListService::class)->dataList($query, $searchFields, $orderFields);
    }

    public function create(SliderRequest $request)
    {
      if(isset($request->details)){
        $details = $request->details;
      }else{
        $details = '';
      }
      $image ='';
      if($request->file('image')){
        $image = app(FileUploadService::class)->upload($request->file('image'), config('commonconfig.path_slider_image'), 'image', 'slider_image', uniqid(), 'public', '', '');
      }
        $parameters = [
            'title' => $request->title,
            'details' => $details,
            'image' => $image,
            'created_by' => Auth::id()
        ];
        if ($this->repository->create($parameters)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Slider has been created successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to create Slider.')
        ];
    }

    public function update(SliderRequest $request, $id)
    {
      if(isset($request->details)){
        $details = $request->details;
      }else{
        $details = '';
      }
      $pervious_data = $this->getSlider($id);
      if($request->file('image')){
        $image = app(FileUploadService::class)->upload($request->file('image'), config('commonconfig.path_slider_image'), 'image', 'slider_image', uniqid(), 'public', '', '');
      }else{
        $image = $pervious_data->image;
      }
        $parameters = [
            'title' => $request->title,
            'details' => $details,
            'image' => $image,
            'created_by' => Auth::id()
        ];
        if ($this->repository->update($parameters, $id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Slider has been updated successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to update Slider.')
        ];
    }

    public function delete($id)
    {
        if ($this->repository->deleteById($id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Slider has been deleted successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('This Slider cannot be deleted.')
        ];
    }

    public function getSlider($id)
    {
        return $this->repository->findOrFailById($id);
    }

    public function getActiveList()
    {
        $condition = ['is_active' => ACTIVE_STATUS_ACTIVE];
        return $this->repository->getByConditions($condition, '', ['id'=>'desc']);
    }
}
