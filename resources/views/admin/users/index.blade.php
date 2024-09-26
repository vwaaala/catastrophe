@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Users</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>
        </div>

        <div class="card-body">
            @if ($users->isEmpty())
                <p>No users found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
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
