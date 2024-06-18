<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekwil;
use App\Models\Kakel;
use Alert;
use Validator;
use DB;

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
        $sek1 = Kakel::where('id_sekwil', '1')->count();
        $sek2 = Kakel::where('id_sekwil', '2')->count();
        $sek3 = Kakel::where('id_sekwil', '3')->count();

        return view('sekwil.index', compact('sekwil', 'sek1', 'sek2', 'sek3'));
    }

    public function tambah_sekwil()
    {
        return view('sekwil.create');
    }

    public function simpan_sekwil(Request $request)
    {
        // Validasi Form
        $validator = Validator::make(
            $request->all(),
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

            ]
        );

        // Memberikan pesan error ketika terdapat validasi yang salah
        if ($validator->fails()) {
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

    public function tampil_ubah_sekwil($id)
    {
        $sekwil = Sekwil::find($id);

        return view('sekwil.edit', compact('sekwil'));
    }

    public function perbarui_sekwil(Request $request, $id)
    {
        $sekwil = Sekwil::find($id);

        // Validasi Form
        $validator = Validator::make(
            $request->all(),
            // Aturan
            [
                'nama_sekwil' => 'required|min:3|unique:sekwil,nama_sekwil,' . $sekwil->id,
            ],
            // Pesan
            [
                // Required
                'nama_sekwil.required' => 'Nama sektor wilayah wajib diisi!',

                // Min
                'nama_sekwil.min' => 'Nama sektor wilayah diisi minimal 3 karakter!',

                // Unique
                'nama_sekwil.unique' => 'Nama sektor wilayah sudah terdaftar!'

            ]
        );

        // Memberikan pesan error ketika terdapat validasi yang salah
        if ($validator->fails()) {
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil diubah!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sekwil->nama_sekwil = $request->input('nama_sekwil');

        $sekwil->update();

        // redirect dengan pesan error
        Alert::success('Data berhasil diubah!', '');

        return redirect()->route('sekwil.index');
    }

    public function hapus_sekwil($id)
    {
        Sekwil::find($id)->delete();

        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }
}
