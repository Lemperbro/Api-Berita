<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Kategori;
use App\Models\PostKategori;
use App\Http\Resources\PostResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\KategoriResource;
use App\Http\Resources\PostDetailResource;
use App\Repositories\Interfaces\BeritaInterface;
use Exception;

class BeritaRepository implements BeritaInterface
{


    public function getAll()
    {
        $data = Post::with(['User', 'PostKategori.Kategori'])->get();
        //cara penulisan resource untuk data array atau banyak
        return PostResource::collection($data);
    }

    public function getDetail(Post $id)
    {
        $data = $id->load(['Comment.User', 'User', 'PostKategori.Kategori']);

        //cara penulisan resource untuk data single
        return new PostDetailResource($data);
    }

    public function getByKategori(Kategori $kategori)
    {

        try {
            $postKategoriIds = PostKategori::where('kategori_id', $kategori->id)->pluck('post_id');
            $data = Post::with(['user', 'postKategori.kategori'])->whereIn('id', $postKategoriIds)->get();
            return PostResource::collection($data);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }
    public function getAllByMe()
    {
        try {
            $data = Post::with(['user', 'postKategori.kategori'])->where('user_id', auth()->user()->id)->get();
            return PostResource::collection($data);
        } catch (Exception $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
    public function getByView(){
        try {
            $data = Post::with(['user', 'postKategori.kategori'])->orderBy('views', 'DESC')->get();
            return PostResource::collection($data);
        }catch(Exception $e){
            return response()->json([
                'error' => [
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
