<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Echeance;
use Illuminate\Http\Request;

class EcheanceController extends Controller
{
    public function index()
    {
         return $echeances = Echeance::orderBy('DO_Date','desc')->orderBy('DO_Piece','DESC')->paginate(75);

    }

    public function filterByDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $echeances = Echeance::whereBetween('DO_Date', [$startDate, $endDate])->orderBy('DO_Date','desc')->orderBy('DO_Piece','DESC')->paginate(150);

        return $echeances;
    }

}
