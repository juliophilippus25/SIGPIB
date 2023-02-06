<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baptis extends Model
{
    use HasFactory;

    protected $table = 'baptis';

    protected $fillable = ['id_anggota', 'tempat_baptis', 'tgl_baptis', 'pendeta'];

    public function anggota()
    {
    	return $this->belongsTo('App\Models\Anggota', 'id_anggota');
    }
}
