@extends('layouts.app')

@section('content')
    <h1>Create New Maintenance Log</h1>
    <form action="{{ route('maintenance-logs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="equipment_id">Equipment</label>
            <select name="equipment_id" id="equipment_id" class="form-control" required>
                @foreach($equipment as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="maintenance_date">Maintenance Date</label>
            <input type="date" name="maintenance_date" id="maintenance_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="cost">Cost</label>
            <input type="number" name="cost" id="cost" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection