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
            $table->string('numero_recu')->nullable();
            $table->string('montant_recu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('echeances', function (Blueprint $table) {
            $table->dropColumn('numero_recu');
            $table->dropColumn('montant_recu');
        });
    }
};
