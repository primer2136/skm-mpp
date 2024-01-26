<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $table = 'jawaban_survei';
    protected $primaryKey = 'id_jawaban';
    public $timestamps = true;

    protected $fillable = [
        'id_survei',
        'id_pertanyaan',
        'bobot',
        'ratanilai'
    ];

    // Relasi dengan tabel Survei
    public function survei()
    {
        return $this->belongsTo(Survei::class, 'id_survei', 'id_survei');
    }

    // Relasi dengan tabel Pertanyaan
    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan', 'id_pertanyaan');
    }
}
