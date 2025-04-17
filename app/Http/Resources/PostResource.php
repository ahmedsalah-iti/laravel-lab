<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
{

    return [
        "id" => $this->id,
        "post_title" => $this->title,
        "post_content" => $this->content,
        "post_img_url" => $this->image_url ? "http://127.0.0.1:8000/storage/" . $this->image_url : null,
        "user_data" => new UserResource($this->user)
    ];
}


}
