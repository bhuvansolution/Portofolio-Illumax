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
        Schema::create('our_services', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable(); // Kolom untuk menyimpan data alamat brand
            $table->json('description')->nullable();
            $table->json('engtitle')->nullable(); // Kolom untuk menyimpan data alamat brand
            $table->json('engdescription')->nullable();
            $table->string('gambar')->nullable();
            $table->string('textatas')->nullable();
            $table->string('engtextatas')->nullable();
            $table->string('brand')->nullable();
            $table->string('engbrand')->nullable();
            $table->json('icon')->nullable(); // Kolom untuk menyimpan data alamat brand
            $table->json('text')->nullable();
            $table->json('engtext')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_services');
    }
};
