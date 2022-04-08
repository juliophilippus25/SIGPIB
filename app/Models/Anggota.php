<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = ['kode_anggota', 'nama', 'jk', 'tempat_lahir', 'tgl_lahir', 'no_hp', 'pekerjaan', 'sts_keluarga', 'kabupaten', 'kelurahan', 'alamat', 'provinsi', 'kecamatan', 'goldar', 'gambar'];

    public function kakel()
    {
    	return $this->hasMany(Kakel::class);
    }
}
