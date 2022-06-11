<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 50);
            $table->string('nama', 250);
            $table->foreignId('golongan_id');
            $table->foreignId('jabatan_id');
            $table->date('tgl_lahir');
            $table->string('telp', 50);
            $table->text('alamat');
            $table->enum('status', ['pns', 'honor']);
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
        Schema::dropIfExists('pegawais');
    }
}
