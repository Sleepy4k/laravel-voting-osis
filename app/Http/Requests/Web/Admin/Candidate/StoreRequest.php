<?php

namespace App\Http\Requests\Web\Admin\Candidate;

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
            'chairman' => ['required','string','max:255','unique:candidates,chairman'],
            'vice_chairman' => ['required','string','max:255','unique:candidates,vice_chairman'],
            'image' => ['required','image','mimes:jpg,jpeg,png,svg','max:4092','dimensions:min_width=100,min_height=100'],
            'vision' => ['required','string'],
            'mission' => ['required','string']
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
            'chairman' => trans('form.candidate.chairman'),
            'vice_chairman' => trans('form.candidate.vice_chairman'),
            'image' => trans('form.candidate.image'),
            'vision' => trans('form.candidate.vision'),
            'mission' => trans('form.candidate.mission')
        ];
    }
}
