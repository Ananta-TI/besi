@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">About Us</h1>
    <a href="{{ route('abouts.create') }}" class="btn btn-primary mb-3">Tambah About Us</a>

    @foreach ($abouts as $about)
        <div class="card mb-3">
            <div class="card-body">
                @if ($about->image)
                    <img src="{{ asset('images/abouts/' . $about->image) }}" alt="{{ $about->title }}" class="img-thumbnail mb-3" style="max-width: 300px;">
                @endif

                <h3>{{ $about->title }}</h3>
                <p>{{ $about->description }}</p>

                <a href="{{ route('abouts.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('abouts.destroy', $about->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
