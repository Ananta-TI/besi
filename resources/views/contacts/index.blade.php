<!-- resources/views/contacts/index.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1 class="h1">Contact Messages</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>
                    {{ \Illuminate\Support\Str::limit($contact->message, 10) }}
                    @if(strlen($contact->message) > 100)
                        <a class="text" href="{{ route('contacts.show', $contact->id) }}">Read More</a>
                    @endif
                </td>
                                <td>
                    <a class="btn1" href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                    <a class="btn2" href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
