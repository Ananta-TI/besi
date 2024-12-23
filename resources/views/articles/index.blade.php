@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-5xl font-bold text-center mb-6">Artikel</h1>

    @if (auth()->check())
    <a href="{{ route('articles.create') }}" class="bg-green-500 no-underline hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-6 inline-flex items-center">
        Buat Artikel Baru
        <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-2" width="20" height="20" fill="#fafafa" viewBox="0 0 256 256">
            <path d="M224.49,136.49l-72,72a12,12,0,0,1-17-17L187,140H40a12,12,0,0,1,0-24H187L135.51,64.48a12,12,0,0,1,17-17l72,72A12,12,0,0,1,224.49,136.49Z"></path>
        </svg>
    </a>

    @endif

    @foreach ($articles as $article)
        <div class="shadow-md p-6 mb-6">
            <div class="flex items-start mb-4">
                <div class="mr-4">
                    <span class="text-black text-4xl font-bold">{{ $article->created_at->format('d') }}</span><br>
                    <span class="text-gray-500 font-bold uppercase text-1xl">{{ $article->created_at->format('M') }}</span>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-yellow-500 transition duration-300">{{ $article->title }}</h3>
                    <p class="text-gray-700 mt-2">{{ $article->content }}</p>
                    <div class="mt-2 text-gray-600 text-sm">
                        Ditulis oleh {{ $article->user->name }}
                    </div>
                </div>
            </div>

            @if (auth()->check() && $article->user_id == auth()->id())
                <div class="flex space-x-2 mt-4">
                    <a href="{{ route('articles.edit', $article->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" fill="#fafafa" viewBox="0 0 256 256"><path d="M230.14,70.54,185.46,25.85a20,20,0,0,0-28.29,0L33.86,149.17A19.85,19.85,0,0,0,28,163.31V208a20,20,0,0,0,20,20H92.69a19.86,19.86,0,0,0,14.14-5.86L230.14,98.82a20,20,0,0,0,0-28.28ZM91,204H52V165l84-84,39,39ZM192,103,153,64l18.34-18.34,39,39Z"></path></svg>
                    </a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" fill="#fafafa" viewBox="0 0 256 256"><path d="M216,48H180V36A28,28,0,0,0,152,8H104A28,28,0,0,0,76,36V48H40a12,12,0,0,0,0,24h4V208a20,20,0,0,0,20,20H192a20,20,0,0,0,20-20V72h4a12,12,0,0,0,0-24ZM100,36a4,4,0,0,1,4-4h48a4,4,0,0,1,4,4V48H100Zm88,168H68V72H188ZM116,104v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Zm48,0v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Z"></path></svg>
                        </button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</div>
@endsection
