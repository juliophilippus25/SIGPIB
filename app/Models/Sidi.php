<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidi extends Model
{
    use HasFactory;

    protected $table = 'sidi';

    protected $fillable = ['id_anggota', 'tempat_sidi', 'tgl_sidi', 'pendeta'];

    public function anggota()
    {
    	return $this->belongsTo('App\Models\Anggota', 'id_anggota');
    }
}
