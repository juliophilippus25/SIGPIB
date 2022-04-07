<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelkat;

class PelkatController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tampil_pelkat()
    {
        $pelkat = Pelkat::get();

        return view('pelkat.index', compact('pelkat'));
    }

    public function tambah_pelkat()
    {
        return view('pelkat.create');
    }

    public function simpan_pelkat(Request $request)
    {
        // Validasi Form
        $this->validate($request,
        // Aturan
        [
            'nama_pelkat' => 'required',
        ],
        // Pesan
        [
            // Required
            'nama_pelkat.required' => 'Nama pelayanan kategorial wajib diisi!'

        ]);

        Pelkat::create([
            'nama_pelkat' => $request->input('nama_pelkat')
        ]);

        return redirect()->route('pelkat.index')->with('success', 'Data berhasil disimpan!');
    }

    public function hapus_pelkat($id)
    {
        Pelkat::find($id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
