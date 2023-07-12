<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = History::where('type', 'Experience')->orderBy('end_date', 'desc')->get();
        return view('dashboard.experience.index')->with('data', $data);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('info1', $request->info1);
        Session::flash('start_date', $request->start_date);
        Session::flash('end_date', $request->end_date);
        Session::flash('content', $request->content);
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'start_date' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Posisi wajib diisi',
                'info1.required' => 'Nama Perusahaan wajib diisi',
                'start_date.required' => 'Tanggal Mulai wajib diisi',
                'content.required' => 'Content wajib diisi'
            ]
        );

        $data = [
            'type' => 'Experience',
            'title' => $request->title,
            'info1' => $request->info1,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'content' => $request->content
        ];
        History::create($data);
        return redirect()->route('experience.index')->with('success', 'Berhasil Menambahkan Experience');
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $data = History::where('id', $id)->where('type', 'Experience')->first();
        return view('dashboard.experience.edit')->with('data', $data);
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
                'start_date' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Posisi wajib diisi',
                'info1.required' => 'Nama Perusahaan wajib diisi',
                'start_date.required' => 'Tanggal Mulai wajib diisi',
                'content.required' => 'Content wajib diisi'
            ]
        );

        $data = [
            'type' => 'Experience',
            'title' => $request->title,
            'info1' => $request->info1,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'content' => $request->content
        ];
        History::where('id', $id)->update($data);
        return redirect()->route('experience.index')->with('success', 'Update Experience Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        History::where('id', $id)->delete();
        return redirect()->route('experience.index')->with('success', 'Experience Berhasil Dihapus');
    }
}
