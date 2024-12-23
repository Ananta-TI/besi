<!-- resources/views/products/create.blade.php -->
@extends('layout')

@section('content')
<h1 class="h1">Tambah Produk</h1>

<form class="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label class="label" for="name">Nama Produk</label>
    <input type="text" name="name" id="name" required>

    <label class="label" for="description">Deskripsi</label>
    <textarea name="description" id="description" required></textarea>

    <label class="label" for="price">Harga</label>
    <input type="number" name="price" id="price" required>

    <label class="label" for="stock">Stok</label>
    <input type="number" name="stock" id="stock" required>

    <label class="label" for="image">Gambar Produk</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <button class="btn1 m-3" type="submit">Tambah Produk</button>
    <button class="hapus" onclick="window.history.back();">kembali</button>

</form>
@endsection


