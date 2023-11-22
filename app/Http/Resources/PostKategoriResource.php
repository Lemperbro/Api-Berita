<?php

namespace App\Http\Resources;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Resources\KategoriResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostKategoriResource extends JsonResource
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
            "slug" => $this->Kategori->slug,
            "kategori" => $this->Kategori->kategori,
        ];
    }
}
