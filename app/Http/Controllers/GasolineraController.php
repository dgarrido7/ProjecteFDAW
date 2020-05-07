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
        // $this->authorize('manage_gasolineres');

        // $gasolineresQuery = Gasolineres::query();
        // $gasolineresQuery->where('name', 'like', '%'.request('q').'%');
        // $gasolineres = $gasolineresQuery->paginate(25);

        return response()->json( Gasolinera::all() );
    }
}