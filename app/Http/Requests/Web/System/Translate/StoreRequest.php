<?php

namespace App\Http\Requests\Web\System\Translate;

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
            'group' => ['required','string','max:255'],
            'key' => ['required','string','max:255','unique:language_lines,key'],
            'lang_id' => ['required','string','max:255'],
            'lang_en' => ['required','string','max:255']
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
            'group' => trans('form.translate.group'),
            'key' => trans('form.translate.key'),
            'lang_id' => trans('form.translate.lang_id'),
            'lang_en' => trans('form.translate.lang_en')
        ];
    }
}
