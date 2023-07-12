@extends('dashboard.layout')
@section('content')
    <form action="{{ route('experience.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="title" class="form-label">Posisi</label>
          <input type="text"
            class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Posisi"
            value="{{ $data->title }}">
        </div>
        <div class="mb-3">
          <label for="info1" class="form-label">Nama Perusahaan</label>
          <input type="text"
            class="form-control" name="info1" id="info1" aria-describedby="helpId" placeholder="Nama Perusahaan"
            value="{{ $data->info1 }}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="start_date" placeholder="dd/mm/yyyy" value="{{ $data->start_date }}">
                </div>
                <div class="col-auto">Tanggal Selesai</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="end_date" placeholder="dd/mm/yyyy" value={{ $data->end_date }}>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control summernote" rows="5">{{ $data->content }}</textarea>    
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('experience.index') }}" class="btn btn-secondary text-white">Back</a>
            <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
        </div>
    </form>
@endsection