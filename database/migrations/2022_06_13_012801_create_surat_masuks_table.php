<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat', 100);
            $table->string('asal_surat');
            $table->string('perihal');
            $table->foreignId('klasifikasi_id');
            $table->date('tgl_surat');
            $table->date('tgl_masuk');
            $table->string('file');
            $table->string('keterangan');
            $table->foreignId('user_id');
            $table->enum('dibaca', ['no', 'yes'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuks');
    }
}
