<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
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


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respondens');
    }
};
