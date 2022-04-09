<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function ubah_pengguna(Request $request)
    {
        return view('pengguna.edit', [
            'user' => $request->user()
        ]);
    }

    public function simpan_ubah_pengguna(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:20',
            'username' => 'required',
            'email' => 'required',
        ]);
    }
}
