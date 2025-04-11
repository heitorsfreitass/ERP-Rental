@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ url()->previous() }}" style="text-decoration: none; color: #000;font-size:20px;" class="hover-link-effect">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <h1>Edit Contract</h1>
    <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $contract->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="equipment_id">Equipment</label>
            <select name="equipment_id" id="equipment_id" class="form-control" required>
                @foreach($equipment as $item)
                    <option value="{{ $item->id }}" {{ $contract->equipment_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $contract->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $contract->end_date }}" required>
        </div>
        <div class="form-group">
            <label for="total_cost">Total Cost</label>
            <input type="number" name="total_cost" id="total_cost" class="form-control" value="{{ $contract->total_cost }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ $contract->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="completed" {{ $contract->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection