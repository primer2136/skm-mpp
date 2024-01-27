<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban_responden';

    protected $fillable = [
        'id_responden',
        'id_pertanyaan',
        'jawaban',
        'bobot',
    ];

    // Relasi dengan tabel Responden
    public function responden()
    {
        return $this->belongsTo(Responden::class, 'id_responden');
    }

    // Relasi dengan tabel Pertanyaan
    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }
}
