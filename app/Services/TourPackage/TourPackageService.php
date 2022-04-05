<?php

namespace App\Services\TourPackage;
use App\Repositories\TourPackageInfo\Interfaces\TourPackageInfoInterface;
use App\Repositories\TourPackageImage\Interfaces\TourPackageImageInterface;
use App\Http\Requests\TourPackage\TourPackageRequest;
use App\Services\Core\FileUploadService;
use Auth;
use App\Services\Core\DataListService;
class TourPackageService
{
    protected $repository;

    public function __construct(TourPackageInfoInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $searchFields = [
            ['package_name', __('Package Name')],
            ['valid_till', __('Valid Till')],
            ['package_cost', __('Package Cost')],
            ['discount', __('Discount')],

        ];
        $orderFields = [
            ['id', __('Serial')],
            ['package_name', __('Package Name')],
            ['valid_till', __('Valid Till')],
            ['package_cost', __('Package Cost')],
            ['discount', __('Discount')],
        ];
        $query = $this->repository->paginateWithFilters($searchFields, $orderFields);
        return app(DataListService::class)->dataList($query, $searchFields, $orderFields);
    }

    public function create(TourPackageRequest $request)
    {

      if(isset($request->details)){
        $details = $request->details;
      }else{
        $details = '';
      }
      if(isset($request->discount) && $request->discount != ''){
        $discount = $request->discount;
      }else{
        $discount = 0;
      }

        $parameters = [
            'package_name' => $request->package_name,
            //'valid_till' => $valid_till,
            'package_cost' => $request->package_cost,
            'discount' =>$discount,
            'details' => $details,
            'created_by' => Auth::id()
        ];
        if(isset($request->valid_till) && $request->valid_till != ''){
          $parameters['valid_till'] = $request->valid_till;
        }
        //dd($parameters);
        if ($tour_package = $this->repository->create($parameters)) {
          if(!empty($request->file('image'))){
              foreach ($request->file('image') as $key => $value) {
                  $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_tour_package_image'), 'image', 'tour_package_image', uniqid(), 'public', '', '');
                  if($upload1){
                    $parameter = [
                        'package_id' => $tour_package->id,
                        'image_path' => $upload1,
                    ];
                    app(TourPackageImageInterface::class)->create($parameter);
                  }
              }
          }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Tour Package has been created successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to create Tour Package.')
        ];
    }

    public function update(TourPackageRequest $request, $id)
    {

      if(isset($request->details)){
        $details = $request->details;
      }else{
        $details = '';
      }
      if(isset($request->discount) && $request->discount != ''){
        $discount = $request->discount;
      }else{
        $discount = 0;
      }

        $parameters = [
            'package_name' => $request->package_name,
            //'valid_till' => $valid_till,
            'package_cost' => $request->package_cost,
            'discount' =>$discount,
            'details' => $details,
            'updated_by' => Auth::id()
        ];
        if(isset($request->valid_till) && $request->valid_till != ''){
          $parameters['valid_till'] = $request->valid_till;
        }

        if ($tour_package = $this->repository->update($parameters, $id)) {
            if(isset($request->remove_image) && sizeof($request->remove_image)>0){
              foreach ($request->remove_image as $key1 => $value1) {
                $model = app(TourPackageImageInterface::class)->getByConditions(['id'=>$value1])->first();
                //unlink(get_hotel_image($model->image_path));
                //dd('ok');
                app(TourPackageImageInterface::class)->deleteById($value1);
              }
            }
            if(!empty($request->file('image'))){
                foreach ($request->file('image') as $key => $value) {
                    $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_tour_package_image'), 'image', 'tour_package_image', uniqid(), 'public', '', '');
                    if($upload1){
                      $parameter = [
                          'package_id' => $tour_package->id,
                          'image_path' => $upload1,
                      ];
                      app(TourPackageImageInterface::class)->create($parameter);
                    }
                }
            }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Tour Package has been updated successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to update Tour Package.')
        ];
    }

    public function delete($id)
    {
        if ($this->repository->deleteById($id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Tour Package has been deleted successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('This Tour Package cannot be deleted.')
        ];
    }

    public function getTourPackage($id)
    {
        return $this->repository->findOrFailById($id);
    }

    public function getActiveList()
    {
        $condition = ['is_active' => ACTIVE_STATUS_ACTIVE];
        return $this->repository->getByConditions($condition, '', ['id'=>'desc']);
    }
}
