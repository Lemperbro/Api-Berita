<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostKategoriResource;
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
            "success" => true,
            "id" => $this->id,
            "title" => $this->title,
            "slug" => $this->slug,
            "banner" => $this->banner,
            "author" => [
                "username" => $this->User->username
            ],
            "content" => $this->content,
            "kategori" => PostKategoriResource::collection($this->whenLoaded('PostKategori')),
            "created_at" => Carbon::parse($this->created_at)->locale('id')->isoFormat('DD MMMM YYYY'),
        ];
    }
}
