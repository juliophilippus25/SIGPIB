<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekwil;
use Alert;

class SekwilController extends Controller
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
    public function tampil_sekwil()
    {
        $sekwil = Sekwil::get();

        return view('sekwil.index', compact('sekwil'));
    }

    public function tambah_sekwil()
    {
        return view('sekwil.create');
    }

    public function simpan_sekwil(Request $request)
    {
        // Validasi Form
        $this->validate($request,
        // Aturan
        [
            'nama_sekwil' => 'required|min:3|unique:sekwil,nama_sekwil,',
        ],
        // Pesan
        [
            // Required
            'nama_sekwil.required' => 'Nama sektor wilayah wajib diisi!',

            // Min
            'nama_sekwil.min' => 'Nama sektor wilayah diisi minimal 3 karakter!',

            // Unique
            'nama_sekwil.unique' => 'Nama sektor wilayah sudah terdaftar!'

        ]);

        Sekwil::create([
            'nama_sekwil' => $request->input('nama_sekwil')
        ]);

        Alert::success('Data berhasil disimpan!', '');

        return redirect()->route('sekwil.index');
    }

    public function hapus_sekwil($id)
    {
        Sekwil::find($id)->delete();

        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }
}
