<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/berita/kategori/{kategori:slug}/', [BeritaController::class, 'getByKategori'])->name('berita.kategori');
    Route::get('/berita/', [BeritaController::class, 'getAll'])->name('berita');
    Route::get('/berita/{berita:slug}/', [BeritaController::class, 'getDetail'])->name('berita.detail');
    Route::get('/berita/all/me', [BeritaController::class, 'getAllByMe'])->name('Berita.UserLogin');
    Route::get('/berita/favorit/all', [BeritaController::class, 'getByView'])->name('Berita.ByView');

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('Auth.Logout');
});

Route::post('/login', [AuthenticationController::class, 'login'])->name('Auth.Login');
Route::post('/register', [AuthenticationController::class, 'register'])->name('Auth.Register');
