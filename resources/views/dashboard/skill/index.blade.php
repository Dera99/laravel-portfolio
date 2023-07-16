@extends('dashboard.layout')
@section('content')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="language" class="form-label">Programming Language & Tools</label>
          <input type="text"
            class="form-control form-control-sm skill" name="language" id="language" aria-describedby="helpId" placeholder="Programming Language & Tools"
            value="{{ get_meta_value('language') }}">
        </div>
        <div class="mb-3">
            <label for="workflow" class="form-label">Workflow</label>
            <textarea name="workflow" id="workflow" class="form-control summernote" rows="5">{{ get_meta_value('workflow') }}</textarea>    
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
        </div>
    </form>
@endsection