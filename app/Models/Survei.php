<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;

    protected $table = 'surveis';
    protected $primaryKey = 'id_survei';
    public $timestamps = true;

    protected $fillable = [
        'id_responden',
    ];

    // Relasi dengan tabel Responden
    public function responden()
    {
        return $this->belongsTo(Responden::class, 'id_responden', 'id_responden');
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'id_survei', 'id_survei');
    }
}
