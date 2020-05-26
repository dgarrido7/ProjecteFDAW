<?php

namespace App;

use App\User;
use App\Comunidade;
use App\Municipio;
use App\Provincia;

use Illuminate\Database\Eloquent\Model;

class Gasolinera extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CP', 'Direccion', 'Horario', 'Latitud','Localidad','Longitud','Margen','PrecioBiodiesel','PrecioBioetanol','PrecioGasNaturalComprimido','PrecioGasNaturalLiquado','PrecioGasesNaturalesLiquadosPetroleo','PrecioGasoleoA','PrecioGasoleoB','PrecioGasolina95','PrecioGasolina98','PrecioNuevoGasoleoA','Remision','Rotulo','TipoVenta','Bioetanol','EsterMetilico','IDEESS','IDMunicipio','IDProvincia','IDCCAA',


    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'coordinate', 'map_popup_content',
    ];

    

    /**
     * Gasolinera belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function comunidades()
    {
        return $this->belongsTo('App\Comunidad');
    }
    public function provincias()
    {
        return $this->belongsTo('App\Provincia');
    }
    public function municipios()
    {
        return $this->belongsTo('App\Municipio');
    }



    

    /**
     * Get Gasolinera coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {
        if ($this->Latitud && $this->Longitud) {
            return $this->Latitud.', '.$this->Longitud;
        }
    }

    /**
     * Get Gasolinera map_popup_content attribute.
     *
     * @return string
     */
    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Gasolinera.name').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Gasolinera.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }
}
