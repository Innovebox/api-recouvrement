<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientAPIController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Client::query();

            // Traitement de la recherche
            if ($request->has('search') && !empty($request->search)) {
                $searchTerm = $request->search;
                $searchType = $request->search_type ?? 'all';

                if ($searchType === 'code' || $searchType === 'all') {
                    $query->where('CT_Num', 'LIKE', "%{$searchTerm}%");
                }

                if ($searchType === 'name' || $searchType === 'all') {
                    if ($searchType === 'all') {
                        $query->orWhere('CT_Intitule', 'LIKE', "%{$searchTerm}%");
                    } else {
                        $query->where('CT_Intitule', 'LIKE', "%{$searchTerm}%");
                    }
                }
            }

            // Pagination
            $perPage = $request->per_page ?? 10;
            $clients = $query->paginate($perPage);

            // Ajouter un indicateur que les résultats ont été filtrés
            $result = $clients->toArray();
            $result['filtered'] = $request->has('search') && !empty($request->search);

            return response()->json($result);

        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des clients', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Erreur lors de la récupération des clients',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $client = Client::where('id',$id)->first();

        return response()->json($client);
    }
}
