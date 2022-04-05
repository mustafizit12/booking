<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class HotelRequest extends FormRequest
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
      $table_name = 'hotels';
      $unique_name_rules = $this->isMethod('Post')?Rule::unique($table_name):Rule::unique($table_name)->wherenot('id',$this->id);

      return [
          "name" => "required|".$unique_name_rules,
          "contact_number" => "required",
          "user_id" => "required|numeric",
          "agent_id" => "required|numeric",
          "vendor_commision" => "required|numeric",
          "agent_commision" => "required|numeric",
          "area_id" => "required|numeric",
      ];
    }
}
