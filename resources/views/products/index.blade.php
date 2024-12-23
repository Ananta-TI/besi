@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">

    <h1 class="text-5xl font-bold text-center mb-6">Daftar Produk</h1>
    <button class="btn1 m-3">
        <a class="no-underline text-white" href="{{ route('products.create') }}">Tambah Produk</a>
    </button>

    @if (session('success'))
        <p class="test">{{ session('success') }}</p>
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
                <td>
                    {{ implode(' ', array_slice(explode(' ', $product->description), 0, 3)) }}
                    @if (str_word_count($product->description) > 10)
                        ... <a href="{{ route('products.show', $product->id) }}">Read More</a>
                    @endif
                </td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="Gambar {{ $product->name }}" style="width:100px; height:100px; object-fit:cover;">
                </td>
                <td>
                    <!-- Edit Button -->
                    <a class="btn2 no-underline" href="{{ route('products.edit', $product) }}"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" fill="#fafafa" viewBox="0 0 256 256"><path d="M230.14,70.54,185.46,25.85a20,20,0,0,0-28.29,0L33.86,149.17A19.85,19.85,0,0,0,28,163.31V208a20,20,0,0,0,20,20H92.69a19.86,19.86,0,0,0,14.14-5.86L230.14,98.82a20,20,0,0,0,0-28.28ZM91,204H52V165l84-84,39,39ZM192,103,153,64l18.34-18.34,39,39Z"></path></svg></a>

                    <!-- Show Button -->
                    <a class="btn1 no-underline" href="{{ route('products.show', $product->id) }}"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" fill="#fafafa" viewBox="0 0 256 256"><path d="M251,123.13c-.37-.81-9.13-20.26-28.48-39.61C196.63,57.67,164,44,128,44S59.37,57.67,33.51,83.52C14.16,102.87,5.4,122.32,5,123.13a12.08,12.08,0,0,0,0,9.75c.37.82,9.13,20.26,28.49,39.61C59.37,198.34,92,212,128,212s68.63-13.66,94.48-39.51c19.36-19.35,28.12-38.79,28.49-39.61A12.08,12.08,0,0,0,251,123.13Zm-46.06,33C183.47,177.27,157.59,188,128,188s-55.47-10.73-76.91-31.88A130.36,130.36,0,0,1,29.52,128,130.45,130.45,0,0,1,51.09,99.89C72.54,78.73,98.41,68,128,68s55.46,10.73,76.91,31.89A130.36,130.36,0,0,1,226.48,128,130.45,130.45,0,0,1,204.91,156.12ZM128,84a44,44,0,1,0,44,44A44.05,44.05,0,0,0,128,84Zm0,64a20,20,0,1,1,20-20A20,20,0,0,1,128,148Z"></path></svg></a>

                    <!-- Delete Button -->
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <a class="hapus" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" fill="#fafafa" viewBox="0 0 256 256"><path d="M216,48H180V36A28,28,0,0,0,152,8H104A28,28,0,0,0,76,36V48H40a12,12,0,0,0,0,24h4V208a20,20,0,0,0,20,20H192a20,20,0,0,0,20-20V72h4a12,12,0,0,0,0-24ZM100,36a4,4,0,0,1,4-4h48a4,4,0,0,1,4,4V48H100Zm88,168H68V72H188ZM116,104v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Zm48,0v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Z"></path></svg></a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
