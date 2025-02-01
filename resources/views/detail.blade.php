@extends('layouts.main')
@section('content')
    <div class="container detail-container my-5">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="detail-article shadow-sm rounded-3 p-4 bg-white">
                    <h1 class="detail-title">{{ $article->judul }}</h1>
                    <p class="detail-meta text-muted">Diperbarui {{ $article->updated_at->diffForHumans() }}</p>
                    <img src="{{ asset('storage/' . $article->image) }}" class="detail-image img-fluid rounded" alt="Gambar Artikel">
                    <div class="detail-content mt-4">
                        {!! nl2br(e($article->body)) !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="detail-sidebar p-3 shadow-sm rounded-3 bg-light">
                    <h5 class="detail-sidebar-title">Artikel Lainnya</h5>
                    <ul class="list-unstyled">
                        @foreach ($relatedArticles as $related)
                            <li class="detail-related-item mb-3">
                                <a href="{{ route('article.show', $related->id) }}" class="detail-related-link">
                                    {{ $related->judul }}
                                </a>
                                <p class="text-muted small">{{ $related->updated_at->diffForHumans() }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
