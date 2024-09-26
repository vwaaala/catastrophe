@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Reports</h1>
            <a href="{{ route('reports.create') }}" class="btn btn-primary mb-3">Add New Report</a>
        </div>

        <div class="card-body">
            @if ($reports->isEmpty())
                <p>No reports found.</p>
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
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->description }}</td>
                                <td>{{ $report->status ? 'Published' : 'Draft' }}</td>
                                <td>
                                    <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('reports.destroy', $report->id) }}" method="POST"
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
