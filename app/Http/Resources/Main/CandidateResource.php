<?php

namespace App\Http\Resources\Main;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
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
            'candidate_id' => $this->id,
            'chairman' => $this->chairman,
            'vice_chairman' => $this->vice_chairman,
            'image' => ($this->image != null) ? url('storage/' . $this->image) : '-',
            'vision' => $this->vision,
            'mission' => $this->mission,
            'total_voting' => $this->total_voting
        ];
    }
}
