<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('asal_sekolah');
            $table->string('nisn')->unique();
            $table->string('no_hp');
            $table->string('jurusan');
            $table->string('status')->default('proses'); // proses, disetujui, ditolak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
