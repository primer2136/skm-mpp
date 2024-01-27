<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanRespondenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_responden', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_responden');
            $table->unsignedBigInteger('id_pertanyaan');
            $table->string('jawaban');
            $table->integer('bobot');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_responden')->references('id')->on('responden')->onDelete('cascade');
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_responden');
    }
}
