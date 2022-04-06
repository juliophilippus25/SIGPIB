<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKakel extends Model
{
    use HasFactory;

    protected $table = 'detail_kakel';
    
    protected $fillable = ['id_kakel', 'id_anggota','sts_keluarga'];

    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    } 

    public function kakel()
    {
    	return $this->belongsTo(Kakel::class);
    } 
}
