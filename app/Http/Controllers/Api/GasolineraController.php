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
        //Obtiene todas las gasolienras y las devuelve en formato json
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
        //En funcion de las condiciones introducidads, se genera una consulta o otra, luego devuelve las gasolineras filtradas en json

        $condicions = ['IDCCAA' => $request->comarca, 'IDProvincia' => $request->provincia, 'IDMunicipio' => $request->municipio];
        $condicions2 = ['IDCCAA' => $request->comarca];
        $condicions3 = ['IDCCAA' => $request->comarca, 'IDProvincia' => $request->provincia];
        

        if($request->comarca=="Todas" and $request->provincia=="Todas" and $request->municipio=="Todas"){
            $Gasolinera = Gasolinera::orderBy($request->gasolina,'asc')->get();
        }
        elseif($request->provincia=="Todas" and $request->municipio=="Todas"){
            $Gasolinera = Gasolinera::where($condicions2)->orderBy($request->gasolina,'asc')->get();
        }
        elseif($request->municipio=="Todas"){
            $Gasolinera = Gasolinera::where($condicions3)->orderBy($request->gasolina,'asc')->get();
        }
        else{
            $Gasolinera = Gasolinera::where($condicions)->orderBy($request->gasolina,'asc')->get();
        }


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
