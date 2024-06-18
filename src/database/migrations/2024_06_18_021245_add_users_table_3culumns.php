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
            $table->boolean("is_general_user")->after("password");
            $table->boolean("is_store_representative")->after("is_general_user");
            $table->boolean("is_admin")->after("is_store_representative");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("is_general_user");
            $table->dropColumn("is_store_representative");
            $table->dropColumn("is_admin");
        });
    }
};
