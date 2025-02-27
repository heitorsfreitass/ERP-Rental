@extends('layouts.app')

@section('content')
    <h1>Client Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $client->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $client->phone }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $client->address }}</p>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection