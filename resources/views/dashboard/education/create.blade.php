@extends('dashboard.layout')
@section('content')
    <form action="{{ route('education.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Universitas</label>
          <input type="text"
            class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Universitas"
            value="{{ Session::get('title') }}">
        </div>
        <div class="mb-3">
          <label for="info1" class="form-label">Nama Fakultas</label>
          <input type="text"
            class="form-control" name="info1" id="info1" aria-describedby="helpId" placeholder="Nama Fakultas"
            value="{{ Session::get('info1') }}">
        </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Nama Prodi</label>
            <input type="text"
              class="form-control" name="info2" id="info2" aria-describedby="helpId" placeholder="Nama Prodi"
              value="{{ Session::get('info2') }}">
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">IPK</label>
            <input type="text"
              class="form-control" name="info3" id="info3" aria-describedby="helpId" placeholder="IPK"
              value="{{ Session::get('info3') }}">
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
        <div class="d-flex justify-content-between">
            <a href="{{ route('education.index') }}" class="btn btn-secondary text-white">Back</a>
            <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
        </div>
    </form>
@endsection