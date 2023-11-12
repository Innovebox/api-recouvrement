<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Echeance;
use Illuminate\Http\Request;

class EcheanceController extends Controller
{
    public function index()
    {
         return $echeances = Echeance::orderBy('DR_No','desc')->paginate(75);

    }

    public function filterByDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $echeances = Echeance::whereBetween('DR_Date', [$startDate, $endDate])->orderBy('DR_No','desc')->paginate(75);

        return $echeances;
    }

}
