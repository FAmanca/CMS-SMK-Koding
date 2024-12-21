@extends('layouts.main')
@section('content')
    <div class="container" style="margin-top: 10px; width: 50%">
        <h2>Buat kategori</h2>
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kategori" class="form-label text-center">Judul Kategpri</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori"
                    placeholder="kategori Artikel" value="{{ old('kategori') }}">
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection
