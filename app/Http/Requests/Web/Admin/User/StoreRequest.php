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
            'chairman' => 'Nama Ketua',
            'vice_chairman' => 'Nama Wakil Ketua',
            'image' => 'Foto Calon',
            'vision' => 'Visi',
            'mission' => 'Misi'
        ];
    }
}
