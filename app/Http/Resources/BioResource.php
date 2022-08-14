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
            'user_id'   => $this->user_id,
            'user'  => new UserResource($this->user)
        ];
    }
}
