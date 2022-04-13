<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Pelkat;
use App\Models\Sekwil;

class UnduhanController extends Controller
{
    public function tampil_unduh()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();

        return view('unduh.index', compact('anggota', 'pelkat', 'sekwil'));
    }
}
