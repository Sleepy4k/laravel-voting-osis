<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\Resource;

class LoginResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nis' => $this->nis,
            'name' => $this->name,
            'grade' => $this->grade,
            'language' => $this->language,
            'voting_status' => $this->voting_status
        ];
    }
}