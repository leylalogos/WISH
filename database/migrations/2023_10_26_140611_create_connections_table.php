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
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->string('nickname')->nullable();
            $table->boolean('is_confirmed')->default(false);
            $table->unsignedBigInteger('following_id');
            $table->unsignedBigInteger('followed_id');
            $table->timestamps();
            $table->foreign('following_id')->references('id')->on('users');
            $table->foreign('followed_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
