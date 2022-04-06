<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kakel;
use App\Models\Anggota;
use App\Models\Sekwil;
use DB;

class KakelController extends Controller
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
    public function tampil_kakel()
    {
        $kakel = Kakel::get();

        return view('kakel.index', compact('kakel'));
    }

    public function tambah_kakel()
    {
        $anggota = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('kakel')
            ->whereRaw('kakel.id_anggota = anggota.id');
         })->get();

        $sekwil = Sekwil::get();

        return view('kakel.create', compact('anggota', 'sekwil'));
    }

    public function simpan_kakel(Request $request)
    {
        Kakel::create([
            'id_anggota' => $request->input('id_anggota'),
            'id_sekwil' => $request->input('id_sekwil'),
            'nomor_kk' => $request->input('nomor_kk')
        ]);

        return redirect()->route('kakel.index')->with('success', 'Data berhasil disimpan!');
    }

    public function hapus_kakel($id)
    {
        Kakel::find($id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

