@extends('dashboard.layout')
@section('content')
    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text"
            class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Title"
            value="{{ Session::get('title') }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control summernote" rows="5">{{ Session::get('content') }}</textarea>    
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('pages.index') }}" class="btn btn-secondary text-white">Back</a>
            <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
        </div>
    </form>
@endsection