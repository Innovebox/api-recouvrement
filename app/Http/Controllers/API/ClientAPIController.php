<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientAPIController extends Controller
{
    public function index(Request $request)
    {
        $client = Client::orderBy('CT_Num','DESC')->paginate(20);

        return response()->json($client);
    }
}
