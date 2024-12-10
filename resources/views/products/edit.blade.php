<<<<<<< HEAD
@extends('layout')

@section('content')
<h1>{{ isset($product) ? 'Edit' : 'Tambah' }} Produk</h1>
<form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
    @csrf
    @if (isset($product))
        @method('PUT')
    @endif
    <label>Nama:</label>
    <input type="text" name="name" value="{{ $product->name ?? '' }}" required><br>
    <label>Deskripsi:</label>
    <textarea name="description">{{ $product->description ?? '' }}</textarea><br>
    <label>Harga:</label>
    <input type="number" name="price" value="{{ $product->price ?? '' }}" required><br>
    <label>Stok:</label>
    <input type="number" name="stock" value="{{ $product->stock ?? '' }}" required><br>
    <button type="submit">{{ isset($product) ? 'Update' : 'Simpan' }}</button>
</form>
@endsection
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">

</head>
<body>
    <h1>Edit Product</h1>

    <div class="container">
        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}">
            </div>

            <!-- Menampilkan gambar saat ini -->
            @if ($product->image)
                <div class="current-image">
                    <label>Current Image:</label>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                </div>
            @endif

            <div class="form-group">
                <label for="image">Change Image:</label>
                <input type="file" name="image" id="image">
            </div>

            <button type="submit" class="btn">Update Product</button>
        </form>
    </div>
</body>
</html>
>>>>>>> 233b4874440df655a2803db24d5f106a6d39ca41
