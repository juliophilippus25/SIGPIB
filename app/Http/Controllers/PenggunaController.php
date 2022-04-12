<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Alert;
use File;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
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
    public function tampil_pengguna()
    {
        $pengguna= User::get();
        return view('pengguna.index', compact('pengguna'));
    }

    public function tambah_pengguna()
    {
        return view('pengguna.create');
    }

    public function simpan_pengguna(Request $request)
    {
        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'name' => 'required|min:3|unique:users,name,',
            'email' => 'required|unique:users,email,',
            'username' => 'required|min:5|unique:users,username,',
            'password' => 'required|min:8|confirmed',
            'password_confirmation'=>'required|min:8|same:password',
            'role' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:2048',
        ],
        // Pesan
        [
            // Required
            'name.required' => 'Nama pengguna wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'password.required' => 'Password wajib diisi!',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi!',
            'role.required' => 'Role wajib diisi!',

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

        // Proses upload gambar
        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $nama_file_dikonversi = $request->username;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->gambar->getClientOriginalExtension();
            $simpan_nama_file = $nama_file_dikonversi.'_'.$dt->format('d_M_Y').'.'.$extension;
            $gambar = $request->file('gambar')->storeAs('images/pengguna', $simpan_nama_file);
            $gambar = $simpan_nama_file;
        }

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil disimpan!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => bcrypt(($request->input('password'))),
            'gambar' => $gambar
        ]);

        // redirect dengan pesan sukses
        Alert::success('Data berhasil disimpan!', '');
        return redirect()->route('pengguna.index');
    }

    public function tampil_ubah_pengguna($id)
    {
        $pengguna = User::find($id);

        return view('pengguna.edit', compact('pengguna'));
    }

    public function tampil_detail_pengguna($id)
    {
        $pengguna = User::find($id);

        return view('pengguna.show', compact('pengguna'));
    }

    public function perbarui_pengguna(Request $request, $id)
    {
        $pengguna = User::find($id);

        // Validasi Form
        $validator = Validator::make($request->all(),
        // Aturan
        [
            'role' => 'required',
        ],
        // Pesan
        [
            // Required
            'role.required' => 'Role wajib diisi!'
        ]);

        // Memberikan pesan error ketika terdapat validasi yang salah
        if($validator->fails()){
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil diubah!', '');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pengguna->role = $request->input('role');

        if(Auth::user()->id != $id AND $pengguna->role == 'Super Admin') {
            $pengguna->update();
            // redirect dengan pesan sukses
            Alert::success('Data berhasil diubah!', '');
        } else {
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil diubah!', '');
        }

        return redirect()->route('pengguna.index');
    }

    public function hapus_pengguna($id)
    {
        $pengguna = User::find($id);

        $file_gambar = 'storage/images/pengguna/'. $pengguna->gambar;

        if(File::exists($file_gambar))
        {
            File::delete($file_gambar);
        }

        if(Auth::user()->id != $id AND $pengguna->role == 'Admin') {
            $pengguna->delete();
            // redirect dengan pesan sukses
            Alert::success('Data berhasil dihapus!', '');
        } else {
            // redirect dengan pesan error
            Alert::error('Data tidak berhasil dihapus!', '');
        }

        return redirect()->back();
    }
}
