<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
    public function jadwal()
    {
        return $this->belongsTo(Periksa::class);
    }
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
