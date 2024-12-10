<<<<<<< HEAD
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
                <a href="{{ route('products.edit', $product) }}">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">



</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <!-- Logo -->
        <div class="logo">
            <a href="#">MyApp</a>
        </div>

        <!-- Navigation Links -->
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="{{ route('products.index') }}">Product</a>
        </div>
    </div>

    <h1>Product List</h1>

    <div class="container">
        <a href="{{ route('products.create') }}" class="create-btn">Create New Product</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th   >
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('products.edit', $product) }}">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Kamu Yakin Ingin Menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="no-products">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
>>>>>>> 233b4874440df655a2803db24d5f106a6d39ca41
