<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_responden';

    protected $fillable = [
        'nama_responden',
        'tahun_lahir',
        'jenis_kelamin',
        'riwayat_pendidikan',
        'pekerjaan',
    ];
}
