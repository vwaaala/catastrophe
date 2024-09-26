@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-heaader">Edit Setting</div>

        <div class="card-body">
            <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="key">Key</label>
                    <input type="text" class="form-control" id="key" name="key"
                        value="{{ old('key', $setting->key) }}" required>
                    @if ($errors->has('key'))
                        <span class="text-danger">{{ $errors->first('key') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="value">Value</label>
                    <input type="text" class="form-control" id="value" name="value"
                        value="{{ old('value', $setting->value) }}" required>
                    @if ($errors->has('value'))
                        <span class="text-danger">{{ $errors->first('value') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
@endsection
