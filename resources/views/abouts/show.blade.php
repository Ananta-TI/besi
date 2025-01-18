@extends('layout')

@section('content')
<div class="container mt-5">
    <!-- Judul -->
    <h1 class="text-4xl font-bold text-center mb-5">{{ $about->title }}</h1>

    <!-- Gambar (Jika Ada) -->
    @if ($about->image)
        <div class="text-center mb-5">
            <img src="{{ asset('images/abouts/' . $about->image) }}" alt="{{ $about->title }}" class="rounded-lg shadow-md" style="max-width: 400px; width: 100%; height: auto;">
        </div>
    @endif

    <!-- Deskripsi -->
    <p class="text-lg text-gray-700 text-center mb-5">{{ $about->description }}</p>

    <!-- Tombol Kembali -->
    <div class="text-center">
        <a href="{{ route('abouts.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
