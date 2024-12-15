<!-- resources/views/contacts/show.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1 class="h1">Contact Detail</h1>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>
    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Back to Contacts</a>
</div>
@endsection
