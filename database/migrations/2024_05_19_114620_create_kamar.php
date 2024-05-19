<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_kamar');
            // $table->foreign('id_kamar')->references('id')->on('kamar');
            $table->string('nama_kamar');
            $table->enum('jenis_kamar', ['deluxe', 'superior', 'president']);
            $table->integer('ukuran_kamar');
            $table->integer('harga');


            // $table->string('nama_customer');
            // $table->string('email');
            // $table->string('country');
            
            // $table->text('alamat_mhs');
            // $table->unsignedBigInteger('id_kelas');
            // $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
