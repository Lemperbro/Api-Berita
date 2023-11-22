<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostKategori extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];


    public function Berita(){
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function Kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    
}
