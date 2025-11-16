<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('casting_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('fullname');
            $table->date('dob');
            $table->enum('gender', ['male', 'female']);
            $table->integer('height');
            $table->integer('weight');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('portfolio')->nullable();
            $table->text('projects')->nullable();
            $table->string('skills');
            $table->string('languages');
            $table->enum('category', ['actor', 'model', 'extra', 'voice-actor', 'other']);
            $table->string('photo');
            $table->string('video'); 
            $table->boolean('confirmed_info')->default(false);
            $table->boolean('confirmed_permission')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('casting_submissions');
    }
};