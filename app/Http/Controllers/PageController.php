<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Page::orderBy('title', 'asc')->get();
        return view('dashboard.pages.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('content', $request->content);
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Title wajib diisi',
                'content.required' => 'Content wajib diisi'
            ]
        );
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        Page::create($data);
        return redirect()->route('pages.index')->with('success', 'Berhasil Menambahkan Halaman');
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
        $data = Page::where('id', $id)->first();
        return view('dashboard.pages.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Title wajib diisi',
                'content.required' => 'Content wajib diisi'
            ]
        );
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        Page::where('id', $id)->update($data);
        return redirect()->route('pages.index')->with('success', 'Update Halaman Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Page::where('id', $id)->delete();
        return redirect()->route('pages.index')->with('success', 'Halaman Berhasil Dihapus');
    }
}
