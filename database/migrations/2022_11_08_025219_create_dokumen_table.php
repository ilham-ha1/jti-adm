<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('kode')->unique();
            $table->date('tanggal')->nullable();
            $table->string('nomor surat')->nullable();
            $table->string('nim');
            $table->string('nama');
            $table->string('lulus')->nullable();
            $table->string('oerdner')->nullable();
            $table->string('map')->nullable();
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
        Schema::dropIfExists('dokumen');
    }
};
