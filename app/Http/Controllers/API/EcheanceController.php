<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Echeance;
use Illuminate\Http\Request;

class EcheanceController extends Controller
{
    public function version()
    {

      return  'v1';

    }

   public function index($date)
    {

      return  $echeances = Echeance::whereNull('date_synchronisation')
        ->orderBy('DO_Date', 'desc')
        ->orderBy('DO_Piece', 'DESC')
        ->paginate(100);

    }


    public function show($id)
    {

        return $echeances = Echeance::where('DR_No', $id)->first();

    }


    public function update(Request $request)
    {

         $echeances = Echeance::where('DR_No', $request->id)->first();

         $echeances->update([
             'synchroniser' => 1,
             'date_synchronisation' => now(),
             'synchroniser_par' => $request->user_id,
         ]);

    }

    public function filterByDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $echeances = Echeance::whereBetween('DO_Date', [$startDate, $endDate])->orderBy('DO_Date','desc')->orderBy('DO_Piece','DESC')->get();

        return $echeances;
    }
    public function isvalide(Request $request)
    {

        $echeances = Echeance::where('is_valide', true)->orderBy('DO_Date','desc')->orderBy('DO_Piece','DESC')->get();

        return $echeances;
    }

}
