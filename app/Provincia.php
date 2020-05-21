<?php

namespace App;
use App\Comunidade;
use App\Municipio;
use App\Gasolinera;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public function gasolineras()
    {
        return $this->hasMany('App\Gasolinera');
    }
    public function municipios()
    {
        return $this->hasMany('App\Municipio');
    }
    public function comunidades()
    {
        return $this->belongsTo('App\Comunidad');
    }
}
