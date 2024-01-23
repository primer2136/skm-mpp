<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pertanyaan'; // Tipe data VARCHAR
    public $incrementing = false; // Non-incrementing key
    protected $keyType = 'string'; // Tipe data kunci adalah string

    protected $fillable = [
        'pertanyaan',
        'jawaban1',
        'bobot1',
        'jawaban2',
        'bobot2',
        'jawaban3',
        'bobot3',
        'jawaban4',
        'bobot4',
    ];
}
