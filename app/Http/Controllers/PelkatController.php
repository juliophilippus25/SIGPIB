<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelkat;
use Alert;

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
            'nama_pelkat' => 'required|min:3|unique:pelkat,nama_pelkat,',
        ],
        // Pesan
        [
            // Required
            'nama_pelkat.required' => 'Nama pelayanan kategorial wajib diisi!',

            // Min
            'nama_pelkat.min' => 'Nama pelayanan kategorial diisi minimal 3 karakter!',

            // Unique
            'nama_pelkat.unique' => 'Nama pelayanan kategorial sudah terdaftar!'

        ]);

        Pelkat::create([
            'nama_pelkat' => $request->input('nama_pelkat')
        ]);

        Alert::success('Data berhasil disimpan!', '');

        return redirect()->route('pelkat.index');
    }

    public function hapus_pelkat($id)
    {
        Pelkat::find($id)->delete();

        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }
}
