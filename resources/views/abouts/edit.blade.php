@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Edit Data About Us</h1>

    <form action="{{ route('abouts.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Input Title -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Judul:</label>
            <input type="text" name="title" id="title" class="border rounded-lg p-2 w-full" value="{{ old('title', $aboutUs->title) }}" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Input Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi:</label>
            <textarea name="description" id="description" class="border rounded-lg p-2 w-full" required>{{ old('description', $aboutUs->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Input Image -->
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Gambar (Opsional):</label>
            <input type="file" name="image" id="image" class="border rounded-lg p-2 w-full" accept="image/*">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Menampilkan Gambar Saat Ini (Jika Ada) -->
        @if ($aboutUs->image)
            <div class="mb-4">
                <p class="text-gray-700 font-bold mb-2">Gambar Saat Ini:</p>
                <img src="{{ asset('images/abouts/' . $aboutUs->image) }}" alt="Gambar {{ $aboutUs->title }}" class="rounded-lg shadow-md" style="max-width: 200px;">
            </div>
        @endif

              <!-- Submit Button -->
              <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
                <a href="{{ route('abouts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            </div>
        </form>
    </div>
    @endsection
