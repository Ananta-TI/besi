@extends('layout')

@section('content')
<h1 class="h1">{{ isset($product) ? 'Edit' : 'Tambah' }} Produk</h1>
<form class="form" action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
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
    <button class="btn1" type="submit">{{ isset($product) ? 'Update' : 'Simpan' }}</button>
    <button class="btn2" onclick="window.history.back();">kembali</button>

</form>
@endsection
