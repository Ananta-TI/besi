@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Tambah Data About Us</h1>

    <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Input Title -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Judul:</label>
            <input type="text" name="title" id="title" class="border rounded-lg p-2 w-full" value="{{ old('title') }}" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Input Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi:</label>
            <textarea name="description" id="description" class="border rounded-lg p-2 w-full" required>{{ old('description') }}</textarea>
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

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('abouts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
        </div>
    </form>
</div>
@endsection
