<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Echeance;
use Illuminate\Http\Request;

class EcheanceConventionController extends Controller
{


    public function index($date)
    {

        return  $echeances = Echeance::whereNull('date_synchronisation')
            ->where('CA_Num','CONV0000')
            ->where('DO_Date', '>', "2023-04-19")
            ->orderBy('DO_Date', 'desc')
            ->orderBy('DO_Piece', 'DESC')
            ->paginate(400);

    }

}
