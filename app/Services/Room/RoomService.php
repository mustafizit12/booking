<?php

namespace App\Services\Room;
use App\Repositories\Room\Interfaces\RoomInterface;
use App\Repositories\RoomImage\Interfaces\RoomImageInterface;
use App\Repositories\RoomKeywords\Interfaces\RoomKeywordsInterface;
use App\Http\Requests\Room\RoomRequest;
use App\Services\Core\FileUploadService;
use App\Repositories\Hotel\Interfaces\HotelInterface;
use Auth;
use App\Services\Core\DataListService;
class RoomService
{
    protected $repository;

    public function __construct(RoomInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $searchFields = [
            ['room_name', __('Room Name')],
            ['floor', __('Floor')],
            ['hotel_id', __('Hotel Name')],
            ['room_rent_adult', __('Room Rent Adult')]
        ];
        $orderFields = [
            ['id', __('Serial')],
            ['room_name', __('Room Name')],
            ['floor', __('Floor')],
            ['hotel_id', __('Hotel Name')],
            ['room_rent_adult', __('Room Rent Adult')],
        ];
        $query = $this->repository->paginateWithFilters($searchFields, $orderFields);
        return app(DataListService::class)->dataList($query, $searchFields, $orderFields);
    }

    public function create(RoomRequest $request)
    {
      if(isset($request->room_details)){
        $room_details = $request->room_details;
      }else{
        $room_details = '';
      }
      if(isset($request->floor) && $request->floor != ''){
        $floor = $request->floor;
      }else{
        $floor = 0;
      }
      if(isset($request->quantity) && $request->quantity != ''){
        $quantity = $request->quantity;
      }else{
        $quantity = 0;
      }
      if(isset($request->discount_rent_adult) && $request->discount_rent_adult != ''){
        $discount_rent_adult = $request->discount_rent_adult;
      }else{
        $discount_rent_adult = 0;
      }
      if(isset($request->room_rent_child) && $request->room_rent_child != ''){
        $room_rent_child = $request->room_rent_child;
      }else{
        $room_rent_child = 0;
      }
      if(isset($request->discount_rent_child) && $request->discount_rent_child != ''){
        $discount_rent_child = $request->discount_rent_child;
      }else{
        $discount_rent_child = 0;
      }
      if(isset($request->person_quantity) && $request->person_quantity != ''){
        $person_quantity = $request->person_quantity;
      }else{
        $person_quantity = 0;
      }

        $parameters = [
            'hotel_id' => $request->hotel_id,
            'room_name' => $request->room_name,
            'room_details' => $room_details,
            'floor' => $floor,
            'quantity' => $quantity,
            'room_rent_adult' => $request->room_rent_adult,
            'discount_rent_adult' =>$discount_rent_adult,
            'room_rent_child' => $room_rent_child,
            'discount_rent_child' => $discount_rent_child,
            'person_quantity' => $person_quantity,
            'created_by' => Auth::id()
        ];
        //dd($parameters);
        if ($room = $this->repository->create($parameters)) {
          if(isset($request->room_facilities) && sizeof($request->room_facilities)>0){
            foreach ($request->room_facilities as $key => $value) {
              $parameter = [
                  'hotel_id' => $room->hotel_id,
                  'room_id' => $room->id,
                  'keyword' => $value,
                ];
              app(RoomKeywordsInterface::class)->create($parameter);
            }
          }

          $min = $room->hotel->min_room_cost;
          if($room->hotel->min_room_cost >0 && $room->hotel->min_room_cost > $room->room_rent_adult){
            $min=$room->room_rent_adult;
          }elseif ($room->hotel->min_room_cost == 0) {
            $min=$room->room_rent_adult;
          }
          $max = $room->hotel->max_room_cost;
          if($room->hotel->max_room_cost >0 && $room->hotel->max_room_cost < $room->room_rent_adult){
            $max=$room->room_rent_adult;
          }elseif ($room->hotel->max_room_cost == 0) {
            $max=$room->room_rent_adult;
          }
          $parameters1 = [
              'min_room_cost' => $min,
              'max_room_cost' => $max,
            ];
          app(HotelInterface::class)->update($parameters1,$room->hotel->id);
          if(!empty($request->file('image'))){
              foreach ($request->file('image') as $key => $value) {
                  $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_room_image'), 'image', 'room_image', uniqid(), 'public', '', '');
                  if($upload1){
                    $parameter = [
                        'room_id' => $room->id,
                        'image_path' => $upload1,
                    ];
                    app(RoomImageInterface::class)->create($parameter);
                  }
              }
          }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Room has been created successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to create Room.')
        ];
    }

    public function update(RoomRequest $request, $id)
    {
      if(isset($request->room_details)){
        $room_details = $request->room_details;
      }else{
        $room_details = '';
      }
      if(isset($request->floor)){
        $floor = $request->floor;
      }else{
        $floor = 0;
      }
      if(isset($request->quantity)){
        $quantity = $request->quantity;
      }else{
        $quantity = 0;
      }
      if(isset($request->discount_rent_adult)){
        $discount_rent_adult = $request->discount_rent_adult;
      }else{
        $discount_rent_adult = 0;
      }
      if(isset($request->room_rent_child)){
        $room_rent_child = $request->room_rent_child;
      }else{
        $room_rent_child = 0;
      }
      if(isset($request->discount_rent_child)){
        $discount_rent_child = $request->discount_rent_child;
      }else{
        $discount_rent_child = 0;
      }
      if(isset($request->person_quantity)){
        $person_quantity = $request->person_quantity;
      }else{
        $person_quantity = 0;
      }

        $parameters = [
            'hotel_id' => $request->hotel_id,
            'room_name' => $request->room_name,
            'room_details' => $room_details,
            'floor' => $floor,
            'quantity' => $quantity,
            'room_rent_adult' => $request->room_rent_adult,
            'discount_rent_adult' =>$discount_rent_adult,
            'room_rent_child' => $room_rent_child,
            'discount_rent_child' => $discount_rent_child,
            'person_quantity' => $person_quantity,
            'created_by' => Auth::id()
        ];
        if ($room = $this->repository->update($parameters, $id)) {
          if(sizeof($room->keywords)>0){
            foreach ($room->keywords as $key => $value) {
              app(RoomKeywordsInterface::class)->deleteById($value->id);
            }
          }

          if(isset($request->room_facilities) && sizeof($request->room_facilities)>0){
            foreach ($request->room_facilities as $key => $value) {
              $parameter = [
                  'hotel_id' => $room->hotel_id,
                  'room_id' => $room->id,
                  'keyword' => $value,
                ];
              app(RoomKeywordsInterface::class)->create($parameter);
            }
          }
          $min = $room->hotel->min_room_cost;
          if($room->hotel->min_room_cost >0 && $room->hotel->min_room_cost > $room->room_rent_adult){
            $min=$room->room_rent_adult;
          }elseif ($room->hotel->min_room_cost == 0) {
            $min=$room->room_rent_adult;
          }
          $max = $room->hotel->max_room_cost;
          if($room->hotel->max_room_cost >0 && $room->hotel->max_room_cost < $room->room_rent_adult){
            $max=$room->room_rent_adult;
          }elseif ($room->hotel->max_room_cost == 0) {
            $max=$room->room_rent_adult;
          }

          $parameters1 = [
              'min_room_cost' => $min,
              'max_room_cost' => $max,
            ];
          app(HotelInterface::class)->update($parameters1,$room->hotel->id);
            if(isset($request->remove_image) && sizeof($request->remove_image)>0){
              foreach ($request->remove_image as $key1 => $value1) {
                $model = app(RoomImageInterface::class)->getByConditions(['id'=>$value1])->first();
                //unlink(get_room_image($model->image_path));
                //dd('ok');
                app(RoomImageInterface::class)->deleteById($value1);
              }
            }
            if(!empty($request->file('image'))){
                foreach ($request->file('image') as $key => $value) {
                    $upload1 = app(FileUploadService::class)->upload($value, config('commonconfig.path_room_image'), 'image', 'room_image', uniqid(), 'public', '', '');
                    if($upload1){
                      $parameter = [
                          'room_id' => $room->id,
                          'image_path' => $upload1,
                      ];
                      app(RoomImageInterface::class)->create($parameter);
                    }
                }
            }
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Room has been updated successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('Failed to update Room.')
        ];
    }

    public function delete($id)
    {
        if ($this->repository->deleteById($id)) {
            return [
                SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_SUCCESS,
                SERVICE_RESPONSE_MESSAGE => __('Room has been deleted successfully.')
            ];
        }

        return [
            SERVICE_RESPONSE_STATUS => SERVICE_RESPONSE_ERROR,
            SERVICE_RESPONSE_MESSAGE => __('This Room cannot be deleted.')
        ];
    }

    public function getRoom($id)
    {
        return $this->repository->findOrFailById($id);
    }

    public function getActiveList()
    {
        $condition = ['is_active' => ACTIVE_STATUS_ACTIVE];
        return $this->repository->getByConditions($condition, '', ['id'=>'desc']);
    }
}
