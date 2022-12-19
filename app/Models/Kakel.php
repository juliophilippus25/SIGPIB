<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kakel extends Model
{
    use HasFactory;

    protected $table = 'kakel';

    protected $fillable = ['id_anggota', 'id_sekwil', 'tempat_nikah', 'tgl_nikah', 'srt_gereja', 'srt_sipil'];

    public function anggota()
    {
    	return $this->belongsTo('App\Models\Anggota', 'id_anggota');
    }

    public function sekwil()
    {
    	return $this->belongsTo('App\Models\Sekwil', 'id_sekwil');
    }

    public function detailkakel()
    {
    	return $this->hasOne(DetailKakel::class);
    }
}
