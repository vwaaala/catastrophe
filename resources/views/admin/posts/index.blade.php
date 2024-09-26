@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Add New Post</a>
        </div>

        <div class="card-body">

            @if ($posts->isEmpty())
                <p>No posts found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ json_decode($post->title)->en }}</td>
                                <td>{{ json_decode($post->description)->en }}</td>
                                <td>{{ $post->status ? 'Published' : 'Draft' }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
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
