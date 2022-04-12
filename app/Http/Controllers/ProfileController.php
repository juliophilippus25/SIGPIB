<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Alert;
use File;
use Carbon\Carbon;
use Validator;

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
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'name' => 'required|min:3|unique:users,name,'.$profile->id,
            'email' => 'required|unique:users,email,'.$profile->id,
            'username' => 'required|min:5|unique:users,username,'.$profile->id,
            'password' => 'nullable|min:8|confirmed',
            'password_confirmation'=>'nullable|min:8|same:password',
            'gambar' => 'mimes:jpg,jpeg,png|max:2048',
        ],
        // Pesan
        [
            // Required
            'name.required' => 'Nama pengguna wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'username.required' => 'Username wajib diisi!',

            // Unique
            'name.unique' => 'Nama pengguna sudah digunakan!',
            'email.unique' => 'Email sudah digunakan!',
            'username.unique' => 'Username sudah digunakan!',

            // Min
            'name.min' => 'Nama pengguna diisi minimal 3 karakter!',
            'username.min' => 'Username diisi minimal 5 karakter!',
            'password.min' => 'Password diisi minimal 8 karakter!',
            'password_confirmation.min' => 'Password konfirmasi diisi minimal 8 karakter!',

            // Confirmed
            'password.confirmed' => 'Konfirmasi password tidak sama!',

            // Same
            'password_confirmation.same' => 'Konfirmasi password harus sama dengan password!',

            // Tipe File
            'gambar.mimes' => 'Tipe file yang dapat di unggah adalah jpg/jpeg/png',

            // Ukuran file
            'gambar.max' => 'Ukuran maksimal file gambar adalah 2mb'
        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil diubah!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->username = $request->input('username');
        if($request->input('password')) {
            $profile->password= bcrypt(($request->input('password')));
        }

        // Proses upload gambar
        if($request->file('gambar')) {
            $nama_file_dikonversi = $request->username;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->gambar->getClientOriginalExtension();
            $simpan_nama_file = $nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $gambar = $request->file('gambar')->storeAs('images/pengguna', $simpan_nama_file);
            $profile->gambar = $simpan_nama_file;
        }

        $profile->update();

        // redirect dengan pesan sukses
        Alert::success('Data berhasil diubah!', '');
        return redirect()->back();
    }

}
