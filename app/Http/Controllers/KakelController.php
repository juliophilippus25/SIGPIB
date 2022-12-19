<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kakel;
use App\Models\Anggota;
use App\Models\Sekwil;
use App\Models\DetailKakel;
use DB;
use Alert;
use Validator;
use Carbon\Carbon;
use PDF;
use File;

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
        $kakel = Kakel::orderBy('created_at', 'desc')->get();

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
        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'id_anggota' => 'required',
            'id_sekwil' => 'required',
            'tempat_nikah' => 'required|min:3',
            'tgl_nikah' => 'required',
            'srt_nikah_grja' => 'max:2048',
            'srt_nikah_sipil' => 'max:2048'
        ],
        // Pesan
        [
            // Required
            'id_anggota.required' => 'Kepala keluarga wajib diisi!',
            'id_sekwil.required' => 'Sektor wilayah wajib diisi!',
            'nomor_kk.required' => 'Nomor kartu keluarga wajib diisi!',
            'tempat_nikah.required' => 'Tempat nikah wajib diisi!',
            'tgl_nikah.required' => 'Tanggal nikah wajib diisi!',

            // Min
            'nomor_kk.min' => 'Nomor kartu keluarga diisi minimal 3 karakter!',

            // Ukuran file
            'srt_nikah_grja.max' => 'Ukuran maksimal file surat nikah gereja adalah 2mb',
            'srt_nikah_sipil.max' => 'Ukuran maksimal file surat nikah sipil adalah 2mb'

        ]);

        $tgl_skrg = Carbon::now(); // Tanggal sekarang

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Validasi nilai tanggal lahir tidak boleh lebih dari tanggal sekarang
        elseif(strtotime($request->tgl_nikah) > strtotime($tgl_skrg)) {
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();;
        }

        // Proses upload surat nikah gereja
        if($request->file('srt_gereja') == '') {
            $srt_gereja = NULL;
        } else {
            $nama_file_dikonversi = $request->srt_gereja->getClientOriginalName();
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->srt_gereja->getClientOriginalExtension();
            $simpan_nama_file = 'NIKAH_GEREJA_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $srt_gereja = $request->file('srt_gereja')->storeAs('dokumen/nikahgereja', $simpan_nama_file);
            $srt_gereja = $simpan_nama_file;
        }

        // Proses upload surat nikah sipil
        if($request->file('srt_sipil') == '') {
            $srt_sipil = NULL;
        } else {
            $nama_file_dikonversi = $request->srt_sipil->getClientOriginalName();
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->srt_sipil->getClientOriginalExtension();
            $simpan_nama_file = 'NIKAH_SIPIL_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $srt_sipil = $request->file('srt_sipil')->storeAs('dokumen/nikahsipil', $simpan_nama_file);
            $srt_sipil = $simpan_nama_file;
        }

        Kakel::create([
            'id_anggota' => $request->input('id_anggota'),
            'id_sekwil' => $request->input('id_sekwil'),
            'tempat_nikah' => $request->input('tempat_nikah'),
            'tgl_nikah' => $request->input('tgl_nikah'),
            'srt_gereja' => $srt_gereja,
            'srt_sipil' => $srt_sipil
        ]);

        // redirect dengan pesan success
        Alert::success('Data berhasil disimpan!', '');

        return redirect()->route('kakel.index');
    }

    public function tampil_ubah_kakel($id)
    {
        $kakel = Kakel::find($id);
        $sekwil = Sekwil::get();

        return view('kakel.edit', compact('kakel', 'sekwil'));
    }

    public function perbarui_kakel(Request $request, $id)
    {
        $kakel = Kakel::find($id);

        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'id_sekwil' => 'required',
            'nomor_kk' => 'required|min:3|unique:kakel,nomor_kk,'.$kakel->id,
        ],
        // Pesan
        [
            // Required
            'id_sekwil.required' => 'Sektor wilayah wajib diisi!',
            'nomor_kk.required' => 'Nomor kartu keluarga wajib diisi!',

            // Min
            'nomor_kk.min' => 'Nomor kartu keluarga diisi minimal 3 karakter!',

            // Unique
            'nomor_kk.unique' => 'Nomor kartu keluarga sudah terdaftar!'

        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil diubah!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kakel->id_sekwil = $request->input('id_sekwil');
        $kakel->nomor_kk = $request->input('nomor_kk');

        $kakel->update();

        // redirect dengan pesan success
        Alert::success('Data berhasil diubah!', '');

        return redirect()->route('kakel.index');
    }

    public function hapus_kakel($id)
    {
        $kakel = Kakel::find($id);

        $srt_nikah_grja = 'storage/dokumen/nikahgereja/'. $kakel->srt_nikah_grja;
        $srt_nikah_sipil = 'storage/dokumen/nikahsipil/'. $kakel->srt_nikah_sipil;

        if(File::exists($srt_nikah_grja, $srt_nikah_sipil))
        {
            File::delete($srt_nikah_grja, $srt_nikah_sipil);
        }

        $kakel->delete();
        //redirect dengan pesan sukses
        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }

    public function cetak_satu_pdf($id)
    {
        $kakel = Kakel::find($id);

        $det_kakel = DetailKakel::join('kakel', 'kakel.id', '=' , 'detail_kakel.id_kakel')
        ->join('anggota', 'anggota.id', '=' , 'detail_kakel.id_anggota')
        ->where('id_kakel', $id)
        ->get(['anggota.nama','detail_kakel.id', 'detail_kakel.sts_keluarga']);

        $dt = Carbon::now();

        $pdf = PDF::loadView('laporan.kakel.satu_kakel', compact('kakel', 'det_kakel', 'dt'));
        return $pdf->stream('SIGPIB_KK_'.$kakel->anggota->nama.('_').$dt->format('d_M_Y').'.pdf');
    }

    public function cetakPDF(Request $request)
    {
        $kakel = Kakel::orderBy('id_sekwil', 'asc')->get();
        $dt = Carbon::now();

        $pdf = PDF::loadView('laporan.kakel.kakelPDF', compact('kakel', 'dt'));
        return $pdf->stream('SIGPIB_KK_'.$dt->format('d_M_Y').'.pdf');

    }

    public function cetak_sekwil1_PDF(Request $request)
    {
        $kakel= Kakel::where('id_sekwil', '1')->get();
        $dt = Carbon::now();

        $pdf = PDF::loadView('laporan.kakel.kakel_sekwil1', compact('kakel', 'dt'));
        return $pdf->stream('SIGPIB_KK_'.$dt->format('d_M_Y').'.pdf');

    }

    public function cetak_sekwil2_PDF(Request $request)
    {
        $kakel= Kakel::where('id_sekwil', '2')->get();
        $dt = Carbon::now();

        $pdf = PDF::loadView('laporan.kakel.kakel_sekwil2', compact('kakel', 'dt'));
        return $pdf->stream('SIGPIB_KK_'.$dt->format('d_M_Y').'.pdf');

    }
}

