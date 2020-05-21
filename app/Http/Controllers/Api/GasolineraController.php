<?php

namespace App\Http\Controllers\Api;

use App\Gasolinera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Gasolinera as GasolineraResource;

class GasolineraController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $Gasolinera = Gasolinera::all();

        $geoJSONdata = $Gasolinera->map(function ($gasolinera) {
            return [
                'type'       => 'Feature',
                'properties' => new GasolineraResource($gasolinera),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $gasolinera->Longitud,
                        $gasolinera->Latitud,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }

    public function filtro(Request $request)
    {

        $condicions = ['IDCCAA' => $request->comarca, 'IDProvincia' => $request->provincia, 'IDMunicipio' => $request->municipio];



        $Gasolinera = Gasolinera::where($condicions)->orderBy($request->gasolina,'asc')->get();


        $geoJSONdata = $Gasolinera->map(function ($gasolinera) {
            return [
                'type'       => 'Feature',
                'properties' => new GasolineraResource($gasolinera),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $gasolinera->Longitud,
                        $gasolinera->Latitud,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
