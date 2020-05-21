<?php

namespace App;
use App\Provincia;
use App\Gasolinera;

use Illuminate\Database\Eloquent\Model;

class Comunidade extends Model
{

    protected $fillable = [
    	'id',
    	'nombre'
    ];
    
    public function gasolineras()
    {
        return $this->hasMany('App\Gasolinera');
    }
    public function provincias()
    {
        return $this->hasMany('App\Provincia');
    }
}
