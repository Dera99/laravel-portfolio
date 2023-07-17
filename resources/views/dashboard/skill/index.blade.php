@extends('dashboard.layout')
@section('content')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="_language" class="form-label">Programming Language & Tools</label>
          <input type="text"
            class="form-control form-control-sm skill" name="_language" id="_language" aria-describedby="helpId" placeholder="Programming Language & Tools"
            value="{{ get_meta_value('_language') }}">
        </div>
        <div class="mb-3">
            <label for="_workflow" class="form-label">Workflow</label>
            <textarea name="_workflow" id="_workflow" class="form-control summernote" rows="5">{{ get_meta_value('_workflow') }}</textarea>    
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
        </div>
    </form>
@endsection