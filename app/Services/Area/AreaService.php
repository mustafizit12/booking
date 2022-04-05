<?php

namespace App\Services\Area;
use App\Repositories\Area\Interfaces\AreaInterface;
use App\Http\Requests\Area\AreaRequest;
use Auth;
use App\Services\Core\DataListService;
class AreaService
{
    protected $repository;

    public function __construct(AreaInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $searchFields = [
            ['name', __('Area Name')],
        ];
        $orderFields = [
            ['id', __('Serial')],
            ['name', __('Area Name')],
        ];
        $query = $this->repository->paginateWithFilters($searchFields, $orderFields);
        return app(DataListService::class)->dataList($query, $searchFields, $orderFields);
    }

    public function create(AreaRequest $request)
    {
        $parameters = [
            'name' => $request->name,
            'details' => $request->details
        ];

        if ($this->repository->create($parameters)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Area has been created successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to create Area.')
        ];
    }

    public function update(AreaRequest $request, $id)
    {
        $parameters = [
            'name' => $request->name,
            'details' => $request->details
        ];

        if ($this->repository->update($parameters, $id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Area has been updated successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to update Area.')
        ];
    }

    public function delete($id)
    {

        if ($this->repository->deleteById($id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Area has been deleted successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('This Area cannot be deleted.')
        ];
    }

    public function getArea($id)
    {
        return $this->repository->findOrFailById($id);
    }

    public function getActiveList()
    {
        $condition = ['is_active' => ACTIVE_STATUS_ACTIVE];
        return $this->repository->getByConditions($condition, '', ['id'=>'desc']);
    }
}
