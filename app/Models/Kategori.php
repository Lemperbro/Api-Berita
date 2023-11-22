<?php

namespace App\Models;

use App\Models\Post;
use App\Models\PostKategori;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory,Sluggable;

    protected $guarded = [
        'id'
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'kategori'
            ]
        ];
    }

    public function Berita(){
        return $this->hasMany(Post::class);
    }
    public function PostKategori(){
        return $this->hasMany(PostKategori::class);
    }
}
