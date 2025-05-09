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
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->id();
            $table->string('banneratas')->nullable();
            $table->string('gambar1')->nullable();
            $table->string('gambar')->nullable();
            $table->string('bannerbawah')->nullable();
            $table->string('textatas')->nullable();
            $table->string('engtextatas')->nullable();
            $table->string('judul')->nullable();
            $table->string('engjudul')->nullable();
            $table->text('description')->nullable();
            $table->text('engdescription')->nullable();
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
        Schema::dropIfExists('aboutuses');
    }
};
