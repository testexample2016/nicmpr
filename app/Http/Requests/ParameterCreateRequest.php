<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParameterCreateRequest extends FormRequest
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

            'parameters.*' => 'required|max:120|min:3',

            'project' => 'required|numeric'
              
        ];
    }


      public function messages(){

        $messages = []; 

  foreach($this->request->get('parameters') as $key => $val) { 

    $messages['parameters.'.$key.'.required'] = 'The field  "Parameter '.($key+1).'" must be required'; 

    $messages['parameters.'.$key.'.min'] = 'The field  "Parameter '.($key+1).'" must be greater than :min characters.';

    $messages['parameters.'.$key.'.max'] = 'The field "Parameter '.($key+1).'" must be less than :max characters.';

  } 

  $messages['project.required'] = 'Project required';

  $messages['project.numeric'] = 'Project numeric required';

  return $messages;
    

}

}
