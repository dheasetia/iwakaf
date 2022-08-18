<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BioResource extends JsonResource
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
            'first_name'  => $this->first_name,
            'last_name'  => $this->last_name,
            'full_name' => $this->full_name,
            'phone_number' => $this->phone_number,
            'email'    => $this->user->email,
            'user_id'   => $this->user_id,
            'address' => $this->address,
            'village' => $this->village,
            'district'  => $this->district,
            'city'  => $this->city,
            'province' => $this->province,
            'zip_code' => $this->zip_code,
            'avatar_url' => $this->avatar_url,
            'level' => $this->level
        ];
    }
}
