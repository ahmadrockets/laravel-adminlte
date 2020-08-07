<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class JawabanController extends Controller
{
    public function index()
    {
        $jawabans    = DB::table('jawabans')
                    ->select('jawabans.*', 'pertanyaans.judul AS pertanyaan')            
                    ->join('pertanyaans', 'jawabans.pertanyaan_id', '=', 'pertanyaans.id')
                    ->get();
        return view('jawabans.index', compact('jawabans'));
    }
    public function create()
    {
        $pertanyaans = DB::table('pertanyaans')->get();
        return view('jawabans.create', compact('pertanyaans'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pertanyaan_id' => 'required',
            'isi' => 'required|unique:jawabans|max:255'
        ]);
        DB::table('jawabans')->insert([
            'pertanyaan_id' => $request['pertanyaan_id'],
            'isi' => $request['isi']
        ]);
        return redirect('/jawaban')->with('success', 'Pertanyaan berhasil disimpan');
    }
    public function show($id)
    {
        $jawaban = DB::table('jawabans')->where('jawabans.id',$id)
                    ->select('jawabans.*', 'pertanyaans.judul AS pertanyaan')            
                    ->join('pertanyaans', 'jawabans.pertanyaan_id', '=', 'pertanyaans.id')
                    ->first();
        return view('jawabans.show', compact('jawaban'));
    }
    public function edit($id)
    {
        $pertanyaans = DB::table('pertanyaans')->get();
        $jawaban     = DB::table('jawabans')->where('id',$id)->first();
        return view('jawabans.edit', compact('jawaban','pertanyaans'));
    }
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'pertanyaan_id' => 'required',
            'isi' => 'required|max:255'
        ]);
        $pertanyaan = DB::table('jawabans')->where('id',$id)->update([
            'pertanyaan_id' => $request['pertanyaan_id'],
            'isi' => $request['isi']
        ]);
        return redirect('/jawaban')->with('success', 'Jawaban berhasil diupdate');
    }
    public function destroy($id)
    {
        $pertanyaan = DB::table('jawabans')->where('id',$id)->delete();
        return redirect('/jawaban')->with('success', 'Jawaban berhasil dihapus');
    }
}
