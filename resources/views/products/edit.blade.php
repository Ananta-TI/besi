@extends('layout')

@section('content')
<h1 class="h1">{{ isset($product) ? 'Edit' : 'Tambah' }} Produk</h1>
<form class="form" action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($product))
        @method('PUT')
    @endif

    <label class="label">Nama:</label>
    <input type="text" name="name" value="{{ $product->name ?? '' }}" required><br>

    <label class="label">Deskripsi:</label>
    <textarea name="description">{{ $product->description ?? '' }}</textarea><br>

    <label class="label">Harga:</label>
    <input type="number" name="price" value="{{ $product->price ?? '' }}" required><br>

    <label class="label">Stok:</label>
    <input type="number" name="stock" value="{{ $product->stock ?? '' }}" required><br>

    @if (isset($product) && $product->image)
        <div>
            <label class="label">Gambar Saat Ini:</label>
            <img src="{{ asset('images/products/' . $product->image) }}" alt="Gambar Produk" style="max-width: 150px; margin-bottom: 10px;">
        </div>
    @endif

    <label class="label">Gambar Baru (jika ingin mengganti):</label>
    <input type="file" name="image" {{ isset($product) ? '' : 'required' }} accept="image/*"><br>

    <button class="btn1" type="submit">{{ isset($product) ? 'Update' : 'Simpan' }}</button>
    <button class="btn2" onclick="window.history.back();">Kembali</button>
</form>
@endsection
