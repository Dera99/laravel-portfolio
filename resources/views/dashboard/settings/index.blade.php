@extends('dashboard.layout')
@section('content')
    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2">About</label>
            <div class="col-sm-4">
                <select class="form-control form-control-sm" name="_about" id="_about">
                    <option value="">-Select-</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->id }}" {{ get_meta_value('_about')==$item->id?'selected' : '' }}>{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Interest</label>
            <div class="col-sm-4">
                <select class="form-control form-control-sm" name="_interest" id="_interest">
                    <option value="">-Select-</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->id }}" {{ get_meta_value('_interest')==$item->id?'selected' : '' }}>{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Award</label>
            <div class="col-sm-4">
                <select class="form-control form-control-sm" name="_award" id="_award">
                    <option value="">-Select-</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->id }}" {{ get_meta_value('_award')==$item->id?'selected' : '' }}>{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
        </div>
    </form>
@endsection