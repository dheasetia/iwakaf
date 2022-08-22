<?php

namespace App\Http\Resources;

use App\Helper\OnaizaDuitku;
use App\Models\Story;
use App\Models\Update;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectDetailResource extends JsonResource
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
            'category_id'   => $this->category_id,
            'name'  => $this->name,
            'category'  => $this->category->category,
            'title' => $this->title,
            'location'  => $this->location,
            'target_amount' => $this->target_amount,
            'days_target'   => $this->days_target,
            'date_start'    => $this->date_start->format('d/m/Y'),
            'date_end'      => $this->date_end->format('d/m/Y'),
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
            'amount_collected'  => OnaizaDuitku::get_project_amount_collected($this->id),
            'days_remaining'    => OnaizaDuitku::get_project_remaining_days($this->id),
            'backers'   => OnaizaDuitku::get_project_backers($this->id),
            'total_backers' => count(OnaizaDuitku::get_project_backers($this->id)),
            'story' => Story::where('project_id', '=', $this->id)->first(),
            'updates'   => Update::where('project_id', '=', $this->id)->get(),
        ];
    }
}
