<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelkat extends Model
{
    use HasFactory;

    protected $table = 'pelkat';
    
    protected $fillable = ['nama_pelkat'];

    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    } 

    public function detailpelkat()
    {
    	return $this->hasOne(DetailPelkat::class);
    }
}
