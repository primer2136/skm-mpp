<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $fillable = ['layanan_id', 'pertanyaan', 'jawaban'];
}
