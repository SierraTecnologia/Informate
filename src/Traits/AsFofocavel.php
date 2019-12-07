<?php

namespace Informate\Traits;

use Illuminate\Support\Facades\Log;

trait AsFofocavel
{
    
    /**
     * One To Many (Polymorphic) - Feature FA
     *
     * @return void
     */

    public function infos()
    {
        return $this->morphMany('Population\Models\Market\Abouts\Info', 'infoable');
    }
    /**
     * Many To Many (Polymorphic)
     */
    public function gostos()
    {
        return $this->morphToMany('Informate\Models\Entytys\Fisicos\Gosto', 'gostoable');
    }
    public function sitios()
    {
        return $this->morphToMany('Population\Models\Identity\Digital\Sitio', 'sitioable');
    }



    /**
     * Events
     */
    public static function bootAsFofocavel()                                                                                                                                                             
    {

        // static::deleting(function (self $user) {
        //     optional($user->photos)->each(function (Photo $photo) {
        //         $photo->delete();
        //     });
        // });
    }
    

}
