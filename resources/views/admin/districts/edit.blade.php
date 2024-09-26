@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Districts</div>

        <div class="card-body">
            <form action="{{ route('districts.update', $district->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $district->name) }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{ old('status', $district->status) == '1' ? 'selected' : '' }}>Active
                        </option>
                        <option value="0" {{ old('status', $district->status) == '0' ? 'selected' : '' }}>Inactive
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
