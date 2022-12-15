<?php

namespace App\Http\Requests\Web\System\Page;

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
            'name' => ['required','string','max:255','unique:pages,name,'.$id],
            'label' => ['required','string','max:255'],
            'menu_id' => ['required','numeric','exists:menus,id'],
            'route' => ['required','string','max:255'],
            'icon' => ['required','string','max:255'],
            'permission' => ['required','string','max:255']
        ];
    }
}
