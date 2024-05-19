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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_invoice');
            // $table->foreign('id_invoice')->references('id')->on('invoice');
            $table->text('deskripsi');
            $table->enum('status', ['bayar', 'dp', 'lunas']);
            $table->integer('besar_dp');
            $table->unsignedBigInteger('id_reservasi');
            $table->foreign('id_reservasi')->references('id')->on('reservasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
