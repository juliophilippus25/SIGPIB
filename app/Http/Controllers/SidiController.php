<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sidi;
use App\Models\Anggota;
use DB;
use Alert;
use Validator;

class SidiController extends Controller
{
    public function tampil_sidi()
    {
        $sidi = Sidi::get();

        return view('anggota.sidi.index', compact('sidi'));
    }

    public function tampil_detail_sidi($id)
    {
        $sidi = Sidi::find($id);

        $det_sidi = Sidi::join('anggota', 'anggota.id', '=' , 'sidi.id_anggota')
        ->where('id_anggota', $id)
        ->get(['anggota.nama','anggota.gambar']);

        return view('anggota.sidi.show', compact('sidi','det_sidi'));
    }

    public function tambah_sidi(Request $request)
    {
        $anggota = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('sidi')
            ->whereRaw('sidi.id_anggota = anggota.id');
        })->get();

        return view('anggota.sidi.create', compact('anggota'));
    }

    public function simpan_sidi(Request $request)
    {
        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'id_anggota' => 'required',
            'tempat_sidi' => 'required|min:3',
            'tgl_sidi' => 'required|before_or_equal:today',
            'pendeta' => 'required|min:3',
        ],
        // Pesan
        [
            // Required
            'id_anggota.required' => 'Anggota jemaat wajib diisi!',
            'tempat_sidi.required' => 'Tempat sidi wajib diisi!',
            'tgl_sidi.required' => 'Tanggal sidi wajib diisi!',
            'pendeta.required' => 'Nama pendeta wajib diisi!',

            // Min
            'tempat_sidi.min' => 'Tempat sidi diisi minimal 3 karakter!',
            'pendeta.min' => 'Nama pendeta diisi minimal 3 karakter!',

            // Before or equal
            'tgl_sidi.before_or_equal' => 'Tanggal sidi tidak boleh lewat dari tanggal hari ini!'

        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }


        Sidi::create([
            'id_anggota' => $request->input('id_anggota'),
            'tempat_sidi' => $request->input('tempat_sidi'),
            'tgl_sidi' => $request->input('tgl_sidi'),
            'pendeta' => $request->input('pendeta')
        ]);

        // redirect dengan pesan success
        Alert::success('Data berhasil disimpan!', '');
        return redirect()->route('sidi.index');
    }

    public function tampil_ubah_sidi($id)
    {
        $sidi = Sidi::find($id);

        return view('anggota.sidi.edit', compact('sidi'));
    }

    public function perbarui_sidi(Request $request, $id)
    {
        $sidi = Sidi::find($id);

        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'tempat_sidi' => 'required|min:3',
            'tgl_sidi' => 'required|before_or_equal:today',
            'pendeta' => 'required|min:3',
        ],
        // Pesan
        [
            // Required
            'tempat_sidi.required' => 'Tempat sidi wajib diisi!',
            'tgl_sidi.required' => 'Tanggal sidi wajib diisi!',
            'pendeta.required' => 'Nama pendeta wajib diisi!',

            // Min
            'tempat_sidi.min' => 'Tempat sidi diisi minimal 3 karakter!',
            'pendeta.min' => 'Nama pendeta diisi minimal 3 karakter!',

            // Before or equal
            'tgl_sidi.before_or_equal' => 'Tanggal sidi tidak boleh lewat dari tanggal hari ini!'

        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sidi->tempat_sidi = $request->input('tempat_sidi');
        $sidi->tgl_sidi = $request->input('tgl_sidi');
        $sidi->pendeta = $request->input('pendeta');
        $sidi->update();

        // redirect dengan pesan success
        Alert::success('Data berhasil diubah!', '');
        return redirect()->route('sidi.tampil_detail', ['id' => $sidi->id]);
        // if(session('halaman_url')){
        //     return Redirect(session('halaman_url'));
        // }
    }

    public function hapus_sidi($id)
    {
        $sidi = Sidi::find($id);

        $sidi->delete();
        //redirect dengan pesan sukses
        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }
}
