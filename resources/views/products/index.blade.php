
@extends('layout')

@section('content')
<h1>Daftar Produk</h1>
<a href="{{ route('products.create') }}">Tambah Produk</a>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th> <!-- Kolom gambar -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <img src="{{ asset('images/products/' . $product->image) }}" alt="Gambar {{ $product->name }}" style="width:100px; height:100px; object-fit:cover;">
            </td>
            <td>
                <a class="test" href="{{ route('products.edit', $product) }}">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
