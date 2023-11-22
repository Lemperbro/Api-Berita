<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Kategori;
use App\Models\PostKategori;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [
        'id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function Kategori()
    {
        return $this->hasMany(Kategori::class);
    }
    public function PostKategori()
    {
        return $this->hasMany(PostKategori::class);
    }
    
}
