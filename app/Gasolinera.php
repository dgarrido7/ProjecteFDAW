<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Gasolinera extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'latitude', 'longitude',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'coordinate', 'map_popup_content',
    ];

    // /**
    //  * Get Gasolinera name_link attribute.
    //  *
    //  * @return string
    //  */
    // public function getNameLinkAttribute()
    // {
    //     $title = __('app.show_detail_title', [
    //         'name' => $this->name, 'type' => __('Gasolinera.Gasolinera'),
    //     ]);
    //     $link = '<a href="'.route('Gasolineras.show', $this).'"';
    //     $link .= ' title="'.$title.'">';
    //     $link .= $this->name;
    //     $link .= '</a>';

    //     return $link;
    // }





    /**
     * Gasolinera belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }



    

    /**
     * Get Gasolinera coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude.', '.$this->longitude;
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
