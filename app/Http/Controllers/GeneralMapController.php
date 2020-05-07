<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralMapController extends Controller
{
    /**
     * Mostra la pagina principal amb el mapa de LeafletJS.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Parts.map');
    }
}
