<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    function index() {
        $pertanyaan = DB::table('pertanyaan')->get();
        return view('pertanyaan.index', compact('pertanyaan'));
    }

    function create() {
        return view('pertanyaan.create');
    }

    function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $query = DB::table('pertanyaan')->insert(
            [
                'judul' => $request['judul'],
                'isi' => $request['isi'],
            ]
        );

        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil terkirim');
    }

    function show($pertanyaan_id) {
        $pertanyaan = DB::table('pertanyaan')->where('id', $pertanyaan_id)->first();
        return view('pertanyaan.show', compact('pertanyaan'));
    }

    function edit($pertanyaan_id) {
        $pertanyaan = DB::table('pertanyaan')->where('id', $pertanyaan_id)->first();
        return view('pertanyaan.edit', compact('pertanyaan'));
    }

    function update($pertanyaan_id, Request $request) {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);
        $query = DB::table('pertanyaan')
        ->where('id', $pertanyaan_id)
        ->update([
            'judul' => $request['judul'],
            'isi' => $request['isi'],
        ]);

        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil diubah');
    }

    function destroy($pertanyaan_id) {
        $query = DB::table('pertanyaan')->where('id', $pertanyaan_id)->delete();

        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil dihapus');
    }
}