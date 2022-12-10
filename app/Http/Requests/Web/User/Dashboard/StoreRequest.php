<?php

namespace App\Http\Requests\Web\User\Dashboard;

use App\Http\Requests\WebRequest;

class StoreRequest extends WebRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required','numeric','exists:users,id'],
            'candidate_id' => ['required','numeric','exists:candidates,id']
        ];
    }
}
