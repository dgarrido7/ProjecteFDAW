<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comunidade;
use App\Provincia;
use App\Municipio;

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
        $comunidades = Comunidade::all();
        $provincias = Provincia::all();
        $municipios = Municipio::all();
        return view('Parts.map',compact('comunidades','provincias','municipios'));
    }
}
