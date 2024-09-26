@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <h1>Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>
        </div>

        <div class="card-body">
            @if ($categories->isEmpty())
                <p>No categories found.</p>
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
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
