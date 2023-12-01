<?php

namespace Crm\Base\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    abstract public function authorize();

    /**
     * Get the validation rules that apply to the request.
     *
     */
    abstract public function rules();

    protected function failedValidation(Validator $validator)
    {
        $exception = $validator->getException();
        $errors = (new $exception($validator))->errors();
       if(! empty($errors)){
           $transformedErrors = [];
           foreach ($errors as $field => $message){
               $transformedErrors = [
                   $field => $message[0]
               ];
           }

           throw new HttpResponseException(
               response()->json(
                   [
                       "status" => "error",
                       "errors" => $transformedErrors
                   ],
                JsonResponse::HTTP_BAD_REQUEST
            )
           );
       }
    }
}
