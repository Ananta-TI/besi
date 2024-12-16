@extends('layout')

@section('content')
<div class="container">

    <h1 class="text-center">Artikel</h1>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <label for="title">Judul:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="content">Konten:</label>
        <textarea name="content" id="content" required></textarea>
        <br>
        <button class="btn1" type="submit">Simpan Artikel</button>
        <button class="hapus" onclick="window.history.back();">kembali</button>
    </form>
</div>
@endsection
