@extends('layout')

@section('content')
<main class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold text-gray-800">{{ $product->name }}</h1>
    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="my-4 max-w-full h-auto rounded-lg shadow-lg">
    <p class="text-lg text-gray-600">{{ $product->description }}</p>
    <button class="btn1" onclick="window.history.back();">Back to Home</button>
</main>
@endsection
