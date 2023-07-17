<?php

namespace App\Http\Controllers;

use App\Models\Metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            '_photo' => 'mimes:jpeg,jpg,png',
            '_email' => 'required|email',
        ], [
            '_photo.mimes' => 'Format tidak sesuai, mohon gunakan format photo (jpeg/jpg/png).',
            '_email.required' => 'Email wajib di isi.',
            '_email.email' => 'Format email tidak valid.'
        ]);

        if ($request->hasFile('_photo')) {
            $file = $request->file('_photo');
            $fileExtension = $file->extension();
            $fileName = date('ymdhis') . ".$fileExtension";
            $file->move(public_path('images/photo'), $fileName);
            $oldFile = get_meta_value('_photo');
            File::delete(public_path('images/photo') . "/" . $oldFile);
            Metadata::updateOrCreate(['meta_key' => '_photo'], ['meta_value' => $fileName]);
        }
        Metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
        Metadata::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
        Metadata::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
        Metadata::updateOrCreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);
        Metadata::updateOrCreate(['meta_key' => '_facebook'], ['meta_value' => $request->_facebook]);
        Metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);
        Metadata::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->_linkedin]);

        return redirect()->route('profile.index')->with('success', 'Update data profile berhasil');
    }
}
