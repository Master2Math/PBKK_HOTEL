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
        Schema::create('hotel', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_hotel');
            // $table->foreign('id_hotel')->references('id')->on('hotel');
            $table->integer('harga');
            $table->integer('available_room');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_kamar');
            $table->foreign('id_kamar')->references('id')->on('kamar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel');
    }
};
