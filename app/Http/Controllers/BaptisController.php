<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baptis;
use App\Models\Anggota;
use DB;
use Alert;
use Validator;

class BaptisController extends Controller
{
    public function tampil_baptis()
    {
        $baptis = Baptis::get();

        return view('anggota.baptis.index', compact('baptis'));
    }

    public function tampil_detail_baptis($id)
    {
        $baptis = Baptis::find($id);

        $det_baptis = Baptis::join('anggota', 'anggota.id', '=' , 'baptis.id_anggota')
        ->where('id_anggota', $id)
        ->get(['anggota.nama','anggota.gambar']);

        return view('anggota.baptis.show', compact('baptis','det_baptis'));
    }

    public function tambah_baptis(Request $request)
    {
        $anggota = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('baptis')
            ->whereRaw('baptis.id_anggota = anggota.id');
        })->get();

        return view('anggota.baptis.create', compact('anggota'));
    }

    public function simpan_baptis(Request $request)
    {
        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'id_anggota' => 'required',
            'tempat_baptis' => 'required|min:3',
            'tgl_baptis' => 'required|before_or_equal:today',
            'pendeta' => 'required|min:3',
        ],
        // Pesan
        [
            // Required
            'id_anggota.required' => 'Anggota jemaat wajib diisi!',
            'tempat_baptis.required' => 'Tempat baptis wajib diisi!',
            'tgl_baptis.required' => 'Tanggal baptis wajib diisi!',
            'pendeta.required' => 'Nama pendeta wajib diisi!',

            // Min
            'tempat_baptis.min' => 'Tempat baptis diisi minimal 3 karakter!',
            'pendeta.min' => 'Nama pendeta diisi minimal 3 karakter!',

            // Before or equal
            'tgl_baptis.before_or_equal' => 'Tanggal baptis tidak boleh lewat dari tanggal hari ini!'

        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }


        Baptis::create([
            'id_anggota' => $request->input('id_anggota'),
            'tempat_baptis' => $request->input('tempat_baptis'),
            'tgl_baptis' => $request->input('tgl_baptis'),
            'pendeta' => $request->input('pendeta')
        ]);

        // redirect dengan pesan success
        Alert::success('Data berhasil disimpan!', '');
        return redirect()->route('baptis.index');
    }

    public function tampil_ubah_baptis($id)
    {
        $baptis = Baptis::find($id);

        return view('anggota.baptis.edit', compact('baptis'));
    }

    public function perbarui_baptis(Request $request, $id)
    {
        $baptis = Baptis::find($id);

        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'tempat_baptis' => 'required|min:3',
            'tgl_baptis' => 'required|before_or_equal:today',
            'pendeta' => 'required|min:3',
        ],
        // Pesan
        [
            // Required
            'tempat_baptis.required' => 'Tempat baptis wajib diisi!',
            'tgl_baptis.required' => 'Tanggal baptis wajib diisi!',
            'pendeta.required' => 'Nama pendeta wajib diisi!',

            // Min
            'tempat_baptis.min' => 'Tempat baptis diisi minimal 3 karakter!',
            'pendeta.min' => 'Nama pendeta diisi minimal 3 karakter!',

            // Before or equal
            'tgl_baptis.before_or_equal' => 'Tanggal baptis tidak boleh lewat dari tanggal hari ini!'

        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $baptis->tempat_baptis = $request->input('tempat_baptis');
        $baptis->tgl_baptis = $request->input('tgl_baptis');
        $baptis->pendeta = $request->input('pendeta');
        $baptis->update();

        // redirect dengan pesan success
        Alert::success('Data berhasil diubah!', '');
        return redirect()->route('baptis.tampil_detail', ['id' => $baptis->id]);
        // if(session('halaman_url')){
        //     return Redirect(session('halaman_url'));
        // }
    }

    public function hapus_baptis($id)
    {
        $baptis = Baptis::find($id);

        $baptis->delete();
        //redirect dengan pesan sukses
        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }
}
