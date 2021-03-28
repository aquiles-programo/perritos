<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perrito extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'color', 'raza_id'];

    public function raza()
    {
        return $this->belongsTo(Raza::class);
    }
}
