<?php

namespace App\Http\Requests\Bus;

use Illuminate\Foundation\Http\FormRequest;

class BusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          "company_name" => "required",
          "starting_point" => "required",
          "end_point" => "required",
          "seat_quantity" => "required|numeric",
          "price" => "required|numeric",
      ];
    }
}
