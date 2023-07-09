@extends('dashboard.layout')
@section('content')
    <div class="pb-3"><a href="{{ route('pages.index') }}" class="btn btn-secondary text-white">Back</a></div>
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
        <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
    </form>
@endsection