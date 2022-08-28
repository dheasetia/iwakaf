<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
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
            'id'    => $this->id,
            'payment_method_type_id' => $this->payment_method_type_id,
            'payment_method_type'    => new PaymentMethodTypeResource($this->payment_method_type),
            'display_text'      => $this->display_text,
            'icon_url'  => $this->icon_url,
            'is_shown'  => $this->is_shown,
            'fee'   => $this->fee
        ];
    }
}
