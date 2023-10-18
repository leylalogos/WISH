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
        Schema::table('wish_lists', function (Blueprint $table) {
            //stores price in kilo rial format
            $table->unsignedInteger('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wish_lists', function (Blueprint $table) {
            $table->dropColumn('price');

        });
    }
};
