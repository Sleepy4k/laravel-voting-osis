<?php

namespace App\Http\Requests\Web\System\Menu;

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
            'name' => ['required','string','max:255','unique:menus,name'],
            'label' => ['required','string','max:255'],
            'ordering' => ['required','string','max:255'],
            'role' => ['required','string','max:255']
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
            'name' => trans('form.menu.name'),
            'label' => trans('form.menu.label'),
            'ordering' => trans('form.menu.ordering'),
            'role' => trans('form.menu.role')
        ];
    }
}
