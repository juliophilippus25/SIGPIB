<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekwil;

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
        Sekwil::create([
            'nama_sekwil' => $request->input('nama_sekwil')
        ]);

        return redirect()->route('sekwil.index')->with('success', 'Data berhasil disimpan!');
    }

    public function hapus_sekwil($id)
    {
        Sekwil::find($id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
