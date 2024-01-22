<?php

// database/migrations/xxxx_xx_xx_create_respondens_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondensTable extends Migration
{
    public function up()
    {
        Schema::create('respondens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('tahun_lahir');
            $table->string('jenis_kelamin');
            $table->string('nomor_antrian');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('respondens');
    }
}

