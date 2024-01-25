<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_survei';

    protected $fillable = [
        'id_responden',
        'ratanilai',
    ];

    public function responden()
    {
        return $this->belongsTo(Responden::class, 'id_responden', 'id_responden');
    }
}
