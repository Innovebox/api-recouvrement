<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Facture;
use App\Models\FactureCheque;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'CODE' => 'required|string|max:30',
            'JM_DATE' => 'required|date',
            'EC_DATE' => 'required|date',
            'EC_JOUR' => 'required|integer',
            'NUM_PIECE' => 'required|integer',
            'NUM_FACT' => 'nullable|string|max:50',
            'REF' => 'nullable|string|max:50',
            'CT_NUM' => 'required|string|max:20',
            'EC_MONTANT' => 'required|integer',
            'LIBELLE_ECRITURE' => 'required|string|max:100',
            'EC_SENS' => 'required|integer',
            'CLIENT' => 'required|string|max:100',
            'TYPE_VERSEMENT' => 'required|integer',
            'VALIDE' => 'boolean'
        ]);

        // Création de la facture
        $facture = Facture::create($validatedData);

        // Réponse JSON
        return response()->json($facture, 201);
    }

    public function facturescheques(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'CODE' => 'required|string|max:30',
            'JM_DATE' => 'required|date',
            'EC_DATE' => 'required|date',
            'EC_JOUR' => 'required|integer',
            'NUM_PIECE' => 'required|integer',
            'NUM_FACT' => 'nullable|string|max:50',
            'REF' => 'nullable|string|max:50',
            'CT_NUM' => 'required|string|max:20',
            'EC_MONTANT' => 'required|integer',
            'LIBELLE_ECRITURE' => 'required|string|max:100',
            'EC_SENS' => 'required|integer',
            'CLIENT' => 'required|string|max:100',
            'TYPE_VERSEMENT' => 'required|integer',
            'VALIDE' => 'boolean'
        ]);

        // Création de la facture
        $facture = FactureCheque::create($validatedData);

        // Réponse JSON
        return response()->json($facture, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
