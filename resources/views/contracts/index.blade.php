@extends('layouts.app')

@section('content')
    <h1>Contracts</h1>
    <a href="{{ route('contracts.create') }}" class="btn btn-primary mb-3">Add New Contract</a>
    {{-- Tabela de contratos ativos --}}
    <h3>Active Contracts</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Client</th>
                <th>Equipment</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
            @if($contract->status != 'completed')
            <tr>
                <td>{{ $contract->client->name }}</td>
                <td>{{ $contract->equipment->name }}</td>
                <td>{{ $contract->start_date }}</td>
                <td>{{ $contract->end_date }}</td>
                <td>{{ $contract->total_cost }}</td>
                <td style="font-weight:bold;">{{ $contract->status }}</td>
                <td>
                    <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

    {{-- Tabela de contratos finalizados --}}
    <h3>Completed Contracts</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Client</th>
                <th>Equipment</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
            @if($contract->status == 'completed')
            <tr>
                <td>{{ $contract->client->name }}</td>
                <td>{{ $contract->equipment->name }}</td>
                <td>{{ $contract->start_date }}</td>
                <td>{{ $contract->end_date }}</td>
                <td>{{ $contract->total_cost }}</td>
                <td style="font-weight:bold;">{{ $contract->status }}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
@endsection