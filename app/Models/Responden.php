<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_responden';

    protected $fillable = [
        'id_tenant',
        'nama_responden',
        'tahun_lahir',
        'jenis_kelamin',
        'nomor_antrian',
        'riwayat_pendidikan',
        'pekerjaan',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'id_tenant', 'id_tenant');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_responden');
    }

    public function saran()
    {
        return $this->hasOne(Saran::class, 'id_responden');
    }
}
