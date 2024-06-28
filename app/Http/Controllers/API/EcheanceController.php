<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Echeance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class EcheanceController extends Controller
{
    public function version()
    {

      return  'v1';

    }

   public function index($date)
    {

      return  $echeances = Echeance::whereNull('date_synchronisation')
          ->where('CA_Num','!=','CONV0000')
          ->where('DO_Date', '>', $date)
          ->orderBy('DO_Date', 'desc')
         ->orderBy('DO_Piece', 'DESC')
         ->paginate(550);

    }

    public function filterByDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $echeances = Echeance::whereNull('date_synchronisation')->whereBetween('DO_Date', [$startDate, $endDate])->orderBy('DO_Date','desc')->orderBy('DO_Piece','DESC')->get();

        return $echeances;
    }

    public function show($id)
    {

        return $echeances = Echeance::where('DR_No', $id)->first();

    }


    public function echeancesbyfacture($id)
    {
        return $echeances = Echeance::where('DO_Piece', $id)->get();

    }


    public function update(Request $request)
    {

         $echeances = Echeance::where('DR_No', $request->id)->first();

         $echeances->update([
             'synchroniser' => 1,
             'date_synchronisation' => now(),
             'synchroniser_par' => $request->user_id,
              'is_valide' => 1
         ]);

    }

    public function updatemontant(Request $request)
    {

         $echeances = Echeance::where('DR_No', $request->id)->first();

         $echeances->update([
             'DO_Piece' => $request->numero_facture,
             'DR_Montant' => $request->montant
         ]);

    }

    public function updatemontantConvention(Request $request)
    {

         $echeances = Echeance::where('DR_No', $request->id)->first();

         $echeances->update([
             'DO_Piece' => $request->numero_facture,
             'DR_Montant' => $request->montant,
             'numero_recu' => $request->numero_recu,
             'montant_recu' => $request->montant_recu
         ]);

         return "ok";
    }


    public function delete(Request $request)
    {

         $echeances = Echeance::where('DR_No', $request->id)->first();

         $echeances->delete();
    }


        public function deleteall(Request $request)
        {
            $echeanceIds = $request->input('id');
             $echeanceIds = $request->all();
                 $echeanceIds = array_values($request->all());
            Log::error($echeanceIds);

        }



    public function updatevalide(Request $request)
    {

         $echeances = Echeance::where('DR_No', $request->id)->first();

         $echeances->update([
             'is_valide' => 1,
             'valider_par' => $request->user_id,
             'valider_le' => now(),
         ]);

        return $echeances;
    }
       public function updateObservation(Request $request)
    {

        $echeances = Echeance::where('DO_Piece', $request->id)
            ->update([
                'observation' => $request->observation,
                'matricule' => $request->matricule,
                'prenom_nom' => $request->prenom_nom,
                'telephone' => $request->telephone,
                'DR_Montant' => $request->solde,
            ]);

        return "ok";

    }

   public function updatevalideall(Request $request)
    {

         $echeances = Echeance::where('DO_Piece', $request->id)
             ->update([
                 'is_valide' => 1,
                 'valider_par' => $request->user_id,
                 'valider_le' => now(),
             ]);

        return "ok";
    }

    public function isvalide(Request $request)
    {

        $echeances = Echeance::where('is_valide', true)->whereNull('date_synchronisation')->orderBy('DO_Date','desc')->orderBy('DO_Piece','DESC')->get();

        return $echeances;
    }

}
