@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ url()->previous() }}" style="text-decoration: none; color: #000;font-size:20px;" class="hover-link-effect">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <h1>Edit Equipment</h1>
    <form action="{{ route('equipment.update', $equipment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $equipment->name }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ $equipment->type }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="available" {{ $equipment->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="rented" {{ $equipment->status == 'rented' ? 'selected' : '' }}>Rented</option>
                <option value="under_maintenance" {{ $equipment->status == 'under_maintenance' ? 'selected' : '' }}>Under Maintenance</option>
            </select>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $equipment->location }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection