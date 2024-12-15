<!-- resources/views/contacts/create.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1 class="h1">Contact Us</h1>
    <form class="form" action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="label" for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="label" for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="label" for="message">Message:</label>
            <textarea name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn1 btn-success mt-3">Send Message</button>
    </form>
</div>
@endsection
