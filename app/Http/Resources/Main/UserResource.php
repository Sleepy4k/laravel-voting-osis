<?php

namespace App\Http\Resources\Main;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'voting_status' => ($this->voting_status == 'true') ? 'Sudah Voting' : 'Belum Voting'
        ];
    }
}
