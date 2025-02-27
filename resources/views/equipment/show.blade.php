@extends('layouts.app')

@section('content')
    <h1>Equipment Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $equipment->name }}</h5>
            <p class="card-text"><strong>Type:</strong> {{ $equipment->type }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $equipment->status }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $equipment->location }}</p>
            <a href="{{ route('equipment.edit', $equipment->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('equipment.destroy', $equipment->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection