<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use File;
use Carbon\Carbon;
use Alert;
use Session;
use Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class AnggotaController extends Controller
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
    public function tampil_anggota()
    {
        $anggota = Anggota::orderBy('updated_at', 'desc')->get();

        return view('anggota.index', compact('anggota'));
    }

    public function tambah_anggota()
    {
        // Membuat kode anggota secara otomatis
        $getRow = Anggota::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "GPIB00001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                $kode = "GPIB0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                $kode = "GPIB000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                $kode = "GPIB00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                $kode = "GPIB0".''.($lastId->id + 1);
            } else {
                $kode = "GPIB".''.($lastId->id + 1);
            }
        }

        $anggota = Anggota::get();

        return view('anggota.create', compact('kode', 'anggota'));
    }

    public function simpan_anggota(Request $request)
    {
        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'nama' => 'required|min:3|unique:anggota,nama',
            'jk' => 'required',
            'tempat_lahir' => 'required|min:3',
            'tgl_lahir' => 'required|before_or_equal:today',
            'no_hp' => 'required|min:10|numeric',
            'pekerjaan' => 'required|min:3',
            'sts_keluarga' => 'required',
            'alamat' => 'required|min:3',
            'kabupaten' => 'required|min:3',
            'kelurahan' => 'required|min:3',
            'provinsi' => 'required|min:3',
            'kecamatan' => 'required|min:3',
            'goldar' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:2048',
            'srt_baptis' => 'max:2048',
            'srt_sidi' => 'max:2048',
            'akte_lahir' => 'max:2048'
        ],
        // Pesan
        [
            // Unique
            'nama.unique' => 'Nama sudah terdaftar!',

            // Required
            'nama.required' => 'Nama lengkap wajib diisi!',
            'jk.required' => 'Jenis kelamin wajib diisi!',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi!',
            'no_hp.required' => 'Nomor handphone wajib diisi!',
            'pekerjaan.required' => 'Pekerjaan wajib diisi!',
            'sts_keluarga.required' => 'Status keluarga wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'kabupaten.required' => 'Kota atau kabupaten wajib diisi!',
            'kelurahan.required' => 'Kelurahan atau desa wajib diisi!',
            'provinsi.required' => 'Provinsi wajib diisi!',
            'kecamatan.required' => 'Kecamatan wajib diisi!',
            'goldar.required' => 'Golongan darah wajib diisi!',

            // Min
            'nama.min' => 'Nama lengkap diisi minimal 3 karakter!',
            'tempat_lahir.min' => 'Tempat lahir diisi minimal 3 karakter!',
            'no_hp.min' => 'Nomor handphone diisi minimal 10 karakter!',
            'pekerjaan.min' => 'Pekerjaan diisi minimal 3 karakter!',
            'alamat.min' => 'Alamat diisi minimal 3 karakter!',
            'provinsi.min' => 'Provinsi diisi minimal 3 karakter!',
            'kabupaten.min' => 'Kabupaten diisi minimal 3 karakter!',
            'kecamatan.min' => 'Kecamatan diisi minimal 3 karakter!',
            'kelurahan.min' => 'Kelurahan diisi minimal 3 karakter!',

            // Before or equal
            'tgl_lahir.before_or_equal' => 'Tanggal lahir tidak boleh lewat dari tanggal hari ini!',

            // Numeric
            'no_hp.numeric' => 'Nomor handphone wajib angka!',

            // Tipe File
            'gambar.mimes' => 'Tipe file yang dapat di unggah adalah jpg/jpeg/png',

            // Ukuran file
            'gambar.max' => 'Ukuran maksimal file gambar adalah 2mb',
            'srt_baptis.max' => 'Ukuran maksimal file surat baptis adalah 2mb',
            'srt_sidi.max' => 'Ukuran maksimal file surat sidi adalah 2mb',
            'akte_lahir.max' => 'Ukuran maksimal file akte kelahiran adalah 2mb'

        ]);

        // $tgl_skrg = Carbon::now(); // Tanggal sekarang

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Validasi nilai tanggal lahir tidak boleh lebih dari tanggal sekarang
        // elseif(strtotime($request->tgl_lahir) > strtotime($tgl_skrg)) {
        //     Alert::error('Data tidak berhasil disimpan!', '');
        //     return redirect()->back()->withErrors($validator)->withInput();;
        // }


        // Proses upload gambar
        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $nama_file_dikonversi = $request->kode_anggota;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->gambar->getClientOriginalExtension();
            $simpan_nama_file = 'FOTO_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $gambar = $request->file('gambar')->storeAs('images/anggota', $simpan_nama_file);
            $gambar = $simpan_nama_file;
        }

        // Proses upload surat baptis
        if($request->file('srt_baptis') == '') {
            $srt_baptis = NULL;
        } else {
            $nama_file_dikonversi = $request->kode_anggota;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->srt_baptis->getClientOriginalExtension();
            $simpan_nama_file = 'BAPTIS_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $srt_baptis = $request->file('srt_baptis')->storeAs('dokumen/baptis', $simpan_nama_file);
            $srt_baptis = $simpan_nama_file;
        }

        // Proses upload surat sidi
        if($request->file('srt_sidi') == '') {
            $srt_sidi = NULL;
        } else {
            $nama_file_dikonversi = $request->kode_anggota;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->srt_sidi->getClientOriginalExtension();
            $simpan_nama_file = 'SIDI_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $srt_sidi = $request->file('srt_sidi')->storeAs('dokumen/sidi', $simpan_nama_file);
            $srt_sidi = $simpan_nama_file;
        }

        // Proses upload akte_lahir
        if($request->file('akte_lahir') == '') {
            $akte_lahir = NULL;
        } else {
            $nama_file_dikonversi = $request->kode_anggota;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->akte_lahir->getClientOriginalExtension();
            $simpan_nama_file = 'AKTE_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $akte_lahir = $request->file('akte_lahir')->storeAs('dokumen/akte', $simpan_nama_file);
            $akte_lahir = $simpan_nama_file;
        }

        Anggota::create([
            'kode_anggota' => $request->input('kode_anggota'),
            'nama' => $request->input('nama'),
            'jk' => $request->input('jk'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'no_hp' => $request->input('no_hp'),
            'pekerjaan' => $request->input('pekerjaan'),
            'sts_keluarga' => $request->input('sts_keluarga'),
            'alamat' => $request->input('alamat'),
            'kabupaten' => $request->input('kabupaten'),
            'kelurahan' => $request->input('kelurahan'),
            'provinsi' => $request->input('provinsi'),
            'kecamatan' => $request->input('kecamatan'),
            'goldar' => $request->input('goldar'),
            'gambar' => $gambar,
            'srt_baptis' => $srt_baptis,
            'srt_sidi' => $srt_sidi,
            'akte_lahir' => $akte_lahir
        ]);

        //redirect dengan pesan sukses
        Alert::success('Data berhasil disimpan!', '');
        return redirect()->route('anggota.index');
    }

    public function tampil_ubah_anggota($id)
    {
        $anggota = Anggota::find($id);

        return view('anggota.edit', compact('anggota'));
    }

    public function perbarui_anggota(Request $request, $id)
    {
        $anggota = Anggota::find($id);

        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'nama' => 'required|min:3|unique:anggota,nama',
            'jk' => 'required',
            'tempat_lahir' => 'required|min:3',
            'tgl_lahir' => 'required|before_or_equal:today',
            'no_hp' => 'required|min:10|numeric',
            'pekerjaan' => 'required|min:3',
            'sts_keluarga' => 'required',
            'alamat' => 'required|min:3',
            'kabupaten' => 'required|min:3',
            'kelurahan' => 'required|min:3',
            'provinsi' => 'required|min:3',
            'kecamatan' => 'required|min:3',
            'goldar' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:2048',
            'srt_baptis' => 'max:2048',
            'srt_sidi' => 'max:2048',
            'akte_lahir' => 'max:2048'
        ],
        // Pesan
        [
            // Unique
            'nama.unique' => 'Nama sudah terdaftar!',

            // Required
            'nama.required' => 'Nama lengkap wajib diisi!',
            'jk.required' => 'Jenis kelamin wajib diisi!',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi!',
            'no_hp.required' => 'Nomor handphone wajib diisi!',
            'pekerjaan.required' => 'Pekerjaan wajib diisi!',
            'sts_keluarga.required' => 'Status keluarga wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'kabupaten.required' => 'Kota atau kabupaten wajib diisi!',
            'kelurahan.required' => 'Kelurahan atau desa wajib diisi!',
            'provinsi.required' => 'Provinsi wajib diisi!',
            'kecamatan.required' => 'Kecamatan wajib diisi!',
            'goldar.required' => 'Golongan darah wajib diisi!',

            // Min
            'nama.min' => 'Nama lengkap diisi minimal 3 karakter!',
            'tempat_lahir.min' => 'Tempat lahir diisi minimal 3 karakter!',
            'no_hp.min' => 'Nomor handphone diisi minimal 10 karakter!',
            'pekerjaan.min' => 'Pekerjaan diisi minimal 3 karakter!',
            'alamat.min' => 'Alamat diisi minimal 3 karakter!',
            'provinsi.min' => 'Provinsi diisi minimal 3 karakter!',
            'kabupaten.min' => 'Kabupaten diisi minimal 3 karakter!',
            'kecamatan.min' => 'Kecamatan diisi minimal 3 karakter!',
            'kelurahan.min' => 'Kelurahan diisi minimal 3 karakter!',

            // Before or equal
            'tgl_lahir.before_or_equal' => 'Tanggal lahir tidak boleh lewat dari tanggal hari ini!',

            // Numeric
            'no_hp.numeric' => 'Nomor handphone wajib angka!',

            // Tipe File
            'gambar.mimes' => 'Tipe file yang dapat di unggah adalah jpg/jpeg/png',

            // Ukuran file
            'gambar.max' => 'Ukuran maksimal file gambar adalah 2mb',
            'srt_baptis.max' => 'Ukuran maksimal file surat baptis adalah 2mb',
            'srt_sidi.max' => 'Ukuran maksimal file surat sidi adalah 2mb',
            'akte_lahir.max' => 'Ukuran maksimal file akte kelahiran adalah 2mb'

        ]);

        // $tgl_skrg = Carbon::now(); // Tanggal sekarang

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil diubah!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Validasi nilai tanggal lahir tidak boleh lebih dari tanggal sekarang
        // elseif(strtotime($request->tgl_lahir) > strtotime($tgl_skrg)) {
        //     Alert::error('Data tidak berhasil disimpan!', '');
        //     return redirect()->back()->withErrors($validator)->withInput();;
        // }

        // Proses upload gambar
        if($request->file('gambar')) {
            $nama_file_dikonversi = $request->kode_anggota;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->gambar->getClientOriginalExtension();
            $simpan_nama_file = 'FOTO_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $gambar = $request->file('gambar')->storeAs('images/anggota', $simpan_nama_file);
            $anggota->gambar = $simpan_nama_file;
        }

         // Proses upload surat baptis
        if($request->file('srt_baptis')) {
            $nama_file_dikonversi = $request->kode_anggota;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->srt_baptis->getClientOriginalExtension();
            $simpan_nama_file = 'BAPTIS_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $srt_baptis = $request->file('srt_baptis')->storeAs('dokumen/baptis', $simpan_nama_file);
            $anggota->srt_baptis = $simpan_nama_file;
        }

        // Proses upload surat sidi
        if($request->file('srt_sidi')) {
            $nama_file_dikonversi = $request->kode_anggota;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->srt_sidi->getClientOriginalExtension();
            $simpan_nama_file = 'SIDI_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $srt_sidi = $request->file('srt_sidi')->storeAs('dokumen/sidi', $simpan_nama_file);
            $anggota->srt_sidi = $simpan_nama_file;
        }

        // Proses upload surat sidi
        if($request->file('akte_lahir')) {
            $nama_file_dikonversi = $request->kode_anggota;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->akte_lahir->getClientOriginalExtension();
            $simpan_nama_file = 'AKTE_'.$nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $akte_lahir = $request->file('akte_lahir')->storeAs('dokumen/akte', $simpan_nama_file);
            $anggota->akte_lahir = $simpan_nama_file;
        }

        $anggota->nama = $request->input('nama');
        $anggota->jk = $request->input('jk');
        $anggota->tempat_lahir = $request->input('tempat_lahir');
        $anggota->tgl_lahir = $request->input('tgl_lahir');
        $anggota->no_hp = $request->input('no_hp');
        $anggota->pekerjaan = $request->input('pekerjaan');
        $anggota->sts_keluarga = $request->input('sts_keluarga');
        $anggota->alamat = $request->input('alamat');
        $anggota->kabupaten = $request->input('kabupaten');
        $anggota->kelurahan = $request->input('kelurahan');
        $anggota->provinsi = $request->input('provinsi');
        $anggota->kecamatan = $request->input('kecamatan');
        $anggota->goldar = $request->input('goldar');

        $anggota->update();

        //redirect dengan pesan sukses
        Alert::success('Data berhasil diubah!', '');
        return redirect()->route('anggota.index');
    }

    public function tampil_detail_anggota($id)
    {
        $anggota = Anggota::find($id);

        if ($anggota->srt_baptis == null AND $anggota->srt_sidi == null AND $anggota->gambar == null AND $anggota->akte_lahir == null ) {
            Alert::warning('Surat baptis, surat sidi, foto dan akte kelahiran belum diupload!', '');
        } elseif($anggota->srt_baptis == null AND $anggota->gambar == null AND $anggota->akte_lahir == null){
            Alert::warning('Surat baptis, foto dan akte kelahiran belum diupload!', '');
        } elseif($anggota->srt_sidi == null AND $anggota->gambar == null AND $anggota->akte_lahir == null){
            Alert::warning('Surat sidi, foto dan akte kelahiran belum diupload!', '');
        } elseif($anggota->srt_sidi == null AND $anggota->srt_baptis == null AND $anggota->akte_lahir == null){
            Alert::warning('Surat sidi, surat baptis dan akte kelahiran belum diupload!', '');
        } elseif($anggota->srt_sidi == null AND $anggota->srt_baptis == null){
            Alert::warning('Surat sidi dan surat baptis belum diupload!', '');
        } elseif($anggota->srt_baptis == null){
            Alert::warning('Surat baptis belum diupload!', '');
        } elseif($anggota->srt_sidi == null){
            Alert::warning('Surat sidi belum diupload!', '');
        } elseif($anggota->gambar == null){
            Alert::warning('Foto belum diupload!', '');
        } elseif($anggota->akte_lahir == null){
            Alert::warning('Akte kelahiran belum diupload!', '');
        }

        return view('anggota.show', compact('anggota'));
    }

    public function hapus_anggota($id)
    {
        $anggota = Anggota::find($id);
        $file_gambar = 'storage/images/anggota/'. $anggota->gambar;
        $srt_baptis = 'storage/dokumen/baptis/'. $anggota->srt_baptis;
        $srt_sidi = 'storage/dokumen/sidi/'. $anggota->srt_sidi;
        $akte_lahir = 'storage/dokumen/sidi/'. $anggota->akte_lahir;

        if(File::exists($file_gambar, $srt_baptis, $srt_sidi, $akte_lahir))
        {
            File::delete($file_gambar, $srt_baptis, $srt_sidi, $akte_lahir);
        }

        $anggota->delete();

        //redirect dengan pesan sukses
        Alert::success('Data berhasil dihapus!', '');
        return redirect()->back();
    }

    public function cetak_semua_pdf()
    {
        $anggota = Anggota::all();
        $dt = Carbon::now();
        $pdf = PDF::loadView('laporan.anggota.semua_anggota', compact('anggota', 'dt'));
        return $pdf->stream('SIGPIB_Anggota_'.$dt->format('d_M_Y').'.pdf');
    }

    public function cetak_satu_pdf($id)
    {
        $anggota = Anggota::find($id);
        $dt = Carbon::now();
        $pdf = PDF::loadView('laporan.anggota.satu_anggota', compact('anggota', 'dt'));
        return $pdf->stream('SIGPIB_'.$anggota->kode_anggota.('_').$dt->format('d_M_Y').'.pdf');
    }
}
