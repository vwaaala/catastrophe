@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Report</div>

        <div class="card-body">
            <form action="{{ route('reports.update', $report->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $report->title) }}" required>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $report->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="0" {{ old('status', $report->status) == '0' ? 'selected' : '' }}>Draft</option>
                        <option value="1" {{ old('status', $report->status) == '1' ? 'selected' : '' }}>Published
                        </option>
                    </select>
                    @if ($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
@endsection
