<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

class KategoriController extends Controller
{
    

    public function getByKategori(Kategori $kategori){
        return response()->json($kategori);
    }
}
