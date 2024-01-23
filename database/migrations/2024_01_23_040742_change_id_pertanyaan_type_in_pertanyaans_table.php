<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->string('id_pertanyaan')->change();
        });
    }

    public function down()
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->integer('id_pertanyaan')->change();
        });
    }
};
