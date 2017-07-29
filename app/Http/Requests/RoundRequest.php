<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Validation\Validator;

class RoundRequest extends FormRequest
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
            'office_id' => 'integer|exists:offices,id|required',
            'employee_id' => 'integer|exists:employees,id|required',
            'status_round_id' => 'integer|exists:status_rounds,id|required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'office_id.integer' => 'El campo "Centro" tiene un valor incorrecto',
            'office_id.exists' => 'El campo "Centro" que eligio realmente no existe',
            'office_id.required' => 'El campo "Centro" es requerido',

            'employee_id.integer' => 'El campo "Empleado" tiene un valor incorrecto',
            'employee_id.exists' => 'El campo "Empleado" que eligio realmente no existe',
            'employee_id.required' => 'El campo "Empleado" es requerido',

            'status_round_id.integer' => 'El campo "Estado" tiene un valor incorrecto',
            'status_round_id.exists' => 'El campo "Estado" que eligio realmente no existe',
            'status_round_id.required' => 'El campo "Estado" es requerido',
        ];
    }

     /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        return response()->json(["errors" => $errors]);
    }

}
