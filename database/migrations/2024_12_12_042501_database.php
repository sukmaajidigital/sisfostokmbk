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
        // Tabel kategori
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->timestamps();
        });

        // Tabel bahan
        Schema::create('bahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan');
            $table->string('satuan');
            $table->integer('stok')->default(0);
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel supplier
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->string('nomor');
            $table->text('alamat');
            $table->timestamps();
        });

        // Tabel bahan masuk
        Schema::create('bahan_masuks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->unsignedBigInteger('id_bahan');
            $table->foreign('id_bahan')->references('id')->on('bahans')->onDelete('cascade');
            $table->unsignedBigInteger('id_supplier');
            $table->foreign('id_supplier')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel keperluan
        Schema::create('keperluans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_keperluan');
            $table->timestamps();
        });

        // Tabel bahan keluar
        Schema::create('bahan_keluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_keperluan');
            $table->foreign('id_keperluan')->references('id')->on('keperluans')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->text('catatan')->nullable();
            $table->unsignedBigInteger('id_bahan');
            $table->foreign('id_bahan')->references('id')->on('bahans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_keluars');
        Schema::dropIfExists('keperluans');
        Schema::dropIfExists('bahan_masuks');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('bahans');
        Schema::dropIfExists('kategoris');
    }
};
