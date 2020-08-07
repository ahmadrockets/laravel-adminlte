<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaans = DB::table('pertanyaans')->get();
        return view('pertanyaans.index', compact('pertanyaans'));
    }
    public function create()
    {
        return view('pertanyaans.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|unique:pertanyaans|max:255',
            'isi' => 'required'
        ]);
        DB::table('pertanyaans')->insert([
            'judul' => $request['judul'],
            'isi' => $request['isi']
        ]);
        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil disimpan');
    }
    public function show($id)
    {
        $pertanyaan = DB::table('pertanyaans')->where('id',$id)->first();
        return view('pertanyaans.show', compact('pertanyaan'));
    }
    public function edit($id)
    {
        $pertanyaan = DB::table('pertanyaans')->where('id',$id)->first();
        return view('pertanyaans.edit', compact('pertanyaan'));
    }
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required'
        ]);
        $pertanyaan = DB::table('pertanyaans')->where('id',$id)->update([
            'judul' => $request['judul'],
            'isi' => $request['isi']
        ]);
        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil diupdate');
    }
    public function destroy($id)
    {
        $pertanyaan = DB::table('pertanyaans')->where('id',$id)->delete();
        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
