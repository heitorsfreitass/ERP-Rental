@extends('layouts.app')

@section('content')
    <h1>Maintenance Logs</h1>
    <a href="{{ route('maintenance-logs.create') }}" class="btn btn-primary mb-3">Add New Maintenance Log</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Equipment</th>
                <th>Maintenance Date</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($maintenanceLogs as $log)
                <tr>
                    <td>{{ $log->equipment->name }}</td>
                    <td>{{ $log->maintenance_date }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->cost }}</td>
                    <td>
                        <a href="{{ route('maintenance-logs.edit', $log->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('maintenance-logs.destroy', $log->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection