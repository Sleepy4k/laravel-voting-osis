<?php

namespace App\Http\Requests\Web\Admin\User;

use App\Rules\LanguageRule;
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
            'name' => ['required','string','max:255'],
            'nis' => ['required','string','max:255','unique:users,nis,'.$id],
            'grade' => ['required','string','max:255','exists:grades,name'],
            'language' => ['required','string','max:255',new LanguageRule],
            'role' => ['nullable','string','max:255','exists:roles,id']
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
            'grade' => trans('form.user.grade')
        ];
    }
}
