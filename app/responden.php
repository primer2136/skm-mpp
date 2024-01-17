<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class responden extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "respondens";

    protected $primaryKey = "id_responden";

    protected $fillable = [
        'nama_responden', 'tahun_lahir', 'jenis_kelamin',
        'riwayat_pendidikan', 'pekerjaan'
    ];
}
