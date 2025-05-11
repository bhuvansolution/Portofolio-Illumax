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
        Schema::create('portofolio_pages', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('gambar1')->nullable();
            $table->string('textatas')->nullable();
            $table->string('engtextatas')->nullable();
            $table->string('textbawah')->nullable();
            $table->string('engtextbawah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio_pages');
    }
};
