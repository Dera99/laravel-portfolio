@extends('dashboard.layout')
@section('content')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3>Profile</h3>
                @if (get_meta_value('_photo'))
                    <img style="max-width:130px;max-height:130px;" class="mb-3 rounded-circle justify-content-center" src="{{ asset('images/photo') . '/' . get_meta_value('_photo') }}">
                @endif
                <div class="mb-3">
                    <label for="_photo" class="form-label">Photo</label>
                    <input type="file" class="form-control form-control-sm" name="_photo" id="_photo">
                </div>
                <div class="mb-3">
                    <label for="_kota" class="form-label">Kota</label>
                    <input type="text" class="form-control form-control-sm" name="_kota" id="_kota" placeholder="Kota" value="{{ get_meta_value('_kota') }}"> 
                </div>    
                <div class="mb-3">
                    <label for="_provinsi" class="form-label">Provinsi</label>
                    <input type="text" class="form-control form-control-sm" name="_provinsi" id="_provinsi" placeholder="Provinsi" value="{{ get_meta_value('_provinsi') }}"> 
                </div>  
                <div class="mb-3">
                    <label for="_nohp" class="form-label">Nomor Hp</label>
                    <input type="text" class="form-control form-control-sm" name="_nohp" id="_nohp" placeholder="Nomor Hp" value="{{ get_meta_value('_nohp') }}"> 
                </div>  
                <div class="mb-3">
                    <label for="_email" class="form-label">Email</label>
                    <input type="text" class="form-control form-control-sm" name="_email" id="_email" placeholder="Email" value="{{ get_meta_value('_email') }}"> 
                </div>              
            </div>
            <div class="col-5">
                <h3 class="mb-4">Social Media</h3>
                <div class="mb-3">
                    <label for="_facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control form-control-sm" name="_facebook" id="_facebook" placeholder="Facebook" value="{{ get_meta_value('_facebook') }}"> 
                </div>   
                <div class="mb-3">
                    <label for="_github" class="form-label">Github</label>
                    <input type="text" class="form-control form-control-sm" name="_github" id="_github" placeholder="Github" value="{{ get_meta_value('_github') }}"> 
                </div>
                <div class="mb-3">
                    <label for="_linkedin" class="form-label">LinkedIn</label>
                    <input type="text" class="form-control form-control-sm" name="_linkedin" id="_linkedin" placeholder="LinkedIn" value="{{ get_meta_value('_linkedin') }}"> 
                </div>           
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary text-white" name="submit" type="submit">Submit</button>
        </div>
    </form>
@endsection