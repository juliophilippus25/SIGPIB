<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekwil;
use Alert;
use Validator;

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
        $validator = Validator::make($request->all(),
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

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Sekwil::create([
            'nama_sekwil' => $request->input('nama_sekwil')
        ]);

        // redirect dengan pesan sukses
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
