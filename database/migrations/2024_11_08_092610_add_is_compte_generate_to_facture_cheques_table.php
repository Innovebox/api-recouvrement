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
        Schema::table('facture_cheques', function (Blueprint $table) {
            $table->boolean('is_compte_generale')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facture_cheques', function (Blueprint $table) {
            $table->dropColumn('is_compte_generale');
        });
    }
};
