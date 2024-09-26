@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <h1>Districts</h1>
            <a href="{{ route('districts.create') }}" class="btn btn-primary mb-3">Add New District</a>
        </div>

        <div class="card-body">
            @if ($districts->isEmpty())
                <p>No districts found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($districts as $district)
                            <tr>
                                <td>{{ $district->name }}</td>
                                <td>{{ $district->status ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('districts.edit', $district->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('districts.destroy', $district->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
