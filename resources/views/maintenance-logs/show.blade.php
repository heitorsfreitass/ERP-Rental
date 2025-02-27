@extends('layouts.app')

@section('content')
    <h1>Maintenance Log Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Log #{{ $maintenanceLog->id }}</h5>
            <p class="card-text"><strong>Equipment:</strong> {{ $maintenanceLog->equipment->name }}</p>
            <p class="card-text"><strong>Maintenance Date:</strong> {{ $maintenanceLog->maintenance_date }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $maintenanceLog->description }}</p>
            <p class="card-text"><strong>Cost:</strong> {{ $maintenanceLog->cost }}</p>
            <a href="{{ route('maintenance-logs.edit', $maintenanceLog->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('maintenance-logs.destroy', $maintenanceLog->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection