<!-- resources/views/contacts/edit.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1 class="h1">Edit Contact Message</h1>
    <form class="form" action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="label" for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $contact->name }}" required>
        </div>
        <div class="form-group">
            <label class="label" for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $contact->email }}" required>
        </div>
        <div class="form-group">
            <label class="label" for="message">Message:</label>
            <textarea name="message" class="form-control" required>{{ $contact->message }}</textarea>
        </div>
        <button type="submit" class="btn1 btn-warning mt-3">Update</button>
        <button class="hapus" onclick="window.history.back();">kembali</button>

    </form>
</div>
@endsection
