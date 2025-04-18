<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "user_id" => $this->id,
            "user_name" => $this->name,
            "user_email" => $this->email,
            "user_posts" => $this->posts,
            //                 NOT WORK !
            //"user_posts" => new PostResource($this->posts)
            // "user_posts" => PostResource::collection($this->posts)
        ];
    }
}
