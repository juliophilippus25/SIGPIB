<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekwil extends Model
{
    use HasFactory;

    protected $table = 'sekwil';
    
    protected $fillable = ['nama_sekwil'];

    public function kakel()
    {
    	return $this->hasMany(Kakel::class);
    }
}
