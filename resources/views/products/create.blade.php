<!-- resources/views/products/create.blade.php -->
@extends('layout')

@section('content')
<h1>Tambah Produk</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Nama Produk</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Deskripsi</label>
    <textarea name="description" id="description" required></textarea>

    <label for="price">Harga</label>
    <input type="number" name="price" id="price" required>

    <label for="stock">Stok</label>
    <input type="number" name="stock" id="stock" required>

    <label for="image">Gambar Produk</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <button type="submit">Tambah Produk</button>
</form>
@endsection
