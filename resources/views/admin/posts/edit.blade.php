@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Post</div>

        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="title_en">Title</label>
                    <input type="text" class="form-control" id="title" name="title_en"
                        value="{{ old('title_en', json_decode($post->title)->en) }}" required>
                    @if ($errors->has('title_en'))
                        <span class="text-danger">{{ $errors->first('title_en') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="title_fr">Title French</label>
                    <input type="text" class="form-control" id="title_fr" name="title_fr"
                        value="{{ old('title_fr', json_decode($post->title)->fr) }}" required>
                    @if ($errors->has('title_fr'))
                        <span class="text-danger">{{ $errors->first('title_fr') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="description_en">Description</label>
                    <textarea class="form-control" id="description" name="description_en" rows="3" required>{{ old('description_en', json_decode($post->description)->en) }}</textarea>
                    @if ($errors->has('description_en'))
                        <span class="text-danger">{{ $errors->first('description_en') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="description_fr">Description</label>
                    <textarea class="form-control" id="description" name="description_fr" rows="3" required>{{ old('description_fr', json_decode($post->description)->fr) }}</textarea>
                    @if ($errors->has('description_fr'))
                        <span class="text-danger">{{ $errors->first('description_fr') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="0" {{ old('status', $post->status) == '0' ? 'selected' : '' }}>Draft</option>
                        <option value="1" {{ old('status', $post->status) == '1' ? 'selected' : '' }}>Published
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
