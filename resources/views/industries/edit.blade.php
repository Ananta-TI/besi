@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Industry</h1>
    <form action="{{ route('industries.update', $industry->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $industry->name }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ asset('storage/' . $industry->image) }}" alt="{{ $industry->name }}" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
