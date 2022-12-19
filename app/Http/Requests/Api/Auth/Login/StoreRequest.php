<?php

namespace App\Http\Requests\Api\Auth\Login;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nis' => ['required','numeric','exists:users,nis'],
            'password' => ['required','string','min:8','max:255']
        ];
    }
}
