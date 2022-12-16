<?php

namespace App\Http\Requests\Web\System\Page;

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
            'name' => ['required','string','max:255','unique:pages,name'],
            'label' => ['required','string','max:255'],
            'menu_id' => ['required','numeric','exists:menus,id'],
            'route' => ['required','string','max:255'],
            'icon' => ['nullable','string','max:255'],
            'permission' => ['nullable','string','max:255']
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
            'name' => trans('form.page.name'),
            'label' => trans('form.page.label'),
            'menu_id' => trans('form.page.menu_id'),
            'route' => trans('form.page.route'),
            'icon' => trans('form.page.icon'),
            'permission' => trans('form.page.permission')
        ];
    }
}
