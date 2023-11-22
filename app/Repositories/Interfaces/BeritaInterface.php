<?php

namespace App\Repositories\Interfaces;

use App\Models\Kategori;
use App\Models\Post;

interface BeritaInterface
{
    public function getAll();
    public function getDetail(Post $id);
    public function getByKategori(Kategori $kategori);
    public function getAllByMe();
    public function getByView();
}
