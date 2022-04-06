<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelkat;
use App\Models\DetailPelkat;
use App\Models\Anggota;
use DB;
use Session;

class DetailPelkatController extends Controller
{
    public function tampil_detail_pelkat($id)
    {
        $pelkat = Pelkat::find($id);
        Session::put('halaman_url', request()->fullUrl());

        $det_pelkat = DetailPelkat::join('pelkat', 'pelkat.id', '=' , 'detail_pelkat.id_pelkat')
        ->join('anggota', 'anggota.id', '=' , 'detail_pelkat.id_anggota')
        ->where('id_pelkat', $id)
        ->get(['anggota.nama','detail_pelkat.id']);

        return view('detailpelkat.index', compact('pelkat','det_pelkat'));
    }

    public function tambah_anggota_pelkat($id)
    {
        $pelkat = Pelkat::find($id);

        $anggota = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('detail_pelkat')
            ->whereRaw('detail_pelkat.id_anggota = anggota.id');
         })->get();

        return view('detailpelkat.create', compact('pelkat','anggota'));
    }

    public function simpan_anggota(Request $request)
    {
        DetailPelkat::create([
            'id_pelkat' => $request->input('id_pelkat'),
            'id_anggota' => $request->input('id_anggota')
        ]);

        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success', 'Data berhasil disimpan!');
        }   
    }

    public function hapus_anggota($id)
    {
        DetailPelkat::find($id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
