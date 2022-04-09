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
}
