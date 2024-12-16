@extends('layout')

@section('content')
<h1 class="text-center">Artikel</h1>
<form class="container" action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Judul:</label>
        <input type="text" name="title" value="{{ $article->title }}" required>
        <br>
        <label for="content">Konten:</label>
        <textarea name="content" required>{{ $article->content }}</textarea>
        <br>
        <button class="btn1" type="submit">Update Artikel</button>
        <button class="hapus" onclick="window.history.back();">kembali</button>
    </form>
@endsection
