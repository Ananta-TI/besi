@extends('layout')

@section('content')
<div class="container">

    <h1 class="text-center">Artikel</h1>


    <!-- Tombol Create hanya akan muncul sekali jika pengguna sudah login -->
    @if (auth()->check())
        <a href="{{ route('articles.create') }}" class="btn btn-success mb-3">Buat Artikel Baru</a>
    @endif
</div>

    @foreach ($articles as $article)
        <div class="article container">
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->content }}</p>
            <small>Ditulis oleh {{ $article->user->name }} pada {{ $article->created_at->format('d M Y') }}</small>

            @if (auth()->check() && $article->user_id == auth()->id())
                <div class="article-actions mt-3">
                    <!-- Edit Button -->
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>

                    <!-- Delete Form -->
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            @endif
        </div>
        <hr>
    @endforeach
@endsection
