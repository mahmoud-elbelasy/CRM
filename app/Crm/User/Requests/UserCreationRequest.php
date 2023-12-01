<?php

namespace Crm\User\Requests;

use Crm\Base\Requests\ApiRequest;

class UserCreationRequest extends ApiRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => ['required','unique:users,name'],
            'email' => ['required','unique:users,email'],
            'password' => ['required','min:6']
        ];
    }
}
