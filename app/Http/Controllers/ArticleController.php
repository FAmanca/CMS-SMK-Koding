<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function create() {
        $categories = Category::all();
        return view('createarticle',[
            'categories' => $categories,
            'data' => null
        ]);
    }

    public function show(Post $post) {
        $relatedArticles = Post::where('id', '!=', $post->id)
                              ->latest()
                              ->take(5)
                              ->get();
        return view('detail',[
            'article'=> $post,
            'relatedArticles'=> $relatedArticles
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
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->kategori;
        $post->judul = $request->judul;
        $post->body = $request->isi;
        $post->image = $path;
        $post->save();
        return redirect()->route('home');
    }

    public function manage() {
        $articles = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('managearticle',[
            'articles' => $articles
        ]);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('article.manage');
    }

    public function edit(Post $post) {
        $categories = Category::all();
        return view('createarticle',[
            'categories' => $categories,
            'data' => $post
        ]);
    }

    public function update(Request $request, Post $post) {
        $request->validate([
            'judul' => 'required|min:5',
            'isi' => 'required|min:10'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $post->image = $path;
        }

        $post->user_id = Auth::user()->id;
        $post->category_id = $request->kategori;
        $post->judul = $request->judul;
        $post->body = $request->isi;
        $post->save();
        return redirect()->route('article.manage');
    }
}
