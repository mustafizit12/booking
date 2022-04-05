<?php

namespace App\Http\Requests\Area;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class AreaRequest extends FormRequest
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
      $table_name = 'areas';
      $unique_name_rules = $this->isMethod('Post')?Rule::unique($table_name):Rule::unique($table_name)->wherenot('id',$this->id);

      return [
          "name" => "required|".$unique_name_rules,
          "details" => "max:500",
      ];
    }
}
