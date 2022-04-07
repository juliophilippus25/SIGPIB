<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPelkat extends Model
{
    use HasFactory;

    protected $table = 'detail_pelkat';

    protected $fillable = ['id_pelkat', 'id_anggota', 'pengurus'];

    public function anggota()
    {
    	return $this->belongsTo('App\Models\Anggota', 'id_anggota');
    }

    public function pelkat()
    {
    	return $this->belongsTo(Pelkat::class);
    }

}
