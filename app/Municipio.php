<?php

namespace App;
use App\Provincia;
use App\Gasolinera;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public function gasolineras()
    {
        return $this->hasMany('App\Gasolinera');
    }
    public function provincias()
    {
        return $this->belongsTo('App\Provincia');
    }
}
