@extends('layouts.app')

@section('content')
    <h1>Contract Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Contract #{{ $contract->id }}</h5>
            <p class="card-text"><strong>Client:</strong> {{ $contract->client->name }}</p>
            <p class="card-text"><strong>Equipment:</strong> {{ $contract->equipment->name }}</p>
            <p class="card-text"><strong>Start Date:</strong> {{ $contract->start_date }}</p>
            <p class="card-text"><strong>End Date:</strong> {{ $contract->end_date }}</p>
            <p class="card-text"><strong>Total Cost:</strong> {{ $contract->total_cost }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $contract->status }}</p>
            <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection