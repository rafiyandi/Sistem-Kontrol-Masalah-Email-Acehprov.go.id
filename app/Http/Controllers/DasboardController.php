<?php

namespace App\Http\Controllers;

use App\Models\DataEmail;
use App\Models\Spka;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        $spka = Spka::count();
        $dataEmail = DataEmail::count();

        $listKontrol = Spka::with('kontrol')->withCount('kontrol')->get();
        // return response()->json($listKontrol, 200);

        return view('pages.dasboard')->with(
            [
                'spak' => $spka,
                'dataEmail' => $dataEmail,
                'list' => $listKontrol
            ]
        );
    }
}
