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
        Schema::create('echeances', function (Blueprint $table) {
            $table->id();
            $table->date('date_facture');
            $table->string('numero_facture');
            $table->string('code_client');
            $table->string('client');
            $table->string('telephone')->nullable();
            $table->bigInteger('montant');
            $table->date('date_echeance');
            $table->string('reference')->nullable();
            $table->boolean('est_modifie')->default(false);
            $table->dateTime('date_de_modification')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('echeances');
    }
};
