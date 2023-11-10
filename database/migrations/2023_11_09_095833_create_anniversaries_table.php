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
        Schema::create('anniversaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('anniversary_date');
            $table->string('anniversary_type');
            $table->unsignedInteger('importance');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birthday');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birthday')->nullable();
        });
        Schema::dropIfExists('anniversaries');
    }
};
