<?php

namespace App\Http\Requests\Web\Admin\Admin;

use App\Http\Requests\WebRequest;

class ImportRequest extends WebRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'excel' => ['required','file','mimes:csv,xls,xlsx']
        ];
    }
}
