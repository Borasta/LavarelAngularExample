<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlertRequest extends FormRequest
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
            'description' => 'string|min:3|max:250|required',   
            'office_id' => 'integer|exists:offices,id|required',
            'status_alert_id' => 'integer|exists:status_alerts,id|required',
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
            'description.string' => 'El campo "Detalle" tiene un valor incorrecto',
            'description.min' => 'El campo "Detalle" debe contener minimo 3 caracteres',
            'description.max' => 'El campo "Detalle" debe contener maximo 250 caracteres',
            'description.required' => 'El campo "Detalle" es requerido',

            'office_id.integer' => 'El campo "Centro" tiene un valor incorrecto',
            'office_id.exists' => 'El campo "Centro" que eligio realmente no existe',
            'office_id.required' => 'El campo "Centro" es requerido',

            'status_alert_id.integer' => 'El campo "Tipo" tiene un valor incorrecto',
            'status_alert_id.exists' => 'El campo "Tipo" que eligio realmente no existe',
            'status_alert_id.required' => 'El campo "Tipo" es requerido',
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
