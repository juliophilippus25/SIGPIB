<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use File;
use Carbon\Carbon;

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
        $anggota = Anggota::get();

        return view('anggota.index', compact('anggota'));
    }

    public function ambil_kabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option hidden disabled selected value>Pilih Kabupaten</option>";

        foreach($kabupatens as $kabupaten)
        {
            $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $option;
    }

    public function ambil_kecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option hidden disabled selected value>Pilih Kecamatan</option>";

        foreach($kecamatans as $kecamatan)
        {
            $option .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }

        echo $option;
    }

    public function ambil_kelurahan(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $kelurahans = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option hidden disabled selected value>Pilih Kelurahan</option>";

        foreach($kelurahans as $kelurahan)
        {
            $option .= "<option value='$kelurahan->id'>$kelurahan->name</option>";
        }

        echo $option;
    }

    public function tambah_anggota()
    {
        // Memanggil models IndoRegion
        $provinces = Province::all();

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

        return view('anggota.create', compact('kode', 'anggota', 'provinces'));
    }

    public function simpan_anggota(Request $request)
    {
        // Validasi Form
        $this->validate($request,
        // Aturan
        [
            'nama' => 'required|min:3',
            'jk' => 'required',
            'tempat_lahir' => 'required|min:3',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|min:7',
            'pekerjaan' => 'required|min:3',
            'sts_keluarga' => 'required',
            'alamat' => 'required|min:3',
            'kabupaten' => 'required',
            'kelurahan' => 'required',
            'provinsi' => 'required',
            'kecamatan' => 'required',
            'goldar' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png'
        ],
        // Pesan
        [
            // Required
            'nama.required' => 'Nama lengkap wajib diisi!',
            'jk.required' => 'Jenis kelamin wajib diisi!',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi!',
            'no_hp.required' => 'Nomor handphone wajib diisi!',
            'pekerjaan.required' => 'Pekerjaan wajib diisi!',
            'sts_keluarga.required' => 'Status keluarga wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'kabupaten.required' => 'Kabupaten wajib diisi!',
            'kelurahan.required' => 'Kelurahan wajib diisi!',
            'provinsi.required' => 'Provinsi wajib diisi!',
            'kecamatan.required' => 'Kecamatan wajib diisi!',
            'goldar.required' => 'Golongan darah wajib diisi!',

            // Min
            'nama.min' => 'Nama lengkap diisi minimal 3 karakter!',
            'tempat_lahir.min' => 'Tempat lahir diisi minimal 3 karakter!',
            'no_hp.min' => 'Nomor handphone diisi minimal 7 karakter!',
            'pekerjaan.min' => 'Pekerjaan diisi minimal 3 karakter!',
            'alamat.min' => 'Alamat diisi minimal 3 karakter!',

            // Tipe File
            'gambar.mimes' => 'Tipe file yang dapat di unggah adalah jpg/jpeg/png'
        ]);

        // Proses upload gambar
        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $nama_file_dikonversi = $request->nama;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->gambar->getClientOriginalExtension();
            $simpan_nama_file = $nama_file_dikonversi.'-'.$dt->format('d-M-Y').'.'.$extension;
            $gambar = $request->file('gambar')->move('images/anggota', $simpan_nama_file);
            $gambar = $simpan_nama_file;
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
            'gambar' => $gambar
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data berhasil disimpan!');
    }

    public function hapus_anggota($id)
    {
        $anggota = Anggota::find($id);
        $file_gambar = 'images/anggota/'. $anggota->gambar;

        if(File::exists($file_gambar))
        {
            File::delete($file_gambar);
        }

        $anggota->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
