@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ url()->previous() }}" style="text-decoration: none; color: #000;font-size:20px;" class="hover-link-effect">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <h1>Create New Equipment</h1>
    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="available">Available</option>
                <option value="rented">Rented</option>
                <option value="under_maintenance">Under Maintenance</option>
            </select>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection