@extends('dashboard.layout')
@section('content')
    <form action="{{ route('pages.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text"
            class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Title"
            value="{{ $data->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control summernote" rows="5">{{ $data->content }}</textarea>    
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('pages.index') }}" class="btn btn-secondary text-white">Back</a>
            <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
        </div>
    </form>
@endsection