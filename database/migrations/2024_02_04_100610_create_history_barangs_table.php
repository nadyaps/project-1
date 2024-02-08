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
        Schema::create('history_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('id_barang');
            $table->string('serial_number');
            $table->string('nama_barang');
            $table->string('jumlah_barang');
            $table->string('tanggal_masuk');
            $table->string('timeline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_barangs');
    }
};
