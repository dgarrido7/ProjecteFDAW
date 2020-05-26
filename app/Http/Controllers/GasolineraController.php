<?php

namespace App\Http\Controllers;

use App\Gasolinera;
use Illuminate\Http\Request;

class GasolineraController extends Controller
{
    /**
     * Display a listing of the outlet.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return response()->json( Gasolinera::all() );
    }
}