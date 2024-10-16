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
        Schema::create('inventaires', function (Blueprint $table) {
            $table->id();
            $table->string('AR_Ref'); // Référence de l'article
            $table->unsignedInteger('DE_No'); // Numéro de dépôt
            $table->decimal('AS_QteMini', 15, 6)->default(0); // Quantité minimale
            $table->decimal('AS_QteMaxi', 15, 6)->default(0); // Quantité maximale
            $table->decimal('AS_MontSto', 15, 6)->default(0); // Montant stock
            $table->decimal('AS_QteSto', 15, 6)->default(0); // Quantité en stock
            $table->decimal('AS_QteRes', 15, 6)->default(0); // Quantité réservée
            $table->decimal('AS_QteCom', 15, 6)->default(0); // Quantité commandée
            $table->boolean('AS_Principal')->default(0); // Indicateur principal
            $table->decimal('AS_QteResCM', 15, 6)->default(0); // Quantité réservée en cours de mouvement
            $table->decimal('AS_QteComCM', 15, 6)->default(0); // Quantité commandée en cours de mouvement
            $table->decimal('AS_QtePrepa', 15, 6)->default(0); // Quantité préparée
            $table->unsignedInteger('DP_NoPrincipal')->default(0); // Numéro de dépôt principal
            $table->unsignedInteger('DP_NoControle')->default(0); // Numéro de contrôle de dépôt
            $table->decimal('AS_QteAControler', 15, 6)->default(0); // Quantité à contrôler
            $table->boolean('AS_Mouvemente')->default(0); // Indicateur de mouvement
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaires');
    }
};
