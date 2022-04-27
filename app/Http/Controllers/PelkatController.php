<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelkat;
use App\Models\DetailPelkat;
use Alert;
use Validator;
use Carbon\Carbon;
use PDF;

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
        $validator = Validator::make($request->all(),
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

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Pelkat::create([
            'nama_pelkat' => $request->input('nama_pelkat')
        ]);

        // redirect dengan pesan sukses
        Alert::success('Data berhasil disimpan!', '');
        return redirect()->route('pelkat.index');
    }

    public function tampil_ubah_pelkat($id)
    {
        $pelkat = Pelkat::find($id);

        return view('pelkat.edit', compact('pelkat'));
    }

    public function perbarui_pelkat(Request $request, $id)
    {
        $pelkat = Pelkat::find($id);

        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'nama_pelkat' => 'required|min:3|unique:pelkat,nama_pelkat,'.$pelkat->id,
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

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil diubah!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pelkat->nama_pelkat = $request->input('nama_pelkat');

        $pelkat->update();

        // redirect dengan pesan error
        Alert::success('Data berhasil diubah!', '');

        return redirect()->route('pelkat.index');
    }

    public function hapus_pelkat($id)
    {
        Pelkat::find($id)->delete();

        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }

    public function cetak_satu_pdf($id)
    {
        $pelkat = Pelkat::find($id);

        $det_pelkat = DetailPelkat::join('pelkat', 'pelkat.id', '=' , 'detail_pelkat.id_pelkat')
        ->join('anggota', 'anggota.id', '=' , 'detail_pelkat.id_anggota')
        ->where('id_pelkat', $id)
        ->get(['anggota.nama','anggota.alamat','anggota.no_hp','detail_pelkat.id', 'detail_pelkat.pengurus']);

        $dt = Carbon::now();

        $pdf = PDF::loadView('laporan.pelkat.satu_pelkat', compact('pelkat', 'det_pelkat', 'dt'));
        return $pdf->stream('SIGPIB_'.$pelkat->nama_pelkat.('_').$dt->format('d_M_Y').'.pdf');
    }
}
