<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'category_id'   => $this->category_id,
            'category'  => $this->category->category,
            'title' => $this->title,
            'location'  => $this->location,
            'target_amount' => $this->target_amount,
            'days_target'   => $this->days_target,
            'date_start'    => $this->date_start->format('d/m/Y'),
            'date_end'      => $this->date_end->format('d/m/Y'),
            'is_shown'      => $this->is_shown,
            'facebook_link' => $this->facebook_link,
            'picture_url' => asset('assets/img/projects/pictures') . '/' . $this->picture_url,
            'featured_picture_url' => asset('assets/img/projects/featured_pictures') . '/' . $this->featured_picture_url,
            'caption' => $this->caption,
            'is_favourite' => $this->is_favourite,
            'first_choice_amount'   => $this->first_choice_amount,
            'second_choice_amount'  => $this->second_choice_amount,
            'third_choice_amount'   => $this->third_choice_amount,
            'fourth_choice_amount'  => $this->fourth_choice_amount,
            'maintenance_fee'   => $this->maintenance_fee,
        ];
    }
}
