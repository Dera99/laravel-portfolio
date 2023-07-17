<?php

namespace App\Http\Controllers;

use App\Models\Metadata;
use Illuminate\Http\Request;
use App\Models\Page;

class SettingController extends Controller
{
    public function index()
    {
        $data = page::orderBy('title', 'asc')->get();
        return view('dashboard.settings.index')->with('data', $data);
    }

    public function update(Request $request)
    {
        Metadata::updateOrCreate(['meta_key' => '_about'], ['meta_value' => $request->_about]);
        Metadata::updateOrCreate(['meta_key' => '_interest'], ['meta_value' => $request->_interest]);
        Metadata::updateOrCreate(['meta_key' => '_award'], ['meta_value' => $request->_award]);
        return redirect()->route('settings.index')->with('success', 'Update pengaturan halaman berhasil');
    }
}
