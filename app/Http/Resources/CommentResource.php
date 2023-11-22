<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $url = $request->routeIs('comment.*');
        return [
            "id" => $this->when($url, function(){
                return $this->id;
            }),
            "post_id" => $this->post_id,
            "username" => $this->User->username,
            "comment" => $this->comment
        ];
    }
}
