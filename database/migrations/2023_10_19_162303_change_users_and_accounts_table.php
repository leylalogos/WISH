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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['provider_id', 'avatar', 'email']);
        });
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('email');
            $table->string('avatar')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'email']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('provider_id')->nullable();

        });
    }

};
