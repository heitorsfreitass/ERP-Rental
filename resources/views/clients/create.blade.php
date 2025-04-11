@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ url()->previous() }}" style="text-decoration: none; color: #000;font-size:20px;" class="hover-link-effect">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <h1>Create New Client</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection