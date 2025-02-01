@extends('layouts.main')
@section('content')
    <div class="container home-container my-4">
        <h2 class="home-title">Koleksi</h2>
        <div class="row g-4">
            @foreach ($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <div class="card home-card shadow-sm">
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Gambar Artikel">

                        <div class="card-body home-card-body">
                            <h5 class="home-card-title">{{ $article->judul }}</h5>
                            <p class="home-card-text">{{ Str::limit($article->body, 80) }}</p>
                            <div class="mt-auto">
                                <p class="home-updated">Last updated {{ $article->updated_at->diffForHumans() }}</p>
                                <a href="{{ route('article.show', $article->id) }}" class="btn home-read-btn w-100">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
