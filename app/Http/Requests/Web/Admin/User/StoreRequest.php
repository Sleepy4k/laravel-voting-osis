<?php

namespace App\Http\Requests\Web\Admin\User;

use App\Http\Requests\WebRequest;

class StoreRequest extends WebRequest
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
            'name' => ['required','string','max:255'],
            'nis' => ['required','string','max:255','unique:users,nis'],
            'grade' => ['required','string','max:255','exists:grades,name'],
            'password' => ['required','string','min:8','max:255','confirmed']
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
            'name' => trans('form.user.name'),
            'nis' => trans('form.user.nis'),
            'grade' => trans('form.user.grade'),
            'password' => trans('form.user.password'),
            'password_confirmation' => trans('form.user.password_confirmation')
        ];
    }
}
