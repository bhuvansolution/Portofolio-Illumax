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
        Schema::create('gallery_pages', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('gambar1')->nullable();
            $table->string('textatas')->nullable();
            $table->string('engtextatas')->nullable();
            $table->string('textbawah')->nullable();
            $table->string('engtextbawah')->nullable();
            $table->string('quote')->nullable();
            $table->string('engquote')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_pages');
    }
};
