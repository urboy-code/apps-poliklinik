<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    public function hari()
    {
        return $this->belongsTo(Hari::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
