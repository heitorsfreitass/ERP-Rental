@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ url()->previous() }}" style="text-decoration: none; color: #000;font-size:20px;" class="hover-link-effect">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <h1>Edit Maintenance Log</h1>
    <form action="{{ route('maintenance-logs.update', $maintenanceLog->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="equipment_id">Equipment</label>
            <select name="equipment_id" id="equipment_id" class="form-control" required>
                @foreach($equipment as $item)
                    <option value="{{ $item->id }}" {{ $maintenanceLog->equipment_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="maintenance_date">Maintenance Date</label>
            <input type="date" name="maintenance_date" id="maintenance_date" class="form-control" value="{{ $maintenanceLog->maintenance_date }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $maintenanceLog->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="cost">Cost</label>
            <input type="number" name="cost" id="cost" class="form-control" value="{{ $maintenanceLog->cost }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection