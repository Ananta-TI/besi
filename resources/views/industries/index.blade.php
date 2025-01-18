@extends('layout')

@section('content')
<div class="container">
    <h1>Industries</h1>
    <a href="{{ route('industries.create') }}" class="btn btn-primary">Add Industry</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($industries as $industry)
            <tr>
                <td>{{ $industry->name }}</td>
                <td><img src="{{ asset('storage/' . $industry->image) }}" alt="{{ $industry->name }}" width="100"></td>
                <td>
                    <a href="{{ route('industries.edit', $industry->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('industries.destroy', $industry->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
