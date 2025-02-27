@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Welcome to Tecompac ERP</h1>

        <!-- Quick Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Clients</h5>
                        <p class="card-text display-4">{{ $totalClients }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Equipment</h5>
                        <p class="card-text display-4">{{ $totalEquipment }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Active Contracts</h5>
                        <p class="card-text display-4">{{ $activeContracts }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pending Maintenance</h5>
                        <p class="card-text display-4">{{ $pendingMaintenance }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Cards -->
        <div class="row">
            <!-- Clients Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Clients</h5>
                        <p class="card-text">Manage client information.</p>
                        <a href="{{ route('clients.index') }}" class="btn btn-primary">Go to Clients</a>
                    </div>
                </div>
            </div>

            <!-- Equipment Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Equipment</h5>
                        <p class="card-text">Manage equipment inventory.</p>
                        <a href="{{ route('equipment.index') }}" class="btn btn-primary">Go to Equipment</a>
                    </div>
                </div>
            </div>

            <!-- Contracts Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Contracts</h5>
                        <p class="card-text">Manage rental contracts.</p>
                        <a href="{{ route('contracts.index') }}" class="btn btn-primary">Go to Contracts</a>
                    </div>
                </div>
            </div>

            <!-- Maintenance Logs Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Maintenance Logs</h5>
                        <p class="card-text">Track equipment maintenance.</p>
                        <a href="{{ route('maintenance-logs.index') }}" class="btn btn-primary">Go to Maintenance Logs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection