<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create() {
        $categories = Category::all();
        return view('createarticle',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required|min:5',
            'isi' => 'required|min:10',
            'gambar' => 'required|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
        } else {
            return back()->with('error', 'Foto tidak ditemukan');
        }

        $post = new Post();
        $post->user_id = 1;
        $post->category_id = $request->kategori;
        $post->judul = $request->judul;
        $post->body = $request->isi;
        $post->image = $path;
        $post->save();
        return redirect()->route('home');
    }
}
