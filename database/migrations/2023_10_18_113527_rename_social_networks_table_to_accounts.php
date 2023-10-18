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
        Schema::rename("social_networks", "accounts");
        Schema::table('accounts', function (Blueprint $table) {
            $table->timestamp('last_login')->nullable();
            $table->string('provider_id')->nullable();
            $table->renameColumn('platform', 'provider');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->renameColumn('provider', 'platform');
            $table->dropColumn('provider_id');
            $table->dropColumn('last_login');
        });
        Schema::rename("accounts", "social_networks");
    }
};
