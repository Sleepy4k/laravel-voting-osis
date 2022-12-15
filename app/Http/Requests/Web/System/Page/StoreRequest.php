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
            'icon' => ['required','string','max:255'],
            'permission' => ['required','string','max:255']
        ];
    }
}
