@extends('layouts.main')
@section('content')
    <div class="container" style="margin-top: 10px; width: 50%">
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                    placeholder="Judul Artikel" value="{{ old('judul') }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <p>Belum memiliki kategori?<a href="{{ route('category.create') }}"><i> Buat kategori di sini</i></a></p>
                <select class="form-select" aria-label="kategori" name="kategori">
                    <option selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->judul_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="body" rows="3">{{ old('isi') }}</textarea>
                @error('isi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Choose Photo</label>
                <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" type="file"
                    id="formFile">
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection
