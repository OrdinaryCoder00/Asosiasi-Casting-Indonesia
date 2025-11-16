<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('board_of_officers', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->default(0)->comment('Nomor urut di carousel');
            $table->string('name')->comment('Nama Officer');
            $table->text('intro')->nullable()->comment('Pengenalan Singkat Officer');
            $table->string('photo')->nullable()->comment('Foto Officer');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('board_of_officers');
    }
};