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
