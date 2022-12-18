<?php

namespace App\Http\Requests\Web\Admin\Permission;

use App\Rules\GuardNameRule;
use App\Http\Requests\WebRequest;

class UpdateRequest extends WebRequest
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
        $id = basename(request()->path());

        return [
            'name' => ['required','string','max:255','unique:roles,name,'.$id],
            'guard_name' => ['required','string','max:255',new GuardNameRule]
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => trans('form.permission.name'),
            'guard_name' => trans('form.permission.guard_name')
        ];
    }
}
