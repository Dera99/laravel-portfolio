<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = History::where('type', 'Education')->orderBy('end_date', 'desc')->get();
        return view('dashboard.education.index')->with('data', $data);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('start_date', $request->start_date);
        Session::flash('end_date', $request->end_date);
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'info2' => 'required',
                'start_date' => 'required',
            ],
            [
                'title.required' => 'Universitas wajib diisi',
                'info1.required' => 'Fakultas wajib diisi',
                'info2.required' => 'Prodi wajib diisi',
                'start_date.required' => 'Tanggal Mulai wajib diisi',
            ]
        );

        $data = [
            'type' => 'Education',
            'title' => $request->title,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];
        History::create($data);
        return redirect()->route('education.index')->with('success', 'Berhasil Menambahkan Education');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $data = History::where('id', $id)->where('type', 'Education')->first();
        return view('dashboard.education.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'info2' => 'required',
                'start_date' => 'required',
            ],
            [
                'title.required' => 'Universitas wajib diisi',
                'info1.required' => 'Fakultas wajib diisi',
                'info2.required' => 'Prodi wajib diisi',
                'start_date.required' => 'Tanggal Mulai wajib diisi',
            ]
        );
        $data = [
            'type' => 'Education',
            'title' => $request->title,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];
        History::where('id', $id)->update($data);
        return redirect()->route('education.index')->with('success', 'Update Education Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        History::where('id', $id)->delete();
        return redirect()->route('education.index')->with('success', 'Education Berhasil Dihapus');
    }
}
