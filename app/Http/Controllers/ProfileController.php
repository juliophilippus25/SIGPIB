<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Alert;
use File;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function tampil_profile(Request $request)
    {
        $profile = Auth::user();

        // Alert::warning('Masukkan ulang data', 'Pada kolom password.');

        return view('profile.edit', compact('profile'));
    }

    public function perbarui_profile(Request $request)
    {
        $userId = Auth::id();
        $profile = User::findOrFail($userId);

        // Validasi Form
        $this->validate($request,
        // Aturan
        [
            'name' => 'required|min:3',
            'email' => 'required',
            'username' => 'required|min:3',
            'password' => 'nullable|min:3',
            'gambar' => 'mimes:jpg,jpeg,png|max:2048',
        ],
        // Pesan
        [
            // Required
            'name.required' => 'Nama pengguna wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'password.required' => 'Password wajib diisi!',

            // Min
            'name.min' => 'Nama pengguna diisi minimal 3 karakter!',
            'username.min' => 'Username diisi minimal 3 karakter!',
            'password.min' => 'Password diisi minimal 3 karakter!',

            // Tipe File
            'gambar.mimes' => 'Tipe file yang dapat di unggah adalah jpg/jpeg/png',

            // Ukuran file
            'gambar.max' => 'Ukuran maksimal file gambar adalah 2mb'
        ]);

        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->username = $request->input('username');
        if($request->input('password')) {
            $profile->password= bcrypt(($request->input('password')));
        }

        // Proses upload gambar
        if($request->file('gambar')) {
            $nama_file_dikonversi = $request->name;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->gambar->getClientOriginalExtension();
            $simpan_nama_file = $nama_file_dikonversi.'-'.$dt->format('d-M-Y').'.'.$extension;
            $gambar = $request->file('gambar')->move('images/pengguna', $simpan_nama_file);
            $profile->gambar = $simpan_nama_file;
        }

        $profile->update();

        Alert::success('Data berhasil diubah!', '');

        return redirect()->route('home');
    }

}
