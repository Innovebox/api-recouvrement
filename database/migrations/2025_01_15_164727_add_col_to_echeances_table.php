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
        Schema::table('echeances', function (Blueprint $table) {
            $table->string('entete1')->nullable();
            $table->string('entete2')->nullable();
            $table->string('reference2')->nullable();
            $table->string('representant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('echeances', function (Blueprint $table) {
            $table->dropColumn('entete1');
            $table->dropColumn('entete2');
            $table->dropColumn('reference2');
            $table->dropColumn('representant');
        });
    }
};
