<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'picture_url' => asset('assets/img/articles/pictures' . '/' . $this->picture_url),
            'user_id' => $this->user_id,
            'user'  => new UserResource($this->user),
            'title' => $this->title,
            'location' => $this->location,
            'content' => $this->content,
            'article_category_id' => $this->article_category_id,
            'article_category' => new ArticleCategoryResource($this->article_category),
            'editor_id' => $this->editor_id,
            'editor' => new UserResource($this->editor),
        ];
    }
}
