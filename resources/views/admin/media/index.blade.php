@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Settings</h1>
        <a href="{{ route('settings.create') }}" class="btn btn-primary mb-3">Add New Setting</a>

        @if ($settings->isEmpty())
            <p>No settings found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $setting)
                        <tr>
                            <td>{{ $setting->key }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>
                                <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('settings.destroy', $setting->id) }}" method="POST" class="d-inline">
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
@endsection
