@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add New Setting</div>

        <div class="card-body">
            <form action="{{ route('settings.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="key">Key</label>
                    <input type="text" class="form-control" id="key" name="key" value="{{ old('key') }}"
                        required>
                    @if ($errors->has('key'))
                        <span class="text-danger">{{ $errors->first('key') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="value">Value</label>
                    <input type="text" class="form-control" id="value" name="value" value="{{ old('value') }}"
                        required>
                    @if ($errors->has('value'))
                        <span class="text-danger">{{ $errors->first('value') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>
@endsection
