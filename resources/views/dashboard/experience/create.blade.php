@extends('dashboard.layout')
@section('content')
    <div class="pb-3"><a href="{{ route('experience.index') }}" class="btn btn-secondary text-white">Back</a></div>
    <form action="{{ route('experience.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Posisi</label>
          <input type="text"
            class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Posisi"
            value="{{ Session::get('title') }}">
        </div>
        <div class="mb-3">
          <label for="info1" class="form-label">Nama Perusahaan</label>
          <input type="text"
            class="form-control" name="info1" id="info1" aria-describedby="helpId" placeholder="Nama Perusahaan"
            value="{{ Session::get('info1') }}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="start_date" placeholder="dd/mm/yyyy" value="{{ Session::get('start_date') }}">
                </div>
                <div class="col-auto">Tanggal Selesai</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="end_date" placeholder="dd/mm/yyyy" value={{ Session::get('end_date') }}>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control summernote" rows="5">{{ Session::get('content') }}</textarea>    
        </div>
        <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
    </form>
@endsection