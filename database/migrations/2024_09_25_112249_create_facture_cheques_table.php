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
        Schema::create('facture_cheques', function (Blueprint $table) {
            $table->id();
            $table->string('CODE',30);
            $table->date('JM_DATE');
            $table->date('EC_DATE');
            $table->integer('EC_JOUR');
            $table->bigInteger('NUM_PIECE');
            $table->string('NUM_FACT', 50)->nullable();
            $table->string('REF', 50)->nullable();
            $table->bigInteger('CG_NUM');
            $table->string('CT_NUM', 20);
            $table->bigInteger('EC_MONTANT');
            $table->string('LIBELLE_ECRITURE', 100);
            $table->integer('EC_SENS');
            $table->string('CLIENT', 100);
            $table->bigInteger('TYPE_VERSEMENT');
            $table->boolean('VALIDE')->default(true);
            $table->boolean('insert')->default(false);
            $table->bigInteger('CG_NUM')->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture_cheques');
    }
};
