<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use App\Repositories\BeritaRepository;

class BeritaController extends Controller
{
    private $BeritaRepository;

    public function __construct()
    {
        $this->BeritaRepository = new BeritaRepository;
    }

    public function getAll()
    {
        $data = $this->BeritaRepository->getAll();
        return $data;
    }

    public function getDetail(Post $berita)
    {
        $data = $this->BeritaRepository->getDetail($berita);
        return $data;
    }
    public function getByKategori(Kategori $kategori)
    {
        $data = $this->BeritaRepository->getByKategori($kategori);
        return $data;
    }
    public function getAllByMe()
    {
        $data = $this->BeritaRepository->getAllByMe();
        return $data;
    }
    public function getByView(){
        $data = $this->BeritaRepository->getByView();
        return $data;
    }
}
